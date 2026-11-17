<?php

class SolicitudController {
    private Solicitud $modelo;

    public function __construct() {
        $this->modelo = new Solicitud(Database::conectar());
    }

    
    public function guardar(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }
        $datos = [
            'nombre'     => trim($_POST['nombre'] ?? ''),
            'correo'     => trim($_POST['correo'] ?? ''),
            'telefono'   => trim($_POST['telefono'] ?? ''),
            'tarjeta_id' => (int)($_POST['tarjeta_id'] ?? 0),
            'mensaje'    => trim($_POST['mensaje'] ?? ''),
        ];
        if ($datos['nombre'] === '' || !filter_var($datos['correo'], FILTER_VALIDATE_EMAIL) || $datos['tarjeta_id'] < 1) {
            header('Location: index.php#contacto');
            exit;
        }
        $this->modelo->crear($datos);
        header('Location: index.php?page=gracias'); // página de gracias
        exit;
    }

    // Página de gracias
    public function gracias(): void {
        require __DIR__ . '/../views/gracias.php';
    }

   
    public function admin(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'] ?? '';
            if ($accion === 'actualizar') $this->modelo->actualizar($_POST);
            if ($accion === 'eliminar')   $this->modelo->eliminar((int)$_POST['id']);
            header('Location: index.php?page=admin');
            exit;
        }

        $buscar      = $_GET['buscar'] ?? '';
        $solicitudes = $this->modelo->listar($buscar);
        $editando    = isset($_GET['editar']) ? $this->modelo->buscar((int)$_GET['editar']) : null;
        $tarjetas    = (new Tarjeta(Database::conectar()))->todas();

        require __DIR__ . '/../views/admin.php';
    }
}