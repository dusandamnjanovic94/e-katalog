<?php 
    /**
     * Ovaj metod sluzi da ucita klase koje se prvi put upotrebe tokom izvrsavanja
     * koda aplikacije, a koje su razvrstane u stablu direktorijuma aplikacije po
     * odradjenim kriterijumima definisanim dizajnom MVC okvira.
     * @param type $imeKlase
     */
    function __autoload($imeKlase) {
        if (in_array($imeKlase, ['Misc', 'DataBase', 'Controller', 'ModelInterface', 'Session', 'AdminController', 'ApiController'])) {
            require_once 'sys/' . $imeKlase . '.php';
        } elseif (preg_match('/^([A-Z][a-z]+)+Controller$/', $imeKlase)) {
            require_once 'app/controllers/' . $imeKlase . '.php';
        } elseif (preg_match('/^([A-Z][a-z]+)+Model$/', $imeKlase)) {
            require_once 'app/models/' . $imeKlase . '.php';
        } elseif ($imeKlase === 'Configuration') {
            require_once $imeKlase . '.php';
        }
    }
