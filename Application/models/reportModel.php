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
                $d->incoming_sum = $incoming_data->sumPrice ? $incoming_data->sumPrice : 0;
                $d->incoming_qty = $incoming_data->sumQuantity ? $incoming_data->sumQuantity : 0;
                $d->outcoming_sum = $outcoming_data->sumPrice ? $outcoming_data->sumPrice : 0;
                $d->outcoming_qty = $outcoming_data->sumQuantity ? $outcoming_data->sumQuantity : 0;
                $outPut[] = $d;
            }
        }
        return $outPut;
    }

    public function stockReportList($start, $end)
    {
        $start = date('Y-m-d', strtotime($start));
        $end   = date('Y-m-d', strtotime($end));
        $data = $this->getList("
                SELECT $this->stock_table.*, $this->product_table.name FROM $this->stock_table 
                INNER JOIN $this->product_table 
                ON $this->product_table.id = $this->stock_table.product_id 
                WHERE $this->stock_table.status != 2 
                AND DATE($this->stock_table.create_date) BETWEEN ? AND ? GROUP BY $this->stock_table.product_id", array($start, $end));
        $outPut = array();
        if ($data){
            foreach ($data as $d){
                $incoming_data = $this->productStockActionReport($d->product_id);
                $outcoming_data = $this->productStockActionReport($d->product_id, 1);
                $d->incoming_sum = $incoming_data->sumPrice ? $incoming_data->sumPrice : 0;
                $d->incoming_qty = $incoming_data->sumQuantity ? $incoming_data->sumQuantity : 0;
                $d->outcoming_sum = $outcoming_data->sumPrice ? $outcoming_data->sumPrice : 0;
                $d->outcoming_qty = $outcoming_data->sumQuantity ? $outcoming_data->sumQuantity : 0;
                $outPut[] = $d;
            }
        }
        return $outPut;
    }

    public function productStockActionReport($prd_id, $type=0)
    {
        $data = $this->getRow("SELECT SUM(price)*quantity AS sumPrice, SUM(quantity) AS sumQuantity FROM $this->stock_table WHERE product_id = ? AND action_type = ?", array($prd_id, $type));
        return $data;
    }

    public function customerReportList()
    {
        $data = $this->getList("SELECT * FROM $this->customer_table WHERE status != 2");
        $outPut = array();
        if($data){
            foreach ($data as $d){
                $received_data = $this->customerStockActionReport($d->id);
                $sold_data = $this->customerStockActionReport($d->id, 1);
                $d->received_price = $received_data->sumPrice ? $received_data->sumPrice : 0;
                $d->received_qty = $received_data->sumQuantity ? $received_data->sumQuantity : 0;
                $d->sold_price = $sold_data->sumPrice ? $sold_data->sumPrice : 0;
                $d->sold_qty = $sold_data->sumQuantity ? $sold_data->sumQuantity : 0;
                $outPut[] = $d;
            }
        }
        return $outPut;
    }

    public function customerStockActionReport($cust_id, $type=0)
    {
        $data = $this->getRow("SELECT SUM(price)*quantity AS sumPrice, SUM(quantity) AS sumQuantity FROM $this->stock_table WHERE customer_id = ? AND action_type = ?", array($cust_id, $type));
        return $data;
    }

    public function totalPriceReport($type=0)
    {
        $data = DB::getRow("SELECT SUM(quantity*price) AS sumPrice FROM stock WHERE action_type = ?", array($type));
        return $data ? $data->sumPrice : 0;
    }

    public function totalCustomer()
    {
        $data = DB::getRow("SELECT COUNT(id) AS customer_count FROM customer WHERE status != ?", array(2));
        return $data->customer_count;
    }
}