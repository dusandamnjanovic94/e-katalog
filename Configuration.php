<?php
/**
 * Ova klasa predstavlja centralno mesto gde se nalaze svi vazni konfiguracioni
 * parametri ove veb aplikacije, koji su definisani kao clanovi podaci konstante.
 */
final class Configuration {
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';

    const DB_BASE = 'e_katalog';

    const BASE = 'http://localhost/e_katalog/';
    const PATH = '/e_katalog/'; # Na normalnom sajtu to ce biti samo /

    const SALT = '09560ughkjfgh08u35608utrgho8u54yjhi0569uyrth';

    const IMAGE_DATA_PATH = 'data/images/';
    
    const ITEMS_PER_PAGE= 6;
}
