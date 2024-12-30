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
            $this->model->borrowBook($_SESSION['user_id'],$_GET['id']);
            $this->redirect('/');
        }

    }