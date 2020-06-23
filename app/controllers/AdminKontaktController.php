<?php

/**
 * Klasa kontrolera admin panela aplikacije za rad sa kontakt porukama
 */

class AdminKontaktController extends Controller {
  
    /**
     * Indeks metod admin kontrolera za rad sa kontaktima prikazuje spisak svih primljenih poruka
     */
    public function index() {
        $this->set('kontakt', KontaktModel::getAll());      
    }     

    /**
     * Detalji metod admin kontrolera za rad sa kontaktima prikazuje detaljniji sadrzaj primljene poruke
     */
    public function detalji($kontakt_id){
        $kontakt = KontaktModel::getById($kontakt_id);        
        $this->set('kontakt', $kontakt);                               
    }    
    /**
     * Delete metod admin kontrolera za rad sa kontaktima, uklanja zapis iz baze podataka.
     */
    public function delete($kontakt_id){
        $kontakt_id = KontaktModel::getById($kontakt_id);                

        $res = KontaktModel::delete($kontakt_id);

        if ($res) {
            Misc::redirect('admin/kontakt/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom brisanja kontakta.');
        }
    }
    
}
