<?php
class user extends controller
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
        $data = $this->model('userModel')->userList($this->userInfo->id);
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('user/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function add()
    {
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('user/add');
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST){
            $name               = helper::cleaner($_POST['name']);
            $email              = helper::cleaner($_POST['email']);
            $password           = helper::cleaner($_POST['password']);
            $password_repeat    = helper::cleaner($_POST['password_repeat']);
            $permissions        = NULL;
            if(count($_POST['permissions'])){
                $permissions    = $_POST['permissions'];
            }
            if($name == "" || $email == "" || $password == "" || $password_repeat == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            if($password != $password_repeat){
                echo helper::ajaxResponse(101, "Girilen Şifreler Eşit Değil");
                die;
            }
            $add = $this->model("userModel")->userAdd($name, $email, $password, json_encode($permissions));
            echo helper::ajaxResponse($add['status_code'], $add['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function edit($id)
    {
        $data = $this->model('userModel')->userInfo($id);
        if($data['status_code'] == 101){
            helper::redirect(SITE_URL."/user");
            die;
        }
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('user/edit', array('data' => $data));
        $this->render('site/footer');
    }

    public function update($id)
    {
        if($_POST){
            $name               = helper::cleaner($_POST['name']);
            $email              = helper::cleaner($_POST['email']);
            $password           = helper::cleaner($_POST['password']);
            $password_repeat    = helper::cleaner($_POST['password_repeat']);
            $permissions        = NULL;
            if(count($_POST['permissions'])){
                $permissions    = $_POST['permissions'];
            }
            if($name == "" || $email == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            if($password != ""){
                if($password != $password_repeat){
                    echo helper::ajaxResponse(101, "Girilen Şifreler Eşit Değil");
                    die;
                }
            } else{
                $password = NULL;
            }

            $update = $this->model("userModel")->userEdit($id, $name, $email, json_encode($permissions), $password);
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
            $update = $this->model("userModel")->userChangeStatus($id,$status);
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
            $delete = $this->model('userModel')->userDelete($id);
            echo helper::ajaxResponse($delete['status_code'], $delete['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }
}