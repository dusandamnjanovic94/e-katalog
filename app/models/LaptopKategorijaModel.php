<?php
/** 
 * Model koji odgovara tabeli laptop_kategorija
 */
class LaptopKategorijaModel implements ModelInterface {
    
   /**
    * Metod koji vraca spisak svih pregleda
    * @return array
    */ 
    public static function getAll() {
        $SQL = 'SELECT * FROM kategorija;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
   /**
    * 
    * @param type $laptop_kategorija_id
    * @return type
    */
    public static function getById($laptop_kategorija_id) {
        $laptop_kategorija_id = intval($laptop_kategorija_id);
        $SQL = 'SELECT * FROM kategorija WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$laptop_kategorija_id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    /**
     * 
     * @param string $naziv
     * @return boolean
     */
    public static function add($naziv) {
        $SQL = 'INSERT INTO kategorija (naziv_kategorije) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$naziv]);
        if ($res) {
            return DataBase::getInstance()->lastInsertId();
        } else {
            return false;
        }
    }
    /**
     * 
     * @param type $laptop_kategorija_id
     * @param type $naziv
     * @return type
     */
    public static function edit($laptop_kategorija_id, $naziv) {
        $SQL = 'UPDATE kategorija SET naziv_kategorije = ? WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$naziv, $laptop_kategorija_id]);
    }

    public static function delete($laptop_kategorija_id) {
        $SQL = 'DELETE FROM kategorija  WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$laptop_kategorija_id]);
    }
}
