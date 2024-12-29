<?php

class BookController extends BaseController
{
    private $model;
    public function __construct()
    {
        $this->model = new Book();
    }
    public function index()
    {
        if (isset($_POST['filter'])) {
            $this->render('books/all', [
                'books' => $this->model->getBookByCategory($_POST['filter']),
                'categories' => (new Category())->getAll(),
            ]);
        } else {
            $this->render('books/all', [
                'books' => $this->model->getAll(),
                'categories' => (new Category())->getAll(),
            ]);
        }
    }
}
