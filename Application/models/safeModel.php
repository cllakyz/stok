<?php
class safeModel extends model
{
    private $table;
    private $zaman;

    public function __construct()
    {
        $this->table = "safe";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function safeAdd($name)
    {
        return $this->insert("INSERT INTO $this->table SET name = ?, create_date = ?",array($name,$this->zaman));
    }

    public function safeList($status=NULL)
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

    public function safeInfo($id)
    {
        return $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
    }

    public function safeEdit($id,$name)
    {
        return $this->exec("UPDATE $this->table SET name = ?, update_date = ? WHERE id = ?", array($name, $this->zaman, $id));
    }

    public function safeChangeStatus($id,$status)
    {
        return $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
    }

    public function safeDelete($id)
    {
        return $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
    }
}