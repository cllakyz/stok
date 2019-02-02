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
        DB::exec("UPDATE user SET token = ? WHERE id = ?", array(NULL, $_SESSION['loginUserId']));
        unset($_SESSION['loginUserId']);
        unset($_SESSION['loginUserToken']);

        setcookie("loginUserId", null, -1, "/");
        setcookie("loginUserToken", null, -1, "/");
        unset($_COOKIE['loginUserId']);
        unset($_COOKIE['loginUserToken']);

        helper::redirect(SITE_URL);
        die;
    }
}