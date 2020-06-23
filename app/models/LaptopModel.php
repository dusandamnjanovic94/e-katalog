<?php

/**
 * Model koji odgovara tabeli laptop
 */
class LaptopModel implements ModelInterface {
   
    /**
     * Metod koji vraca spisak svih pregleda
     * @return array
     */
    public static function getAll() {
        $SQL = 'select l.laptop_id,
			 l.naziv_laptopa,
			 l.kategorija_id,
			 lk.naziv_kategorije kat,
			 l.opis,
             l.cena,
             l.slug			
            from laptop l
            left join  kategorija lk ON l.kategorija_id=lk.kategorija_id;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getAllPaged($page){
        $page = max(0,$page);
        $first = $page * Configuration::ITEMS_PER_PAGE;
        $SQL = 'SELECT * FROM laptop ORDER BY naziv_laptopa LIMIT ?,? ';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$first,Configuration::ITEMS_PER_PAGE]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca objekat 
     * @param int $laptop_id
     * @return type
     */
    public static function getById($laptop_id) {
        $laptop_id = intval($laptop_id);
        $SQL = 'select l.laptop_id,
			           l.naziv_laptopa,
			           l.kategorija_id,
			           lk.naziv_kategorije kat,
			           l.opis,
                       l.cena,
                       l.slug			
                from laptop l
                left join kategorija lk ON l.kategorija_id=lk.kategorija_id
                WHERE laptop_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$laptop_id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    /**
     * Metod koji vraca laptop prema trazenom slug-u
     */
    public static function getBySlug($slug){
        $SQL = 'SELECT * FROM laptop WHERE slug = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$slug]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vrsi dodavanje u bazu podataka
     * @param string $naziv
     * @param int $laptop_kategorija_id
     * @param string $opis
     * @param int $cena
     * @return boolean
     */
    public static function add($naziv, $laptop_kategorija_id, $opis, $cena, $slug) {
        $SQL = 'INSERT INTO laptop(naziv_laptopa,kategorija_id,opis,cena,slug) VALUES (?,?,?,?,?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$naziv, $laptop_kategorija_id, $opis, $cena, $slug]);
        if ($res) {
            return DataBase::getInstance()->lastInsertId();
        } else {
            return false;
        }
    }
    /**
     * Metod koji vrsi izmenu zapisa u bazi podataka
     * @param int $laptop_id
     * @param string $naziv
     * @param int $laptop_kategorija_id
     * @param string $opis
     * @param string $cena
     * @return array
     */
    public static function edit($laptop_id, $naziv, $laptop_kategorija_id, $opis, $cena,$slug) {
        $SQL = 'UPDATE laptop SET naziv_laptopa = ?, kategorija_id = ?, opis = ?, cena = ?, slug=? WHERE laptop_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$naziv, $laptop_kategorija_id, $opis, $cena, $slug, $laptop_id]);
    }

  

    /**
     * Metod vraca spisak svih specifikacija koji su dodati laptopu sa prosledjenim id-jem
     * @param int $sala_id
     * @return array
     */
    public static function getAllQuantifiedDetails($laptop_id){
        $laptop_id = intval($laptop_id);
        $SQL = 'SELECT  h2.naziv_specifikacije,
			            h1.vrednost 
                FROM  laptop_specifikacija h1 
                JOIN  specifikacija h2 ON h1.specifikacija_id = h2.specifikacija_id 
                WHERE h1.laptop_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$laptop_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vrsi dodavanje specifikacije za laptop
     */
    public static function dodajSpecifikacijaDetaljLaptop($laptop_specifikacija_id,$vrednost,$laptop_id){
        $laptop_specifikacija_id = $laptop_specifikacija_id;
        $vrednost= htmlspecialchars($vrednost);
        $laptop_id = intval($laptop_id);
        
        $SQL = 'INSERT INTO laptop_specifikacija(laptop_id,specifikacija_id,vrednost) VALUES (?,?,?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$laptop_id,$laptop_specifikacija_id,$vrednost]);
        if ($res) {
            return DataBase::getInstance()->lastInsertId();
        } else {
            return false;
        }
    }
    
    /**
     * Metod koji vraća slike za laptop
     * 
     * @param omt $laptop_id
     * @return array
     */
    public static function getLaptopImages($laptop_id){
        $SQL = 'SELECT * FROM fotografija WHERE laptop_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$laptop_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
}
