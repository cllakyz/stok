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

    public function add()
    {
        $category = $this->model('categoryModel')->categoryList();
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
            $modifiers = json_encode($_POST['modifier']);
            if($name == "" || $category_id == ""){
                helper::flashData("status", "Lütfen Tüm Alanları Eksiksiz Giriniz");
                helper::redirect(SITE_URL."/product/add");
                die;
            }
            $add = $this->model("productModel")->productAdd($name,$category_id,$modifiers);
            if($add){
                helper::flashData("status", "Ürün Başarıyla Eklendi.");
                helper::redirect(SITE_URL."/product/add");
                die;
            } else{
                helper::flashData("status", "Ürün Eklenemedi");
                helper::redirect(SITE_URL."/product/add");
                die;
            }
        } else{
            exit("Hatalı Giriş");
        }
    }

    public function edit($id)
    {
        $category = $this->model('categoryModel')->categoryList();
        $data = $this->model('productModel')->productInfo($id);
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
            $modifiers = json_encode($_POST['modifier']);
            if($name == "" || $category_id == ""){
                helper::flashData("status", "Lütfen Tüm Alanları Eksiksiz Giriniz");
                helper::redirect(SITE_URL."/product/edit/$id");
                die;
            }
            $update = $this->model("productModel")->productEdit($id,$name,$category_id,$modifiers);
            if($update){
                helper::flashData("status", "Ürün Başarıyla Düzenlendi.");
                helper::redirect(SITE_URL."/product/edit/$id");
                die;
            } else{
                helper::flashData("status", "Ürün Düzenlenemedi");
                helper::redirect(SITE_URL."/product/edit/$id");
                die;
            }
        } else{
            exit("Hatalı Giriş");
        }
    }

    public function delete($id)
    {
        $delete = $this->model('productModel')->productDelete($id);
        if($delete){
            helper::flashData("status", "Ürün Başarıyla Silindi.");
        } else{
            helper::flashData("status", "Ürün Silinemedi.");
        }
        helper::redirect(SITE_URL."/product");
        die;
    }
}