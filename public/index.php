<?php
session_start();

// Define root path
define('ROOT_PATH', dirname(__DIR__));

// Load dependencies
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/routes/Router.php';
require_once ROOT_PATH . '/controllers/BaseController.php';
require_once ROOT_PATH . '/controllers/AuthController.php';
require_once ROOT_PATH . '/controllers/BookController.php';
require_once ROOT_PATH . '/models/Database.php';
require_once ROOT_PATH . '/models/User.php';
require_once ROOT_PATH . '/models/Book.php';
require_once ROOT_PATH . '/models/Category.php';

// Initialize router
$router = new Router();

// Define routes
$router->add('GET', '/', 'BookController', 'index');
$router->add('POST', '/books/filter', 'BookController', 'filter');
$router->add('GET', '/register', 'AuthController', 'showRegister');
$router->add('POST', '/register', 'AuthController', 'register');
$router->add('GET', '/login', 'AuthController', 'showLogin');
$router->add('POST', '/login', 'AuthController', 'login');
$router->add('GET', '/logout', 'AuthController', 'logout');
$router->add('GET', '/book/details', 'BookController', 'details');
$router->add('GET' ,'/borrow ', 'BorrowController' ,'add');


$router->add('GET', '/dashboard', 'AdminController', 'index');

// Dispatch request
$router->dispatch();