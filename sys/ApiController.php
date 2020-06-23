<?php 
/**
 * Ova klasa se koristi za upravljanje izvrsavanjem ruta koje su odredjene da
 * daju odgovore kao API, a ne kao deo aplikacije sa korisnickim interfejsom.
 */
class ApiController extends Controller {
    /**
     * Ovaj metod dodaje u podatke za odgovor API-ja vreme pocetka izvrsavanja
     * metoda API-ja izabranog rutom.
     */
    final function __pre() {
        $this->set('request_time', microtime());
    }

    /**
     * Ovaj metod dodaje u podatke za odgovor API-ja vreme kraja izvrsavanja
     * metoda API-ja izabranog rutom.
     */
    final function __post() {
        $this->set('response_time', microtime());
    }
}
