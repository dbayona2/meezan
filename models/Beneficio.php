<?php

class Beneficio {
    private PDO $db;
    public function __construct(PDO $db) { $this->db = $db; }

    public function todos(): array {
        return $this->db->query('SELECT * FROM beneficios ORDER BY id')->fetchAll();
    }
}