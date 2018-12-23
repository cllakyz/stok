<?php
class categoryModel extends model
{
    private $zaman;
    public function __construct()
    {
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function add($name)
    {
        $add = $this->insert("INSERT INTO kategoriler SET name=?, create_date=?",array($name,$this->zaman));
        return $add;
    }
}