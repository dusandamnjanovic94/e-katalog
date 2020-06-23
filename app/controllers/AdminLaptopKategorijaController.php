<?php

/** 
 *  Klasa kontrolera admin panela aplikacije za rad sa kategorijama dogadjaja
 */
class AdminLaptopKategorijaController extends Controller {
    /**
     * Indeks metod admin kontrolera za rad sa kategorijama laptopova prikazuje spisak svih kategorija laptopova
     */
    public function index() {
        $this->set('laptop_kategorija', LaptopKategorijaModel::getAll());
    }
    /**
     * Ovaj metod prikazuje formular za dodavanje ili vrsi dodavanje ako su podaci poslati HTTP POST metodom
     * @return void
     */
    public function add() {        
        
        if (!$_POST) return;

        $naziv = filter_input(INPUT_POST, 'naziv_kategorije', FILTER_SANITIZE_STRING);        
        if(!preg_match('/^[a-zA-Z,\s]{5,}$/',$naziv)){
            die('Nije validan naziv kategorije');
        }

        #var_dump($naziv);die();
        $laptop_kategorija_id = LaptopKategorijaModel::add($naziv);        

        if ($laptop_kategorija_id) {
            Misc::redirect('admin/laptop_kategorija/');
        }else {
            $this->set('message', 'Doslo je do greske prilikom dodavanja kategorije u bazu podataka.');
        }
    }
    /**
     * Ovaj metod prikazuje formular za izmenu ili vrsi izmenu ako su podaci poslati HTTP POST metodom
     * @param int $laptop_kategorija_id
     * @return type
     */
    public function edit($laptop_kategorija_id) {        
        $laptop_kategorija = LaptopKategorijaModel::getById($laptop_kategorija_id);
                
        if (!$laptop_kategorija) {
            Misc::redirect('admin/laptop_kategorija/');
        }        
        $this->set('laptop_kategorija', $laptop_kategorija);

        if (!$_POST) return;

        $naziv = filter_input(INPUT_POST, 'naziv');
                
        $res = LaptopKategorijaModel::edit($laptop_kategorija_id, $naziv);

        if ($res) {
            Misc::redirect('admin/laptop_kategorija/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom izmene podataka o kategoriji.');
        }
    }
    /**
     * 
     */
    public function delete($laptop_kategorija_id){
        $laptop_kategorija = LaptopKategorijaModel::getById($laptop_kategorija_id);
        
        

        $res = LaptopKategorijaModel::delete($laptop_kategorija_id);

        if ($res) {
            Misc::redirect('admin/laptop_kategorija/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom brisanja podataka o kategoriji.');
        }
    }
    
}
