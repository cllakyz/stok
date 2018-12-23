<?php
class product extends controller
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
        $data = $this->model('productModel')->productList();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('product/index', array('data' => $data));
        $this->render('site/footer');
    }
}