<?php
/** 
 * Model koji odgovara tabeli korisnik
 */
class UserModel implements ModelInterface {
    /**
     * Metod koji vraca spisak svih kroisnika poredjanih po korisnickom imenu
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM user ORDER BY username;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Metod koji vraca objekat sa podacima korisnika ciji korisnik_id je dat kao arguemnt metoda
     * @param int $korisnik_id
     * @return stdClass|NULL
     */
    public static function getById($user_id) {
        $user_id = intval($user_id);
        $SQL = 'SELECT * FROM user WHERE user_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$user_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Metod koji vraca objekat sa podacima korisnika cije korisnicko ime i hes lozinke su dati kao arguemnti metoda
     * @param string $username
     * @param string $passwordHash
     * @return stdClass|NULL
     */
    public static function getActiveUserByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM `user` WHERE `username` = ? AND `password` = ? AND `active` = 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$username, $passwordHash]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
}
