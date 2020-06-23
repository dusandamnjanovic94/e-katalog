<?php
    /**
     * Ova datoteka vraca niz asocijativnih nizova koji predstavljaju rute koje
     * postoje u ovoj aplikaciji.
     * <pre>
     * Svaka ruta je asocijativni niz koji mora da sadrzi indekse:
     *  - Pattern    - Regularni izraz koji treba da odgovara zahtevu da se ruta izvrsi
     *  - Controller - Ime kontrolera koji treba koristiti za odgovor zahtevu.
     *                 Ako je ime kontrolera Main, ime klase je MainController.
     *                 Kao vrednost ovog indeksa asocijatvinog niza ide samo Main,
     *                 a ne MainController kako je puno ime klase.
     *  - Method     - Ime metoda izabranog kontrolera koji treba izvrsiti za
     *                 odgovor na pristigli zahtev koji odgovara ovoj ruti.
     * </pre>
     * 
     * Primer:
     * <pre><code>
     * return [
     *   [
     *     'Pattern'    => '|^login/?$|',
     *     'Controller' => 'Main',
     *     'Method'     => 'login'
     *   ],
     *   [
     *     'Pattern'    => '|^logout/?$|',
     *     'Controller' => 'Main',
     *     'Method'     => 'logout'
     *   ],
     *   [ # Poslednja ruta koja ce se izvrsiti ako ni jedna pre ne odgovara pristiglom zahtevu.
     *     'Pattern'    => '|^.*$|',
     *     'Controller' => 'Main',
     *     'Method'     => 'index'
     *   ]
     * ];
     * <code></pre>
     */
    return [
        [
            'Pattern'    => '|^login/?$|',
            'Controller' => 'Main',
            'Method'     => 'login'
        ],
        [
            'Pattern'    => '|^logout/?$|',
            'Controller' => 'Main',
            'Method'     => 'logout'
        ],
        [
            'Pattern'    => '|^admin/kontakt/?$|',
            'Controller' => 'AdminKontakt',
            'Method'     => 'index'
        ], 
        [
            'Pattern'    => '|^admin/kontakt/detalji/([0-9]+)/?$|',
            'Controller' => 'AdminKontakt',
            'Method'     => 'detalji'
        ],
        [
            'Pattern'    => '|^admin/kontakt/delete/([0-9]+)/?$|',
            'Controller' => 'AdminKontakt',
            'Method'     => 'delete'
        ],
        [
            'Pattern'    => '|^admin/laptop/?$|',
            'Controller' => 'AdminLaptop',
            'Method'     => 'index'
        ], 
        [
            'Pattern'    => '|^admin/laptop/add/?$|',
            'Controller' => 'AdminLaptop',
            'Method'     => 'add'
        ],
        [
            'Pattern'    => '|^admin/laptop/edit/([0-9]+)/?$|',
            'Controller' => 'AdminLaptop',
            'Method'     => 'edit'
        ],
        [
            'Pattern'    => '|^admin/laptop/detalji/([0-9]+)/?$|',
            'Controller' => 'AdminLaptop',
            'Method'     => 'detalji'
        ],
        [
            'Pattern'    => '|^admin/laptop/detalji/dodaj_specifikacija_detalj/([0-9]+)/?$|',
            'Controller' => 'AdminLaptop',
            'Method'     => 'dodaj_specifikacija_detalj'
        ],
        [
            'Pattern'    => '|^admin/images/laptop/([0-9]+)/?$|',
            'Controller' => 'AdminLaptopFotografija',
            'Method'     => 'listLaptopFotografija'
        ],
        [
            'Pattern'    => '|^admin/images/laptop/([0-9]+)/delete/([0-9]+)/?$|',
            'Controller' => 'AdminLaptopFotografija',
            'Method'     => 'delete'
        ],
        [
            'Pattern'    => '|^admin/images/laptop/([0-9]+)/add/?$|',
            'Controller' => 'AdminLaptopFotografija',
            'Method'     => 'uploadFotografija'
        ],
        [
            'Pattern'    => '|^admin/laptop_kategorija/?$|',
            'Controller' => 'AdminLaptopKategorija',
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^admin/laptop_kategorija/add/?$|',
            'Controller' => 'AdminLaptopKategorija',
            'Method'     => 'add'
        ],
        [
            'Pattern'    => '|^admin/laptop_kategorija/edit/([0-9]+)/?$|',
            'Controller' => 'AdminLaptopKategorija',
            'Method'     => 'edit'
        ],
        [
            'Pattern'    => '|^admin/laptop_kategorija/delete/([0-9]+)/?$|',
            'Controller' => 'AdminLaptopKategorija',
            'Method'     => 'delete'
        ],
        [
            'Pattern'    => '|^laptop/([a-z0-9\-]+)?$|',
            'Controller' => 'Main',
            'Method'     => 'laptop'
        ],
        [
            'Pattern'    => '|^laptop/?$|',
            'Controller' => 'Laptop',
            'Method'     => 'laptop'
        ],
        [
            'Pattern'    => '|^onama/?$|',
            'Controller' => 'ONama',
            'Method'     => 'onama'
        ],
        [
            'Pattern'    => '|^kontakt/?$|',
            'Controller' => 'Kontakt',
            'Method'     => 'kontakt'
        ],
        [
            'Pattern'    => '|^([0-9]+)?/?$|',
            'Controller' => 'Main',
            'Method'     => 'index'
        ],
        
        [ # Poslednja ruta!
            'Pattern'    => '|^.*$|',
            'Controller' => 'Main',
            'Method'     => 'index'
        ]
    ];
