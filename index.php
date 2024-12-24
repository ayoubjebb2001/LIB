<?php
session_start();
require_once 'config/database.php';
require_once 'models/Database.php';
require_once 'models/User.php';
require_once 'models/Book.php';
require_once 'models/Borrowing.php';

$action = $_GET['action'] ?? 'home';

switch($action) {
    case 'login':
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($user->login($_POST['email'], $_POST['password'])) {
                header('Location: index.php?action=books');
            }
        }
        include 'views/login.php';
        break;

    case 'books':
        $book = new Book();
        $books = $book->getAllBooks();
        include 'views/books/all.php';
        break;

    default:
        include 'views/login.php';
        break;
}