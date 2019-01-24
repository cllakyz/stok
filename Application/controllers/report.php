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

    public function date()
    {
        if(isset($_GET['start_date']) && $_GET['start_date'] != "" && isset($_GET['end_date']) && $_GET['end_date'] != ""){
            $start_date = helper::cleaner($_GET['start_date']);
            $end_date   = helper::cleaner($_GET['end_date']);
            $data = $this->model('reportModel')->stockReportList($start_date, $end_date);
        } else{
            $data = $this->model('reportModel')->productReportList();
        }
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('report/date/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function safe()
    {
        $data = $this->model('reportModel')->safeReportList();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('report/safe/index', array('data' => $data));
        $this->render('site/footer');
    }
}