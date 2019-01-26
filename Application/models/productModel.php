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

    public function productCheck($name, $cat_id, $not_in=NULL)
    {
        $sql_text = "";
        $sql_array = array($name, $cat_id, 2);
        if(!is_null($not_in)){
            $sql_text .= " AND id != ?";
            $sql_array[] = $not_in;
        }
        return $this->getVar("SELECT COUNT(id) FROM $this->table WHERE name = ? AND category_id = ? AND status != ?$sql_text", $sql_array);
    }

    public function productAdd($name, $cat_id, $modifier, $date=NULL)
    {
        $check = $this->productCheck($name, $cat_id);
        if($check > 0){
            return false;
        }
        $sql_array = array($cat_id, $name, $modifier);
        if(!is_null($date)){
            $sql_array[] = date('Y-m-d H:i:s', strtotime($date));
        } else{
            $sql_array[] = $this->zaman;
        }
        return $this->insert("INSERT INTO $this->table SET category_id = ?, name = ?, modifiers = ?, create_date = ?", $sql_array);
    }

    public function productEdit($id, $name, $cat_id, $modifier)
    {
        $check = $this->productCheck($name, $cat_id, $id);
        if($check > 0){
            return false;
        }
        return $this->exec("UPDATE $this->table SET name = ?, category_id = ?, modifiers = ?, update_date = ? WHERE id = ?", array($name, $cat_id, $modifier, $this->zaman, $id));
    }

    public function productDelete($id)
    {
        return $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
    }

    public function productInfo($id)
    {
        return $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
    }

    public function productChangeStatus($id,$status)
    {
        return $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
    }

    public function productList()
    {
        return $this->getList("SELECT $this->table.*, $this->category_table.name AS category_name 
            FROM $this->table LEFT JOIN 
            $this->category_table ON $this->table.category_id = $this->category_table.id 
            WHERE $this->table.status != 2");
    }

    public function productSearch($name)
    {
        return $this->getList("SELECT * FROM $this->table WHERE name like ? AND status != 2", array("%$name%"));
    }
}