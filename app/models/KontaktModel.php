<?php

/**
 * Model koji odgovara tabeli kontakt
 */
class KontaktModel implements ModelInterface {

    /**
     * Metod koji vraca spisak svih pregleda
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM kontakt;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca objekat 
     * @param int $kontakt_id
     * @return type
     */
    public static function getById($kontakt_id) {
        $kontakt_id = intval($kontakt_id);
        $SQL = 'SELECT * FROM kontakt WHERE kontakt_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$kontakt_id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    /**
     * Metod koji vrsi dodavanje u bazu podataka
     * @param string $ime
     * @param string $email
     * @param string $naslov_poruke
     * @param string $poruka
     * @return boolean
     */
    public static function add($ime, $email, $naslov_poruke, $poruka) {
        $SQL = 'INSERT INTO kontakt(ime,email,naslov_poruke,poruka) VALUES (?,?,?,?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$ime, $email, $naslov_poruke, $poruka]);
        if ($res) {
            return DataBase::getInstance()->lastInsertId();
        } else {
            return false;
        }
    }
    /**
     * Metod koji uklanja zapis iz baze podataka
     */
    public static function delete($kontakt_id) {
        $kontakt_id = intval($kontakt_id);
        $SQL = 'DELETE FROM kontakt  WHERE kontakt_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$kontakt_id]);
    }
}
