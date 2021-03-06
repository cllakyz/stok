<?php
class product extends controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->isLogged() || !$this->model('userModel')->checkPermissionControl($this->userId, "product")){
            helper::redirect(SITE_URL);
            die;
        }
    }

    public function index()
    {
        $data = $this->model('productModel')->productList();
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('product/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function add()
    {
        $category = $this->model('categoryModel')->categoryList(1);
        if($category['status_code'] == 101){
            helper::redirect(SITE_URL."/product");
            die;
        }
        $category = $category['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('product/add', array('category' => $category));
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST){
            $name = helper::cleaner($_POST['name']);
            $category_id = intval(helper::cleaner($_POST['category_id']));
            $modifiers = NULL;
            if(isset($_POST['modifier']) && count($_POST['modifier']) > 0){
                $modifiers = json_encode($_POST['modifier']);
            }
            if($name == "" || $category_id == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $add = $this->model("productModel")->productAdd($name,$category_id,$modifiers);
            echo helper::ajaxResponse($add['status_code'], $add['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function edit($id)
    {
        $category = $this->model('categoryModel')->categoryList(1);
        $data = $this->model('productModel')->productInfo($id);
        if($category['status_code'] == 101 || $data['status_code'] == 101){
            helper::redirect(SITE_URL."/product");
            die;
        }
        $category = $category['data'];
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('product/edit', array('category' => $category, 'data' => $data));
        $this->render('site/footer');
    }

    public function update($id)
    {
        if($_POST){
            $name = helper::cleaner($_POST['name']);
            $category_id = intval(helper::cleaner($_POST['category_id']));
            $modifiers = NULL;
            if(isset($_POST['modifier']) && count($_POST['modifier']) > 0){
                $modifiers = json_encode($_POST['modifier']);
            }
            if($name == "" || $category_id == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $update = $this->model("productModel")->productEdit($id,$name,$category_id,$modifiers);
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
            $update = $this->model("productModel")->productChangeStatus($id,$status);
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
            $delete = $this->model('productModel')->productDelete($id);
            echo helper::ajaxResponse($delete['status_code'], $delete['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function import()
    {
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('product/import');
        $this->render('site/footer');
    }
}