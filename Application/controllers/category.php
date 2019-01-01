<?php
class category extends controller
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
        $data = $this->model('categoryModel')->categoryList();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function add()
    {
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/add');
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST){
            $name = helper::cleaner($_POST['name']);
            if($name == ""){
                helper::flashData("status", "Lütfen Tüm Alanları Eksiksiz Giriniz");
                helper::redirect(SITE_URL."/category/add");
                die;
            }
            $add = $this->model("categoryModel")->categoryAdd($name);
            if($add){
                helper::flashData("status", "Kategori Başarıyla Eklendi.");
                helper::redirect(SITE_URL."/category/add");
                die;
            } else{
                helper::flashData("status", "Kategori Eklenemedi");
                helper::redirect(SITE_URL."/category/add");
                die;
            }
        } else{
            exit("Hatalı Giriş");
        }
    }

    public function edit($id)
    {
        $data = $this->model('categoryModel')->categoryInfo($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/edit', array('data' => $data));
        $this->render('site/footer');
    }

    public function update($id)
    {
        if($_POST){
            $name = helper::cleaner($_POST['name']);
            if($name == ""){
                helper::flashData("status", "Lütfen Tüm Alanları Eksiksiz Giriniz");
                helper::redirect(SITE_URL."/category/edit/$id");
                die;
            }
            $update = $this->model("categoryModel")->categoryEdit($id,$name);
            if($update){
                helper::flashData("status", "Kategori Başarıyla Düzenlendi.");
                helper::redirect(SITE_URL."/category/edit/$id");
                die;
            } else{
                helper::flashData("status", "Kategori Düzenlenemedi");
                helper::redirect(SITE_URL."/category/edit/$id");
                die;
            }
        } else{
            exit("Hatalı Giriş");
        }
    }

    public function delete($id)
    {
        $delete = $this->model('categoryModel')->categoryDelete($id);
        if($delete){
            helper::flashData("status", "Kategori Başarıyla Silindi.");
        } else{
            helper::flashData("status", "Kategori Silinemedi.");
        }
        helper::redirect(SITE_URL."/category");
        die;
    }
}