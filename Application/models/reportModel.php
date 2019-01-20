<?php

class reportModel extends model
{
    private $product_table;
    private $customer_table;
    private $stock_table;

    public function __construct()
    {
        $this->product_table = "product";
        $this->customer_table = "customer";
        $this->stock_table = "stock";
    }

    public function productReportList()
    {
        $data = $this->getList("SELECT * FROM $this->product_table WHERE status != 2");
        $outPut = array();
        if ($data){
            foreach ($data as $d){
                $incoming_data = $this->productStockActionReport($d->id);
                $outcoming_data = $this->productStockActionReport($d->id, 1);
                $d->incoming_sum = $incoming_data->sumPrice;
                $d->incoming_qty = $incoming_data->sumQuantity;
                $d->outcoming_sum = $outcoming_data->sumPrice;
                $d->outcoming_qty = $outcoming_data->sumQuantity;
                $outPut[] = $d;
            }
        }
        return $data;
    }

    public function productStockActionReport($prd_id, $type=0)
    {
        $data = $this->getRow("SELECT SUM(price)*quantity AS sumPrice, SUM(quantity) AS sumQuantity FROM $this->stock_table WHERE product_id = ? AND action_type = ?", array($prd_id, $type));
        return $data;
    }

    public function customerReportList()
    {
        $data = $this->getList("SELECT * FROM $this->customer_table WHERE status != 2");
        return $data;
    }
}