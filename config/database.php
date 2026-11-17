<?php

class Database {
    public static function conectar(): PDO {
        $host    = 'localhost';
        $base    = 'meezan_cards';
        $usuario = 'root';
        $clave   = ''; 

        return new PDO(
            "mysql:host=$host;dbname=$base;charset=utf8mb4",
            $usuario,
            $clave,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }
}