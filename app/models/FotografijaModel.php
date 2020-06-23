<?php
 /**
 * Model koji odgovara tabeli laptop_fotografija
 */
class FotografijaModel implements ModelInterface {
    
    /**
     * Metod koji vraca spisak svih pregleda
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM fotografija;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @param type $laptop_fotografija_id
     * @return type
     */
    public static function getById($laptop_fotografija_id) {
        $laptop_fotografija_id = intval($laptop_fotografija_id);
        $SQL = 'SELECT * FROM fotografija WHERE fotografija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$laptop_fotografija_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @param type $laptop_id
     * @return type
     */
    public static function getByLaptopId($laptop_id){
        $laptop_id = intval($laptop_id);
        $SQL = 'SELECT * FROM fotografija WHERE laptop_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$laptop_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @param type $laptop_id
     * @param type $path
     * @return type
     */
    public static function add($laptop_id, $path) {
        $SQL = 'INSERT INTO fotografija(laptop_id, fotografija) VALUES (?,?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$laptop_id, $path]);
        
    }

    public static function delete($laptop_fotografija_id) {
        $SQL = 'DELETE FROM fotografija  WHERE fotografija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$laptop_fotografija_id]);
    }
}
