<?php

class Tarjeta {
    private PDO $db;
    public function __construct(PDO $db) { $this->db = $db; }

    public function todas(): array {
        return $this->db->query('SELECT * FROM tarjetas ORDER BY orden')->fetchAll();
    }
}