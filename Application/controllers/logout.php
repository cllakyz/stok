<?php

class logout extends controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->isLogged()){
            helper::redirect(SITE_URL);
            die;
        }
    }

    public function index()
    {
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        setcookie("email", null, -1, "/");
        setcookie("password", null, -1, "/");
        unset($_COOKIE['email']);
        unset($_COOKIE['password']);

        helper::redirect(SITE_URL);
        die;
    }
}