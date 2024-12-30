<?php

abstract class BaseController {
    protected function render($view, $data = []) {
        extract($data);
        require_once "../views/{$view}.php";
    }

    protected function redirect($url) {
        header("Location: $url");
        exit();
    }

    protected function with($key, $value) {
        $_SESSION[$key] = $value;
        return $this;
    }
}