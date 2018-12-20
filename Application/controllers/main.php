<?php
class main extends controller
{
    public function index()
    {
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('home');
        $this->render('site/footer');
    }
}