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

    public function safeCheck($sef, $not_in=NULL)
    {
        $sql_text = "";
        $sql_array = array($sef, 2);
        if(!is_null($not_in)){
            $sql_text .= " AND id != ?";
            $sql_array[] = $not_in;
        }
        $kontrol = $this->getVar("SELECT COUNT(id) FROM $this->table WHERE sef = ? AND status != ?$sql_text", $sql_array);
        return $kontrol;
    }

    public function safeAdd($name)
    {
        $sef = helper::sef($name);
        $check = $this->safeCheck($sef);
        if($check){
            return array("status_code" => 101, "status_text" => "Aynı isimde birden fazla kasa bulunamaz");
        }
        $add = $this->insert("INSERT INTO $this->table SET name = ?, sef = ?, create_date = ?",array($name,$sef,$this->zaman));
        return helper::outputStatus($add, "Kasa eklendi", "Kasa eklenemedi");
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
        return helper::outputDataStatus($cikti, "Kasa listesi", "Kasa bulunamadı");
    }

    public function safeInfo($id)
    {
        $data = $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
        return helper::outputDataStatus($data, "Kasa bilgisi", "Kasa bulunamadı");
    }

    public function safeEdit($id,$name)
    {
        $sef = helper::sef($name);
        $check = $this->safeCheck($sef, $id);
        if($check){
            return array("status_code" => 101, "status_text" => "Aynı isimde birden fazla kasa bulunamaz");
        }
        $update = $this->exec("UPDATE $this->table SET name = ?, sef = ?, update_date = ? WHERE id = ?", array($name, $sef, $this->zaman, $id));
        return helper::outputStatus($update, "Kasa bilgileri güncellendi", "Kasa bilgileri güncellenemedi");
    }

    public function safeChangeStatus($id,$status)
    {
        $update = $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
        return helper::outputStatus($update, "Kasa durumu güncellendi", "Kasa durumu güncellenemedi");
    }

    public function safeDelete($id)
    {
        $delete = $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
        return helper::outputStatus($delete, "Kasa silindi", "Kasa silinemedi");
    }
}