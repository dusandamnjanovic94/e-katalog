<?php 
/**
 * Ova klasa predstavlja posebnu izvedenu klasu koja nasledjuje sve osobine
 * i funkcionalnosti osnovne kalse kontrolera aplikacije, uz dopunu koja
 * predstavlja proveru postojanja prijavljenog korisnika (otvorena sesija za
 * korisnika) i ako to nije slucaj, preusmerava posetioca na logout rutu,
 * koja ce isprazniti sve iz sesije i preusmeriti korisnika na login rutu.
 */
class AdminController extends Controller {
    /**
     * Ovaj metod vrsi proveru postojanja prijavljenog korisnika (otvorena sesija
     * za korisnika). Ako korisnik koje prijavljen, preusmerava ga na logout rutu,
     * koja ce isprazniti sve iz sesije i preusmeriti korisnika na login rutu.
     */
    final function __pre() {
        if (!Session::exists('user_id')) {
            Misc::redirect('logout');
        }
    }
}

