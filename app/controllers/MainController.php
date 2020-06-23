<?php
/**
 * Ovo je osnovni kontroler aplikacije koji se koristi za izvrsavanje
 * zahteva upucenih prema podrazumevanim rutama koje poznaje veb sajt.
 */
 
class MainController extends Controller {
    /**
     * Ovaj metod prepisuje podrazumevani index metod kontrolera i njegova
     * uloga je da proveri da li postoji prijavljeni korisnik u sesiji.
     * Ako ne postoji, metod preusmerava posetioca na stranicu za odjavu.
     * Stranica za odjavu ce izvrsiti logout metod ovog kontrolera, koji ce
     * na kraju, kada ocisti sesiju da preusmeri posetioca na login stranu.
     */
    function index($page = 0) {
       
       
        
        $laptop = LaptopModel::getAllPaged($page);
        for($i=0;$i<count($laptop);$i++){
                         
            $laptop[$i]->fotografija = LaptopModel::getLaptopImages($laptop[$i]->laptop_id);
            $laptop[$i]->specifikacija = LaptopModel::getAllQuantifiedDetails($laptop[$i]->laptop_id);

          
        }
        $this->set('laptop', $laptop);
        

        $ime           = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
        $email         = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $naslov_poruke = filter_input(INPUT_POST, 'naslov_poruke', FILTER_SANITIZE_STRING);
        $poruka        = filter_input(INPUT_POST, 'poruka', FILTER_SANITIZE_STRING);

        $kontakt_id = KontaktModel::add($ime, $email, $naslov_poruke, $poruka);
		
    }

    /**
     * Ovaj metod proverava da li postoje podaci za prijavu poslati HTTP POST
     * metodom, vrsi njihovu validaciju, proverava postojanje korisnika sa tim
     * pristupnim parametrima i u slucaju da sve provere prodju bez greske
     * metod kreira sesiju za korisnika i preusemrava korisnika na default rutu.
     * @return void Metod ne vraca nista, vec koristi return naredbu za prekid izvrsavanja u odredjenim situacijama
     */
    function login() {
        if ($_POST) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');

            if (!preg_match('/^[a-z0-9]{4,}$/', $username) or !preg_match('/^.{5,}$/', $password)) {
                $this->set('message', 'Invalid username or password format.');
                return;
            }

            $passwordHash = hash('sha512', $password . Configuration::SALT);
            $user = UserModel::getActiveUserByUsernameAndPasswordHash($username, $passwordHash);

            if (!$user) {
                $this->set('message', 'Username or password are incorrect or the user is not active.');
                return;
            }

            Session::set('user_id', $user->user_id);
            Session::set('username', $username);
            Session::set('user_ip', filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_FLAG_IPV4));
            Session::set('user_agent', filter_input(INPUT_SERVER, 'HTTp_USER_AGENT'));

            Misc::redirect('admin/laptop');
        }
    }

    /**
     * Ovaj metod gasi sesiju cime efektivno unistava sve u sesiji,
     * a zatim preusmerava korisnika na stranicu za prijavu na login ruti.
     */
    function logout() {
        Session::end();
        Misc::redirect('login');
    }
    
    function laptop($slug){
        $laptop = LaptopModel::getBySlug($slug);
      
        if(!$laptop){
            Misc::redirect('');
        }
        
        $laptop_specifikacije_detalji = LaptopModel::getAllQuantifiedDetails($laptop[0]->laptop_id);
        $this->set('laptop_specifikacije_detalji',$laptop_specifikacije_detalji);
        
        $laptop_fotografija = FotografijaModel::getByLaptopId($laptop[0]->laptop_id);
        
        $this->set('laptop_fotografija',$laptop_fotografija);
        $this->set('laptop', $laptop[0]);
        
       
       
        }
}
