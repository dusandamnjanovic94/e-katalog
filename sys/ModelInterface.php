<?php 
/**
 * Ovaj interfejs navodi sve metode koji obavezno moraju da budu implementirani
 * u svakoj klasi koja predstavlja model za tabele u bazi podataka aplikacije.
 */
interface ModelInterface {
    /**
     * Ovaj metod vraca sve zapise iz baze podataka za tabelu ciji je ovo model.
     * Svi slogovi iz tabele su poredjani po prirodnom redosledu za ovu tabelu.
     */
    public static function getAll();

    /**
     * Ovaj metod vraca jedan slog iz tabele ciji je ovo model, a ciji je
     * primarni kljuc vrednost koja je data kao argument $id ovog metoda.
     * @param int $id Vrednost primarnog kljuca sloga koji treba vratiti
     */
    public static function getById($id);
}
