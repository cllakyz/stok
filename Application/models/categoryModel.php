<?php
class categoryModel extends model
{
    private $table;
    private $zaman;

    public function __construct()
    {
        $this->table = "category";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function categoryAdd($name)
    {
        return $this->insert("INSERT INTO $this->table SET name = ?, create_date = ?",array($name,$this->zaman));
    }

    public function categoryList($status=NULL)
    {
        $cikti = array();
        $sql_array = array();
        if(!is_null($status)){
            $sql_text = "status = ?";
            $sql_array[] = $status;
        } else{
            $sql_text = "status != ?";
            $sql_array[] = 2;
        }
        $data = $this->getList("SELECT * FROM $this->table WHERE $sql_text", $sql_array);
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return $cikti;
    }

    public function categoryInfo($id)
    {
        return $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
    }

    public function categoryEdit($id,$name)
    {
        return $this->exec("UPDATE $this->table SET name = ?, update_date = ? WHERE id = ?", array($name, $this->zaman, $id));
    }

    public function categoryChangeStatus($id,$status)
    {
        return $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
    }

    public function categoryDelete($id)
    {
        return $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
    }

    public function getCategoryId($name)
    {
        $catId = $this->getVar("SELECT id FROM $this->table WHERE name = ?", array($name));
        if(!$catId){
            $catId = $this->categoryAdd($name);
        }
        return $catId;
    }
}