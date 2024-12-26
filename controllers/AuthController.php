<?php

class AuthController extends BaseController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function showRegister() {
        if(isset($_SESSION['user_id']))
        {
            $this->redirect('/');
        }
        $this->render('auth/register', [
            'errors' => [],
            'inputs' => []
        ]);
    }

    public function register() {
        $errors = [];
        $inputs = [
            'username' => $_POST['username'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($inputs['username'])) {
                $errors['username'] = 'Username is required';
            }
            if (empty($inputs['email'])) {
                $errors['email'] = 'Email is required';
            }
            if (empty($inputs['password'])) {
                $errors['password'] = 'Password is required';
            }

            if (empty($errors)) {
                if ($this->userModel->register(
                    $inputs['username'],
                    $inputs['email'],
                    $inputs['password']
                )) {
                    $this->redirect('/login');
                }
            }
        }

        $this->render('auth/register', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }

    public function showLogin() {
        if(isset($_SESSION['user_id']))
        {
            $this->redirect('/');
        }
        $this->render('auth/login', [
            'errors' => [],
            'inputs' => []
        ]);
    }

    public function login() {
        $errors = [];
        $inputs = [
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->userModel->login($inputs['email'], $inputs['password'])) {
                if($this->userModel->getRole() == "admin")
                {
                    $this->redirect('/dashboard');
                }
                else
                {
                    $this->redirect('/');
                }
                $this->redirect('/dashboard');
            } else {
                $errors['general'] = 'Invalid credentials';
            }
        }

        $this->render('auth/login', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }
    public function logout(){
        unset($_SESSION);
        session_destroy();
        $this->redirect('/login');
    }
}