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

    public function categoryCheck($name)
    {
        return DB::getVar("SELECT COUNT(id) FROM $this->table WHERE name=? AND status != 2",array($name));
    }

    public function add($name)
    {
        if($this->categoryCheck($name)){
            return false;
        }
        return $this->insert("INSERT INTO $this->table SET name=?, create_date=?",array($name,$this->zaman));
    }

    public function categoryList()
    {
        $cikti = array();
        $data = $this->getList("SELECT * FROM $this->table WHERE status != 2");
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return $cikti;
    }

    public function info($id)
    {
        return $this->getRow("SELECT * FROM $this->table WHERE id=?", array($id));
    }

    public function update($id,$name)
    {
        return $this->exec("UPDATE $this->table SET name=?, update_date=? WHERE id=?", array($name, $this->zaman, $id));
    }

    public function delete($id)
    {
        return $this->exec("DELETE FROM $this->table WHERE id=?", array($id));
    }
}