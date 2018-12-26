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
            $add = $this->model("productModel")->add($name,$category_id,$modifiers);
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
}