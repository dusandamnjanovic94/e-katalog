<?php 
/**
 * Klasa Misc je klasa sa metodima opste namene.
 */
final class Misc {
    /**
     * Ovaj metod kreira jednostavan <a> tag za zadati link koji se nadovezuje na
     * osnovnu putanju ka veb aplikaciji, tj. ovaj metod se koristi za kreiranje
     * relativnih linkova za vezivanje sadrzaja ove aplikacije.
     * @param string $link Relativni deo linka koji se nadovezuje na putanju ka korenu aplikacije
     * @param string $text Tekst koji treba prikazati kao sadrzaj linka
     */
    public static function url($link, $text) {
        echo '<a href="' . Configuration::BASE . $link . '">' . $text . '</a>';
    }

    /**
     * Ovaj metod se koristi za preusmeravanje korisnika na relativnu putanju u
     * odnosu na koren putanje veb aplikacije na Internetu.
     * @param string $link Relativni deo linka koji se nadovezuje na putanju ka korenu aplikacije
     */
    public static function redirect($link) {
        ob_clean();
        header('Location: ' . Configuration::BASE . $link);
        exit;
    }
}
