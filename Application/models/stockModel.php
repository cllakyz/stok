<?php
class stockModel extends model
{
    private $table;
    private $customer_table;
    private $safe_table;
    private $product_table;
    private $zaman;

    public function __construct()
    {
        $this->table = "stock";
        $this->customer_table = "customer";
        $this->product_table = "product";
        $this->safe_table = "safe";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function stockAdd($prd_id, $cus_id, $safe_id, $type, $qty, $price)
    {
        $add = $this->insert("INSERT INTO $this->table SET product_id = ?, customer_id = ?, safe_id = ?, action_type = ?, quantity = ?, price = ?, create_date = ?", array($prd_id, $cus_id, $safe_id, $type, $qty, $price, $this->zaman));
        return helper::outputStatus($add, "Stok işlemi eklendi", "Stok işlemi eklenemedi");
    }

    public function stockEdit($id, $prd_id, $cus_id, $safe_id, $type, $qty, $price)
    {
        $update = $this->exec("UPDATE $this->table SET product_id = ?, customer_id = ?, safe_id = ?, action_type = ?, quantity = ?, price = ?, update_date = ? WHERE id = ?", array($prd_id, $cus_id, $safe_id, $type, $qty, $price, $this->zaman, $id));
        return helper::outputStatus($update, "Stok işlemi bilgileri güncellendi", "Stok işlemi bilgileri güncellenemedi");
    }

    public function stockDelete($id)
    {
        $delete = $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
        return helper::outputStatus($delete, "Stok işlemi silindi", "Stok işlemi silinemedi");
    }

    public function stockInfo($id)
    {
        $data = $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
        return helper::outputDataStatus($data, "Stok işlemi bilgileri", "Stok işlemi bilgileri bulunamadı");
    }

    public function stockChangeStatus($id,$status)
    {
        $update = $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
        return helper::outputStatus($update, "Stok işlemi durumu güncellendi", "Stok işlemi durumu güncellenemedi");
    }

    public function stockList()
    {
        $cikti = array();
        $data = $this->getList("SELECT $this->table.*, $this->product_table.name AS product_name, $this->customer_table.name AS customer_name, $this->customer_table.surname AS customer_surname, $this->customer_table.id AS customer_id, $this->safe_table.name AS safe_name 
            FROM $this->table 
            LEFT JOIN $this->product_table 
            ON $this->table.product_id = $this->product_table.id
            LEFT JOIN $this->customer_table 
            ON $this->table.customer_id = $this->customer_table.id 
            LEFT JOIN $this->safe_table 
            ON $this->table.safe_id = $this->safe_table.id 
            WHERE $this->table.status != 2");
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return helper::outputDataStatus($cikti, "Stok işlemi listesi", "Stok ilemi bulunamadı");
    }
}