<?php

class Solicitud {
    private PDO $db;
    public function __construct(PDO $db) { $this->db = $db; }

    // READ: lista (con búsqueda opcional)
    public function listar(string $buscar = ''): array {
        $sql = 'SELECT s.*, t.nombre AS tarjeta
                FROM solicitudes s JOIN tarjetas t ON t.id = s.tarjeta_id
                WHERE s.nombre LIKE ? OR s.correo LIKE ?
                ORDER BY s.id DESC';
        $consulta = $this->db->prepare($sql);
        $consulta->execute(["%$buscar%", "%$buscar%"]);
        return $consulta->fetchAll();
    }

    
    public function buscar(int $id) {
        $consulta = $this->db->prepare('SELECT * FROM solicitudes WHERE id = ?');
        $consulta->execute([$id]);
        return $consulta->fetch(); // false si no existe
    }

    
    public function crear(array $d): void {
        $sql = 'INSERT INTO solicitudes (nombre, correo, telefono, tarjeta_id, mensaje)
                VALUES (?, ?, ?, ?, ?)';
        $this->db->prepare($sql)->execute([
            $d['nombre'], $d['correo'], $d['telefono'], (int)$d['tarjeta_id'], $d['mensaje'],
        ]);
    }

    
    public function actualizar(array $d): void {
        $sql = 'UPDATE solicitudes
                SET nombre = ?, correo = ?, telefono = ?, tarjeta_id = ?, mensaje = ?
                WHERE id = ?';
        $this->db->prepare($sql)->execute([
            $d['nombre'], $d['correo'], $d['telefono'], (int)$d['tarjeta_id'], $d['mensaje'], (int)$d['id'],
        ]);
    }

    
    public function eliminar(int $id): void {
        $this->db->prepare('DELETE FROM solicitudes WHERE id = ?')->execute([$id]);
    }
}