<?php 
//echo hash('sha512','admin09560ughkjfgh08u35608utrgho8u54yjhi0569uyrth');
# Otvaranje novog output bufefer-a
ob_start();

# Ucitavanje autoloader funkcije koja ce pomoci prilikom ucitavanja klasa prilikom njihove prve upotrebe
require_once 'sys/Autoloader.php';

# Zapocinjanje sesije
Session::begin();

# Preuzimanje pristilog zahteva
$Request = substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), strlen(Configuration::PATH));

# Ucitavanje definisanih ruta za ovu aplikaciju
$Routes = require_once 'Reoutes.php';

# Nalazenje odgovarajuce rute
$Arguments;
$FoundRoute = null;
foreach ($Routes as $Route) {
    if (preg_match($Route['Pattern'], $Request, $Arguments)) {
        $FoundRoute = $Route;
        break;
    }
}

# Preuzimanje spiska argumenata koji su deo zahteva (poziva)
unset($Arguments[0]);
$Arguments = array_values($Arguments);

# Ucitavanje kontrolera za izabranu rutu
$controllerPath = 'app/controllers/' . $FoundRoute['Controller'] . 'Controller.php';
if (!file_exists($controllerPath)) {
    die('Controller class does not exist.');
}
require_once $controllerPath;

# Instanciranje kontrolera
$imeKlase = $FoundRoute['Controller'] . 'Controller';
$worker = new $imeKlase;

# Eventualno izvrsavanje specijalnog metoda __pre
if (method_exists($worker, '__pre')) {
    call_user_func([$worker, '__pre']);
}

# Izvrsavanje mtoda kontrolera koji je definisan za izabranu rutu
if (method_exists($worker, $FoundRoute['Method'])) {
    $methodName = $FoundRoute['Method'];
    call_user_func_array([$worker, $methodName], $Arguments);
} else {
    die('This controller does not have the requested method.');
}

# Eventualno izvrsavanje specijalnog metoda __post
if (method_exists($worker, '__post')) {
    call_user_func([$worker, '__post']);
}

# Preuzimanje podataka koje je pripremio kontroler za slanje sablonima za generisanje odgovora
$DATA = $worker->getData();

# Ako je izvrsavan kontroler za API pozive, onda preuzete podatke poslati enkodirane u JSON formatu
if ( $worker instanceof ApiController ) {
    ob_clean();
    header('Content-type: text/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    echo json_encode($DATA, JSON_PRETTY_PRINT);
    exit;
}

# Ako nije bio u pitanju API kontroler, onda ucitati sablon/pogled koji ce generisati odgovor
require 'app/views/' . $FoundRoute['Controller'] . '/' . $FoundRoute['Method'] . '.php';
