<?php

class HomeController {
    public function index(): void {
        $db = Database::conectar();
        $tarjetas   = (new Tarjeta($db))->todas();
        $beneficios = (new Beneficio($db))->todos();
        $pasos      = (new Paso($db))->todos();

        require __DIR__ . '/../views/home.php'; 
    }
}