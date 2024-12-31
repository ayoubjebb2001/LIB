<?php
    class BorrowController extends BaseController{
        private $model;

        public function __construct(){
            $this->model = new Borrowing();
        }

        public function add(){
            if(!isset($_SESSION['user_id'])){
                $this->redirect('/login');
            }
            // convert GET['id'] to integer
            $this->model->borrowBook($_SESSION['user_id'], intval($_GET['id']));
            $this->redirect('/')->with('success', 'Book borrowed successfully.');
        }

        public function reserve(){
            if(!isset($_SESSION['user_id'])){
                $this->redirect('/login');
            }
            // Check if the reserver has already borrowed the book
            $book_borrower = $this->model->getBookBorrower($_GET['id']);
            if ($book_borrower && $book_borrower['user_id'] == $_SESSION['user_id']) {
                $this->redirect('/')->with('error', 'You have already borrowed this book.');
            }

            $this->model->reserveBook($_SESSION['user_id'],$_GET['id']);
            $this->redirect('/')->with('success', 'Book reserved successfully.');
        }

        public function return(){
            if(!isset($_SESSION['user_id'])){
                $this->redirect('/login');
            }
            $this->model->returnBook($_SESSION['user_id'], $_GET['id']);
            $this->redirect('/')->with('success', 'Book returned successfully.');
        }
    }