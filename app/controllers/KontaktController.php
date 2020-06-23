<?php
 /**
 * Klasa kontrolera sajta za rad sa kontakt porukama
 */
 
class KontaktController extends Controller {
    /**
     * Kontakt metod za upis kontakt poruke u bazu podataka
     */
    function kontakt() {
       
       
        $ime           = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
        $email         = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $naslov_poruke = filter_input(INPUT_POST, 'naslov_poruke', FILTER_SANITIZE_STRING);
        $poruka        = filter_input(INPUT_POST, 'poruka', FILTER_SANITIZE_STRING);

        $kontakt_id = KontaktModel::add($ime, $email, $naslov_poruke, $poruka);
        
     
		
    }
 
     
}
