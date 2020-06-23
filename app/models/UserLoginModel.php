<?php
/** 
 * Model koji odgovara tabeli user_login
 */
class UserLoginModel implements ModelInterface {
    /**
     * Metod koji vraca spisak svih priijava kroisnika poredjanih po korisnickom datumu u opadajucem poretku
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM user_login ORDER BY `datetime` DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Metod koji vraca objekat sa podacima o prijavi korisnika ciji user_login_id je dat kao arguemnt metoda
     * @param int $user_login_id
     * @return stdClass|NULL
     */
    public static function getById($user_login_id) {
        $user_login_id = intval($user_login_id);
        $SQL = 'SELECT * FROM user_login WHERE user_login_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$user_login_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Metod koji vraca niz prijava korisnika ciji ID broj je dat kao argument metoda
     * @param int $user_id ID korisnika
     * @return array
     */
    public static function getByUserId($user_id) {
        $user_id = intval($user_id);
        $SQL = 'SELECT * FROM user_login WHERE user_id = ? ORDER BY `datetime` DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$user_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
}
