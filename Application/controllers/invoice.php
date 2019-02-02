<?php

class invoice extends controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->isLogged() || !$this->model('userModel')->checkPermissionControl($this->userId, "invoice")){
            helper::redirect(SITE_URL);
            die;
        }
    }

    public function index()
    {
        $data = $this->model('invoiceModel')->invoiceList();
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('invoice/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function add()
    {
        $customer = $this->model('customerModel')->customerList(1);
        if($customer['status_code'] == 101){
            helper::redirect(SITE_URL."/invoice");
            die;
        }
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('invoice/add', array('customer' => $customer['data']));
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST){
            $customer_id    = helper::cleaner($_POST['customer_id']);
            $no             = helper::cleaner($_POST['no']);
            $type           = helper::cleaner($_POST['type']);
            $total          = helper::cleaner($_POST['total']);
            $description    = helper::cleaner($_POST['description']);
            if($description == ""){
                $description = NULL;
            }
            if($customer_id == "" || $no == "" || $type == "" || $total == 0){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $add = $this->model("invoiceModel")->invoiceAdd($customer_id, $no, $type, $total, $description);
            echo helper::ajaxResponse($add['status_code'], $add['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function edit($id)
    {
        $data = $this->model('invoiceModel')->invoiceInfo($id);
        $customer = $this->model('customerModel')->customerList(1);
        if($data['status_code'] == 101 || $customer['status_code'] == 101){
            helper::redirect(SITE_URL."/invoice");
            die;
        }
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('invoice/edit', array('data' => $data, 'customer' => $customer['data']));
        $this->render('site/footer');
    }

    public function update($id)
    {
        if($_POST){
            $customer_id    = helper::cleaner($_POST['customer_id']);
            $no             = helper::cleaner($_POST['no']);
            $type           = helper::cleaner($_POST['type']);
            $total          = helper::cleaner($_POST['total']);
            $description    = helper::cleaner($_POST['description']);
            if($description == ""){
                $description = NULL;
            }
            if($customer_id == "" || $no == "" || $type == "" || $total == 0){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $update = $this->model("invoiceModel")->invoiceEdit($id, $customer_id, $no, $type, $total, $description);
            echo helper::ajaxResponse($update['status_code'], $update['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function changeStatus()
    {
        if($_POST){
            $id = helper::cleaner($_POST['id']);
            $status = helper::cleaner($_POST['status']);
            $update = $this->model("invoiceModel")->invoiceChangeStatus($id,$status);
            echo helper::ajaxResponse($update['status_code'], $update['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function delete()
    {
        if($_POST){
            $id = helper::cleaner($_POST['id']);
            $delete = $this->model('invoiceModel')->invoiceDelete($id);
            echo helper::ajaxResponse($delete['status_code'], $delete['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }
}