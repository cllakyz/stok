<?php

class customerModel extends model
{
    private $table;
    private $zaman;

    public function __construct()
    {
        $this->table = "customer";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function customerCheck($tc_no, $not_in=NULL)
    {
        $sql_text = "";
        $sql_array = array($tc_no, 2);
        if(!is_null($not_in)){
            $sql_text .= " AND id != ?";
            $sql_array[] = $not_in;
        }
        $kontrol = $this->getVar("SELECT COUNT(id) FROM $this->table WHERE tc_no = ? AND status != ?$sql_text", $sql_array);
        return $kontrol;
    }

    public function customerAdd($name, $surname, $email, $phone, $tc_no, $company, $address, $note)
    {
        $check = $this->customerCheck($tc_no);
        if($check){
            return array('status_code' => 101, "status_text" => "Aynı kimlik numarasına sahip birden fazla müşteri olamaz");
        }
        $add = $this->insert("INSERT INTO $this->table SET 
                name = ?, surname = ?, email = ?, phone = ?, company = ?, address = ?, note = ?, tc_no = ?, create_date = ?", array(
                    $name, $surname, $email, $phone, $company, $address, $note, $tc_no, $this->zaman
        ));
        return helper::outputStatus($add, "Müşteri eklendi", "Müşteri eklenemedi");
    }

    public function customerEdit($id, $name, $surname, $email, $phone, $tc_no, $company, $address, $note)
    {
        $check = $this->customerCheck($tc_no, $id);
        if($check){
            return array('status_code' => 101, "status_text" => "Aynı kimlik numarasına sahip birden fazla müşteri olamaz");
        }
        $update = $this->exec("UPDATE $this->table SET 
                name = ?, surname = ?, email = ?, phone = ?, company = ?, address = ?, note = ?, tc_no = ?, update_date = ? WHERE id = ?", array(
            $name, $surname, $email, $phone, $company, $address, $note, $tc_no, $this->zaman, $id
        ));
        return helper::outputStatus($update, "Müşteri bilgileri güncellendi", "Müşteri bilgileri güncellenemedi");
    }

    public function customerDelete($id)
    {
        $delete = $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
        return helper::outputStatus($delete, "Müşteri silindi", "Müşteri silinemedi");
    }

    public function customerInfo($id)
    {
        $data = $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
        return helper::outputDataStatus($data, "Müşteri bilgileri", "Müşteri bulunamadı");
    }

    public function customerChangeStatus($id,$status)
    {
        $update = $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
        return helper::outputStatus($update, "Müşteri durumu güncellendi", "Müşteri durumu güncellenemedi");
    }

    public function customerList($status=NULL)
    {
        $cikti = array();
        $sql_text = "";
        $sql_array = array();
        if(!is_null($status)){
            $sql_text .= "status = ?";
            $sql_array[] = $status;
        } else{
            $sql_text = "status != ?";
            $sql_array[] = 2;
        }
        $data = $this->getList("SELECT * FROM $this->table WHERE $sql_text", $sql_array);
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return helper::outputDataStatus($cikti, "Müşteri listesi", "Müşteri bulunamadı");
    }
}