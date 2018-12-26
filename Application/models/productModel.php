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

    public function productCheck($name)
    {
        return DB::getVar("SELECT COUNT(id) FROM $this->table WHERE name=? AND status != 2",array($name));
    }

    public function add($name, $cat_id, $modifier)
    {
        if($this->productCheck($name)){
            return false;
        }
        return DB::insert("INSERT INTO $this->table SET category_id=?, name=?, modifiers=?, create_date=?", array($cat_id, $name, $modifier, $this->zaman));
    }

    public function productList()
    {
        return $this->getList("SELECT $this->table.*, $this->category_table.name AS category_name 
            FROM $this->table LEFT JOIN 
            $this->category_table ON $this->table.category_id = $this->category_table.id 
            WHERE $this->table.status != 2");
    }
}