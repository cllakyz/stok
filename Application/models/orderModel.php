<?php
class orderModel extends model
{
    private $table;
    private $table_cust;
    private $zaman;

    public function __construct()
    {
        $this->table = "orders";
        $this->table_cust = "customer";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function orderAdd($cus_id, $user_id, $products, $total, $date)
    {
        $code = substr(abs(crc32($user_id.$cus_id.microtime(true))),0,9);
        $add = $this->insert("INSERT INTO $this->table SET customer_id = ?, user_id = ?, order_code = ?, products = ?, total_price = ?, order_date = ?, create_date = ?",array($cus_id, $user_id, $code, $products, $total, $date, $this->zaman));
        return helper::outputDataStatus($add, "Sipariş eklendi", "Sipariş eklenemedi");
    }

    public function orderList($status=NULL)
    {
        $cikti = array();
        $sql_array = array();
        if(!is_null($status)){
            $sql_text = $this->table.".status = ?";
            $sql_array[] = $status;
        } else{
            $sql_text = $this->table.".status != ?";
            $sql_array[] = 2;
        }
        $data = $this->getList("SELECT $this->table.*, $this->table_cust.name AS customer_name, $this->table_cust.surname AS customer_surname, $this->table_cust.company AS customer_company FROM $this->table LEFT JOIN $this->table_cust ON $this->table.customer_id = $this->table_cust.id WHERE $sql_text", $sql_array);
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return helper::outputDataStatus($cikti, "Sipariş listesi", "Sipariş bulunamadı");
    }

    public function orderInfo($id)
    {
        $data = $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
        return helper::outputDataStatus($data, "Sipariş bilgileri", "Sipariş bulunamadı");
    }

    public function orderEdit($id, $cus_id, $user_id, $products, $total, $date)
    {
        $update = $this->exec("UPDATE $this->table SET customer_id = ?, user_id = ?, products = ?, total_price = ?, order_date = ?, update_date = ? WHERE id = ?", array($cus_id, $user_id, $products, $total, $date, $this->zaman, $id));
        return helper::outputStatus($update, "Sipariş bilgileri güncellendi", "Sipariş bilgileri güncellenemedi");
    }

    public function orderChangeStatus($id,$status)
    {
        $update = $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
        return helper::outputStatus($update, "Sipariş durumu güncellendi", "Sipariş durumu güncellenemedi");
    }

    public function orderDelete($id)
    {
        $delete = $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
        return helper::outputStatus($delete, "Sipariş silindi", "Sipariş silinemedi");
    }
}