<?php

class customer extends controller
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
        $data = $this->model("customerModel")->customerList();
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('customer/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function add()
    {
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('customer/add');
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST){
            $name       = helper::cleaner($_POST['name']);
            $surname    = helper::cleaner($_POST['surname']);
            $email      = helper::cleaner($_POST['email']);
            $phone      = helper::cleaner($_POST['phone']);
            $tc_no      = helper::cleaner($_POST['tc_no']);
            $company    = helper::cleaner($_POST['company']);
            $address    = helper::cleaner($_POST['address']);
            $note       = helper::cleaner($_POST['note']);
            if($name == "" || $surname == "" || $email == "" || $phone == "" || $tc_no == "" || $company == "" || $address == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $add = $this->model("customerModel")->customerAdd($name, $surname, $email, $phone, $tc_no, $company, $address, $note);
            echo helper::ajaxResponse($add['status_code'], $add['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function edit($id)
    {
        $data = $this->model("customerModel")->customerInfo($id);
        if($data['status_code'] == 101){
            helper::redirect(SITE_URL."/customer");
            die;
        }
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('customer/edit', array('data' => $data));
        $this->render('site/footer');
    }

    public function update($id)
    {
        if($_POST){
            $name       = helper::cleaner($_POST['name']);
            $surname    = helper::cleaner($_POST['surname']);
            $email      = helper::cleaner($_POST['email']);
            $phone      = helper::cleaner($_POST['phone']);
            $tc_no      = helper::cleaner($_POST['tc_no']);
            $company    = helper::cleaner($_POST['company']);
            $address    = helper::cleaner($_POST['address']);
            $note       = helper::cleaner($_POST['note']);
            if($name == "" || $surname == "" || $email == "" || $phone == "" || $tc_no == "" || $company == "" || $address == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $update = $this->model("customerModel")->customerEdit($id, $name, $surname, $email, $phone, $tc_no, $company, $address, $note);
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
            $update = $this->model("customerModel")->customerChangeStatus($id,$status);
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
            $delete = $this->model('customerModel')->customerDelete($id);
            echo helper::ajaxResponse($delete['status_code'], $delete['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }
}