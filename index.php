<?php

require __DIR__ . '/config/database.php';

foreach (['Tarjeta', 'Beneficio', 'Paso', 'Solicitud'] as $modelo) {
    require __DIR__ . "/models/$modelo.php";
}
require __DIR__ . '/controllers/HomeController.php';
require __DIR__ . '/controllers/SolicitudController.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'guardar': (new SolicitudController())->guardar(); break;
    case 'gracias': (new SolicitudController())->gracias(); break;
    case 'admin':   (new SolicitudController())->admin();   break;
    default:        (new HomeController())->index();
}