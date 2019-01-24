<?php

class stock extends controller
{
    public function index()
    {
        $data = $this->model('stockModel')->stockList();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stock/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function add()
    {
        $customer = $this->model('customerModel')->customerList(1);
        $product = $this->model('productModel')->productList(1);
        $safe = $this->model('safeModel')->safeList(1);
        if(!$customer || !$product || !$safe){
            $this->render(SITE_URL."/stock");
            die;
        }
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stock/add', array('customer' => $customer, 'product' => $product, 'safe' => $safe));
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST){
            $product_id     = helper::cleaner($_POST['product_id']);
            $action_type    = helper::cleaner($_POST['action_type']);
            $quantity       = helper::cleaner($_POST['quantity']);
            $price          = helper::cleaner($_POST['price']);
            if(isset($_POST['customer_id']) && helper::cleaner($_POST['customer_id']) != ""){
                $customer_id = helper::cleaner($_POST['customer_id']);
            } else{
                $customer_id = NULL;
            }
            if(isset($_POST['safe_id']) && helper::cleaner($_POST['safe_id']) != ""){
                $safe_id = helper::cleaner($_POST['safe_id']);
            } else{
                $safe_id = NULL;
            }
            if($product_id == "" || $action_type == "" || $quantity == "" || $quantity == 0 || $price == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $add = $this->model("stockModel")->stockAdd($product_id, $customer_id, $safe_id, $action_type, $quantity, $price);
            if($add){
                echo helper::ajaxResponse(100, "Stok Eklendi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Stok Eklenemedi");
                die;
            }
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function edit($id)
    {
        $data = $this->model("stockModel")->stockInfo($id);
        $customer = $this->model('customerModel')->customerList(1);
        $product = $this->model('productModel')->productList(1);
        $safe = $this->model('safeModel')->safeList(1);
        if(!$customer || !$product || !$safe || !$data){
            $this->render(SITE_URL."/stock");
            die;
        }
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stock/edit', array('data' => $data, 'customer' => $customer, 'product' => $product, 'safe' => $safe));
        $this->render('site/footer');
    }

    public function update($id)
    {
        if($_POST){
            $product_id     = helper::cleaner($_POST['product_id']);
            $action_type    = helper::cleaner($_POST['action_type']);
            $quantity       = helper::cleaner($_POST['quantity']);
            $price          = helper::cleaner($_POST['price']);
            if(isset($_POST['customer_id']) && helper::cleaner($_POST['customer_id']) != ""){
                $customer_id = helper::cleaner($_POST['customer_id']);
            } else{
                $customer_id = NULL;
            }
            if(isset($_POST['safe_id']) && helper::cleaner($_POST['safe_id']) != ""){
                $safe_id = helper::cleaner($_POST['safe_id']);
            } else{
                $safe_id = NULL;
            }
            if($product_id == "" || $action_type == "" || $quantity == "" || $quantity == 0 || $price == ""){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $update = $this->model("stockModel")->stockEdit($id, $product_id, $customer_id, $safe_id, $action_type, $quantity, $price);
            if($update){
                echo helper::ajaxResponse(100, "Stok Düzenlendi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Stok Düzenlenemedi");
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
            $update = $this->model("stockModel")->stockChangeStatus($id,$status);
            if($update){
                echo helper::ajaxResponse(100, "Stok Durumu Düzenlendi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Stok Durumu Düzenlenemedi");
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
            $delete = $this->model('stockModel')->stockDelete($id);
            if($delete){
                echo helper::ajaxResponse(100, "Stok Silindi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Stok Silinemedi");
                die;
            }
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }
}