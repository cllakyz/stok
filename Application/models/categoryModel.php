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
        return $this->insert("INSERT INTO kategoriler SET name=?, create_date=?",array($name,$this->zaman));
    }

    public function categoryList()
    {
        $cikti = array();
        $data = $this->getList("SELECT * FROM kategoriler WHERE status=1");
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return $cikti;
    }

    public function info($id)
    {
        return $this->getRow("SELECT * FROM kategoriler WHERE id=?", array($id));
    }

    public function update($id,$name)
    {
        return $this->exec("UPDATE kategoriler SET name=?, update_date=? WHERE id=?", array($name, $this->zaman, $id));
    }

    public function delete($id)
    {
        return $this->exec("DELETE FROM kategoriler WHERE id=?", array($id));
    }
}