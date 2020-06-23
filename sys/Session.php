<?php 
/**
 * Ova klasa sadrzi metode za rad sa PHP sesijom.
 */
final class Session {
    /**
     * Ovaj metod zapocinje sesiju.
     */
    public static final function begin() {
        session_start();
    }

    /**
     * Ovaj metod vrsi praznjenje postojece sesije i zatvara je.
     */
    public static final function end() {
        self::clear();
        session_destroy();
    }

    /**
     * Ovo je pomocni privatni metod koji sluzi za proveru ispravnosti kljuca
     * u nizu podataka u sesiji pod kojim se cuvaju podaci.
     * @param string $key Indeks podatka u sesiji mora da odgovara regularnom izrazu /^[A-z][A-z0-9_]*$/
     * @return mixed Podatak koji se cuva na indeksu sesije
     */
    private static final function isValid($key) {
        return preg_match('/^[A-z][A-z0-9_]*$/', $key);
    }

    /**
     * Ovaj emtod smesta odredjeni podatak u indeks sesije.
     * @param string $key Indeks podatka u sesiji mora da odgovara regularnom izrazu /^[A-z][A-z0-9_]*$/
     * @param mixed $value Podatak koji se cuva na indeksu sesije
     * @return boolean
     */
    public static final function set($key, $value) {
        if (self::isValid($key)) {
            $_SESSION[$key] = $value;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Ovaj metod sluzi za proveru da li postoji podataka u sesiji pod izabranim indeksom.
     * @param string $key Indeks podatka u sesiji mora da odgovara regularnom izrazu /^[A-z][A-z0-9_]*$/
     * @return boolean
     */
    public static final function exists($key) {
        if (self::isValid($key)) {
            return isset($_SESSION[$key]);
        } else {
            return FALSE;
        }
    }

    /**
     * Ovaj metod vraca podataka u sesiji pod izabranim indeksom.
     * @param string $key Indeks podatka u sesiji mora da odgovara regularnom izrazu /^[A-z][A-z0-9_]*$/
     * @return mixed|boolean Ako podatak postoji, bice vracen, a ako ne postoji, metod vraca FALSE
     */
    public static final function get($key) {
        if (self::isValid($key) and self::exists($key)) {
            return $_SESSION[$key];
        } else {
            return FALSE;
        }
    }

    /**
     * Ovaj metod prazni niz u kojem se cuvaju podaci sesije.
     * @return boolean Uvek vraca TRUE
     */
    public static final function clear() {
        $_SESSION = [];
        return true;
    }
}
