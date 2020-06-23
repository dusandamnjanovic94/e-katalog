<?php

/**
 * Klasa kontrolera admin panela aplikacije za rad sa fotografijama za laptopove
 */
class AdminLaptopFotografijaController extends Controller {
    /**
     * Indeks metod admin kontrolera za rad sa fotografijama za laptopove prikazuje spisak svih fotografija za laptopove
     */
    public function index() {
        $this->set('laptop_id', LaptopModel::getAll());
    }
    /**
     * Ovaj metod vrsi prikaz svih fotografija za odredjeni laptop
     * @param int $laptop_id
     */
    public function listLaptopFotografija($laptop_id){
        $this->set('laptop_fotografija', FotografijaModel::getByLaptopId($laptop_id));
        $this->set('laptop_id',$laptop_id);
    }
    /**
     * Ovaj metod vrsi dodavanje nove fotografije za odredjeni laptop
     * @param int $laptop_id
     * @return type
     */
    public function uploadFotografija($laptop_id){
        $this->set('laptop_id',$laptop_id);
        
        if(!$_FILES or !isset($_FILES['fotografija'])) return;
        
        if($_FILES['fotografija']['error'] != 0){
            $this->set('message', 'Doslo je do greske prilikom dodavanja fajla.');
            return;
        }
        $temporaryPath = $_FILES['fotografija']['tmp_name'];
        $fileSize = $_FILES['fotografija']['size'];
        $originalName = $_FILES['fotografija']['name'];
        
        if($fileSize > 300*1024){
            $this->set('message', 'Fajl je veci od maksimalne dozvoljene velicine.');
            return;
        }   
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($temporaryPath);
        
        if($mimeType != 'image/jpeg'){
            $this->set('message', 'Dozvoljneo je dodavanje samo jpg slika.');
            return;
        }
        $baseName = basename($originalName);
        $baseName = strtolower($baseName);
        $baseName = preg_replace('[^a-z0-9\- ]', '', $baseName);
        $baseName = preg_replace(' +', '-', $baseName);
        
        $fileName = date('YmdHisu') . '-' . $baseName . '.jpg';
        
        $newLocation = Configuration::IMAGE_DATA_PATH . $fileName;
                
        $res = move_uploaded_file($temporaryPath, $newLocation);
        
        if(!$res){
            $this->set('message', 'Doslo je do greske prilikom cuvanja fajla na krajnju lokaciju Nemate privilegije za ovaj direktorijum.');
            return;
        }
        $res= FotografijaModel::add($laptop_id, $newLocation);
        if(!res){
            $this->set('message', 'Doslo je do greske prilikom upisa u DB');
            return;
        }
        Misc::redirect('admin/images/laptop/'. $laptop_id);
        }

        
    

    public function delete($laptop_fotografija_id){
        $laptop_fotografija_id = FotografijaModel::getById($laptop_fotografija_id);
                
  
        $res = FotografijaModel::delete($laptop_fotografija_id);

        if ($res) {
            Misc::redirect('admin/laptop_kategorija/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom brisanja podataka o kategoriji.');
        }
    }
}
