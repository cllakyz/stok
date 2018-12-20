<?php
class main extends controller
{
    public function index()
    {
        if(!$this->session->isLogged()){
            helper::redirect(SITE_URL."/login");
            exit;
        }
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('home');
        $this->render('site/footer');
    }
}