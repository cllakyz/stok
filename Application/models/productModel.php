<?php
class productModel extends model
{
    private $table;
    private $category_table;
    private $zaman;

    public function __construct()
    {
        $this->table = "product";
        $this->category_table = "category";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function productCheck($sef, $cat_id, $not_in=NULL)
    {
        $sql_text = "";
        $sql_array = array($sef, $cat_id, 2);
        if(!is_null($not_in)){
            $sql_text .= " AND id != ?";
            $sql_array[] = $not_in;
        }
        $kontrol = $this->getVar("SELECT COUNT(id) FROM $this->table WHERE sef = ? AND category_id = ? AND status != ?$sql_text", $sql_array);
        return $kontrol;
    }

    public function productAdd($name, $cat_id, $modifier, $date=NULL)
    {
        $sef = helper::sef($name);
        $check = $this->productCheck($sef, $cat_id);
        if($check){
            return array('status_code' => 101, 'status_text' => "Aynı isimde birden fazla ürün olamaz");
        }
        $sql_array = array($cat_id, $name, $sef, $modifier);
        if(!is_null($date)){
            $sql_array[] = date('Y-m-d H:i:s', strtotime($date));
        } else{
            $sql_array[] = $this->zaman;
        }
        $add = $this->insert("INSERT INTO $this->table SET category_id = ?, name = ?, sef = ?, modifiers = ?, create_date = ?", $sql_array);
        return helper::outputStatus($add, "Ürün eklendi", "Ürün eklenemedi");
    }

    public function productEdit($id, $name, $cat_id, $modifier)
    {
        $sef = helper::sef($name);
        $check = $this->productCheck($sef, $cat_id, $id);
        if($check){
            return array('status_code' => 101, 'status_text' => "Aynı isimde birden fazla ürün olamaz");
        }
        $update = $this->exec("UPDATE $this->table SET name = ?, sef = ?, category_id = ?, modifiers = ?, update_date = ? WHERE id = ?", array($name, $sef, $cat_id, $modifier, $this->zaman, $id));
        return helper::outputStatus($update, "Ürün bilgileri güncellendi", "Ürün bilgileri güncellenemedi");
    }

    public function productDelete($id)
    {
        $delete = $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
        return helper::outputStatus($delete, "Ürün silindi", "Ürün silinemedi");
    }

    public function productInfo($id)
    {
        $data = $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
        return helper::outputDataStatus($data, "Ürün bilgileri", "Ürün bulunamadı");
    }

    public function productChangeStatus($id,$status)
    {
        $update = $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
        return helper::outputStatus($update, "Ürün durumu güncellendi", "Ürün durumu güncellenemedi");
    }

    public function productList()
    {
        $cikti = array();
        $data = $this->getList("SELECT $this->table.*, $this->category_table.name AS category_name 
            FROM $this->table LEFT JOIN 
            $this->category_table ON $this->table.category_id = $this->category_table.id 
            WHERE $this->table.status != 2");
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return helper::outputDataStatus($cikti, "Ürün listesi", "Ürün bulunamadı");
    }

    public function productSearch($name)
    {
        $cikti = array();
        $data = $this->getList("SELECT * FROM $this->table WHERE name like ? AND status != 2", array("%$name%"));
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return helper::outputDataStatus($cikti, "Ürün listesi", "Ürün bulunamadı");
    }
}