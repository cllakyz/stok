<?php
class order extends controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->isLogged() || !$this->model('userModel')->checkPermissionControl($this->userId, "order")){
            helper::redirect(SITE_URL);
            die;
        }
    }

    public function index()
    {
        $data = $this->model('orderModel')->orderList();
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('order/index', array('data' => $data));
        $this->render('site/footer');
    }

    public function add()
    {
        $customer = $this->model('customerModel')->customerList(1);
        $product = $this->model('productModel')->productList(1);
        if($customer['status_code'] == 101 || $product['status_code'] == 101){
            helper::redirect(SITE_URL."/order");
            die;
        }
        $product = $product['data'];
        $customer = $customer['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('order/add', array('customer' => $customer, 'product' => $product));
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST){
            $products = $_POST['products'];
            $customer_id = helper::cleaner($_POST['customer_id']);
            $order_date = date('Y-m-d', strtotime(helper::cleaner($_POST['order_date'])));
            $total_price = helper::cleaner($_POST['total_price']);
            if(count($products) == 0 || $customer_id == "" || $order_date == "" || $total_price == 0){
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
            $add = $this->model("orderModel")->orderAdd($customer_id, $this->userId, json_encode($products), $total_price, $order_date);
            echo helper::ajaxResponse($add['status_code'], $add['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function edit($id)
    {
        $data = $this->model('orderModel')->orderInfo($id);
        if($data['status_code'] == 101){
            helper::redirect(SITE_URL."/order");
            die;
        }
        $data = $data['data'];
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('order/edit', array('data' => $data));
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
            $update = $this->model("orderModel")->orderEdit($id,$name);
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
            $update = $this->model("orderModel")->orderChangeStatus($id,$status);
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
            $delete = $this->model('orderModel')->orderDelete($id);
            echo helper::ajaxResponse($delete['status_code'], $delete['status_text']);
            die;
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }
}