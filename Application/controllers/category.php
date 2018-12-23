<?php
class category extends controller
{
    public function add()
    {
        if(!$this->session->isLogged()){
            helper::redirect(SITE_URL);
            die;
        }
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
            $add = $this->model("categoryModel")->add($name);
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
}