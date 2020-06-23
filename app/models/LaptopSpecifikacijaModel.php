<?php

class LaptopSpecifikacijaModel implements ModelInterface {
   
    public static function getAll() {
        $SQL = 'SELECT * FROM specifikacija;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($laptop_specifikacija_id) {
        $laptop_specifikacija_id = intval($laptop_specifikacija_id);
        $SQL = 'SELECT * FROM specifikacija WHERE specifikacija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$laptop_specifikacija_id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    public static function add($naziv_specifikacije) {
        $SQL = 'INSERT INTO specifikacija (naziv_specifikacije) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$naziv_specifikacije]);
        if ($res) {
            return DataBase::getInstance()->lastInsertId();
        } else {
            return false;
        }
    }
     

}
