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
        if(!$customer || !$product){
            $this->render(SITE_URL."/stock");
            die;
        }
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stock/add', array('customer' => $customer, 'product' => $product));
        $this->render('site/footer');
    }

    public function send()
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function changeStatus()
    {

    }

    public function delete()
    {

    }
}