<?php

class report extends controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->isLogged()){
            helper::redirect(SITE_URL);
            die;
        }
    }

    public function product()
    {
        $data = $this->model('reportModel')->productReportList();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('report/product/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function customer()
    {
        $data = $this->model("reportModel")->customerReportList();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('report/customer/index', array('data' => $data));
        $this->render('site/footer');
    }
}