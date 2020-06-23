<?php 
/**
 * Klasa za rad za bazom podataka.
 * Ovaj edukativni okvir ne implementira neki poseban sistem za rad sa bazom podataka,
 * jer je cilj da studenti nauce da rade sa SQL upitima, tako da je uloga ove klase
 * da obezbedi instancu konekcije ka bazi podataka koja se ostvaruje prvi put kada
 * aplikaciji treba baza i ubuduce se koristi postojeca konekcija za sve transakcije.
 */
final class DataBase {
    /**
     * Objekat konekcije na bazu podataka
     * @var \PDO
     */
    private static $db = null;

    /**
     * Ovaj metod vrca objekat konekcije ka bazi podataka (instancu klase PDO)
     * za vec postojecu konekciju, a ako do saad ovaj objekat nije instanciran,
     * tj. nije ostvarena veza ka bazi podataka, metod uspostavlja konekciju
     * ka MySQL serveru sa parametrima zadatim u klasi Configuration i tek zatim
     * vraca kao rezultat objekat klase PDO za uspostavljenu konekciju.
     * @return \PDO
     */
    public static function getInstance() {
        if (self::$db === null) {
            self::$db = new PDO('mysql:host=' . Configuration::DB_HOST. ';dbname=' . Configuration::DB_BASE . ';charset=utf8', Configuration::DB_USER, Configuration::DB_PASS);
            self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$db;
    }
}
