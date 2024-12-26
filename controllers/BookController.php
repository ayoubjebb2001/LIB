<?php

    class BookController extends BaseController{
        private $model ;
        public function __construct(){
            $this->model = new Book();
        }
        public function index(){
            $this->render('books/all', [
                'categories' => (new Category())->getAll(),
            ]);
        }

         
    }