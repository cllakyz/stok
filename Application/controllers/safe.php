<?php
class safe extends controller
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
        $data = $this->model('safeModel')->safeList();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('safe/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function add()
    {
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('safe/add');
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST){
            $name = helper::cleaner($_POST['name']);
            if($name == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $add = $this->model("safeModel")->safeAdd($name);
            if($add){
                echo helper::ajaxResponse(100, "Kasa Eklendi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Kasa Eklenemedi");
                die;
            }
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function edit($id)
    {
        $data = $this->model('safeModel')->safeInfo($id);
        if(!$data){
            helper::redirect(SITE_URL."/safe");
            die;
        }
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('safe/edit', array('data' => $data));
        $this->render('site/footer');
    }

    public function update($id)
    {
        if($_POST){
            $name = helper::cleaner($_POST['name']);
            if($name == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $update = $this->model("safeModel")->safeEdit($id,$name);
            if($update){
                echo helper::ajaxResponse(100, "Kasa Düzenlendi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Kasa Düzenlenemedi");
                die;
            }
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
            $update = $this->model("safeModel")->safeChangeStatus($id,$status);
            if($update){
                echo helper::ajaxResponse(100, "Kasa Durumu Düzenlendi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Kasa Durumu Düzenlenemedi");
                die;
            }
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function delete()
    {
        if($_POST){
            $id = helper::cleaner($_POST['id']);
            $delete = $this->model('safeModel')->safeDelete($id);
            if($delete){
                echo helper::ajaxResponse(100, "Kasa Silindi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Kasa Silinemedi");
                die;
            }
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }
}