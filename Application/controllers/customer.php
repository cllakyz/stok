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
            $name = helper::cleaner($_POST['name']);
            $surname = helper::cleaner($_POST['surname']);
            $email = helper::cleaner($_POST['email']);
            $phone = helper::cleaner($_POST['phone']);
            $tc_no = helper::cleaner($_POST['tc_no']);
            $company = helper::cleaner($_POST['company']);
            $address = helper::cleaner($_POST['address']);
            $note = helper::cleaner($_POST['note']);
            if($name == "" || $surname == "" || $email == "" || $phone == "" || $tc_no == "" || $company == "" || $address == ""){
                helper::flashData("status", "Lütfen Tüm Alanları Eksiksiz Giriniz");
                helper::redirect(SITE_URL."/customer/add");
                die;
            }
            $add = $this->model("customerModel")->customerAdd($name, $surname, $email, $phone, $tc_no, $company, $address, $note);
            if($add){
                helper::flashData("status", "Müşteri Başarıyla Eklendi.");
                helper::redirect(SITE_URL."/customer/add");
                die;
            } else{
                helper::flashData("status", "Müşteri Eklenemedi");
                helper::redirect(SITE_URL."/customer/add");
                die;
            }
        } else{
            exit("Hatalı Giriş");
        }
    }

    public function edit($id)
    {
        $data = $this->model("customerModel")->customerInfo($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('customer/edit', array('data' => $data));
        $this->render('site/footer');
    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}