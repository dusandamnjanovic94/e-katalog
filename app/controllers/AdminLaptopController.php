<?php

/**
 * Klasa kontrolera admin panela aplikacije za rad sa laptopovima
 */

class AdminLaptopController extends Controller {
  
    /**
     * Indeks metod admin kontrolera za rad sa laptopovima prikazuje spisak svih laptopova
     */
    public function index() {
        $this->set('laptop', LaptopModel::getAll());

      
    }
    
    /**
     * Ovaj metod prikazuje formular za dodavanje ili vrsi dodavanje ako su podaci poslati HTTP POST metodom
     * @return void
     */
    public function add() {
        $this->set('laptop_kategorija', LaptopKategorijaModel::getAll());        
        
        if (!$_POST) return;

        $naziv = filter_input(INPUT_POST, 'naziv', FILTER_SANITIZE_STRING);
            if(!preg_match('/^[a-zA-Z0-9,\s]{5,}$/',$naziv)){
                    die('Nije validan naziv laptopa');
            }
        $laptop_kategorija_id = filter_input(INPUT_POST, 'laptop_kategorija_id',  FILTER_SANITIZE_NUMBER_INT);
        
        $opis = filter_input(INPUT_POST, 'opis', FILTER_SANITIZE_STRING);
        $cena = filter_input(INPUT_POST, 'cena', FILTER_SANITIZE_STRING);
        $slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);

        $laptop_id = LaptopModel::add($naziv, $laptop_kategorija_id, $opis, $cena, $slug);
        

        if ($laptop_id) {
            Misc::redirect('admin/laptop/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom dodavanja laptopa u bazu podataka.');
        }
    }
    /**
     * Ovaj metod prikazuje formular za izmenu ili vrsi izmenu ako su podaci poslati HTTP POST metodom
     * @param int $laptop_id
     * @return type
     */
    public function edit($laptop_id) {        
        $laptop = LaptopModel::getById($laptop_id);
                
        if (!$laptop) {
            Misc::redirect('admin/laptop/');
        }        
        
        $this->set('laptop_kategorija', LaptopKategorijaModel::getAll());        
        $this->set('laptop', $laptop);
        
        if (!$_POST) return;

        $naziv = filter_input(INPUT_POST, 'naziv');
        $laptop_kategorija_id = filter_input(INPUT_POST, 'laptop_kategorija_id',FILTER_SANITIZE_NUMBER_INT);
        $opis = filter_input(INPUT_POST,'opis');
        $cena = filter_input(INPUT_POST,'cena');
        $slug = filter_input(INPUT_POST,'slug');

        $res = LaptopModel::edit($laptop_id, $naziv, $laptop_kategorija_id, $opis, $cena, $slug);

        if ($res) {
            Misc::redirect('admin/laptop/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom izmene podataka o laptopu.');
        }
    }
    /**
     * Ovaj metod prikazuje detalja za laptop
     * @param int $laptop_id
     */
    public function detalji($laptop_id){
        $laptop = LaptopModel::getById($laptop_id);        
        $this->set('laptop', $laptop);                
        
        $laptop_specifikacije_detalji = LaptopModel::getAllQuantifiedDetails($laptop_id);
        $this->set('laptop_specifikacije_detalji',$laptop_specifikacije_detalji);
        
    }
    /**
     * Ovaj metod omogucava dodavanje specifikacije za odredjen laptop
     * @param int $laptop_id
     */
    public function dodaj_specifikacija_detalj($laptop_id){
        $laptop_id = LaptopModel::getById($laptop_id);        
        
        $this->set('laptop_specifikacija_id',  LaptopSpecifikacijaModel::getAll());
        if ($_POST) {
            foreach ($_POST['laptop_specifikacija_id'] as $laptop_specifikacija_id) {
                $laptop_specifikacija_id = $laptop_specifikacija_id;                
                $vrednost = filter_input(INPUT_POST, 'vrednost');

                LaptopModel::dodajSpecifikacijaDetaljLaptop($laptop_specifikacija_id, $vrednost, $laptop_id->laptop_id);
            }
            Misc::redirect('admin/laptop/detalji/'.$laptop_id->laptop_id);
        }
        
    }
}
