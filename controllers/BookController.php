<?php

    class BookController extends BaseController{
        private $model ;
        public function __construct(){
            $this->model = new Book();
        }
        public function index(){
            $books = $this->model->getAll();
            if (isset($_REQUEST["status"]) && $_REQUEST["status"] !== "All") {
                $status = $_REQUEST["status"];
                $books = $this->model->getBookByStatus($status);
            }
            
        
            $this->render('books/all', [
                'categories' => (new Category())->getAll(),
                'books' => $books
            ]);
            // var_dump($booksNames);
            // die();
            
                    }
        public function details() {
            $book_id = $_GET['id'] ?? null;
            
            if (!$book_id) {
                header('Location: /');
                exit;
            }
            $book = $this->model->getBookById($book_id);
            
            if (!$book) {
                header('Location: /');
                exit;
            }
            $category = new Category();
            $cat = $category->getCategoryById($book['category_id']);
            $this->render('books/details', [
                'book' => $book,
                'category' => $cat
            ]);
        }

         
    }