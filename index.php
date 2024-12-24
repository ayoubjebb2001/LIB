<?php
require_once 'config/database.php';
require_once 'models/Database.php';
require_once 'controllers/UserController.php';
require_once 'controllers/BookController.php';
require_once     

// Routage basique
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'book';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Instanciation du contrôleur approprié
switch($controller) {
    case 'user':
        $controller = new UserController();
        break;
    case 'book':
        $controller = new BookController();
        break;
    default:
        // Gestion erreur 404
        break;
}

// Appel de l'action
if(method_exists($controller, $action)) {
    $controller->$action();
} else {
    // Gestion erreur 404
}