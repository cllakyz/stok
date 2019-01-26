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
        return $this->getVar("SELECT COUNT(id) FROM $this->table WHERE tc_no = ? AND status != ?$sql_text", $sql_array);
    }

    public function customerAdd($name, $surname, $email, $phone, $tc_no, $company, $address, $note)
    {
        $check = $this->customerCheck($tc_no);
        if($check > 0){
            return false;
        }
        return $this->insert("INSERT INTO $this->table SET 
                name = ?, surname = ?, email = ?, phone = ?, company = ?, address = ?, note = ?, tc_no = ?, create_date = ?", array(
                    $name, $surname, $email, $phone, $company, $address, $note, $tc_no, $this->zaman
        ));
    }

    public function customerEdit($id, $name, $surname, $email, $phone, $tc_no, $company, $address, $note)
    {
        $check = $this->customerCheck($tc_no, $id);
        if($check > 0){
            return false;
        }
        return $this->exec("UPDATE $this->table SET 
                name = ?, surname = ?, email = ?, phone = ?, company = ?, address = ?, note = ?, tc_no = ?, update_date = ? WHERE id = ?", array(
            $name, $surname, $email, $phone, $company, $address, $note, $tc_no, $this->zaman, $id
        ));
    }

    public function customerDelete($id)
    {
        return $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
    }

    public function customerInfo($id)
    {
        return $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
    }

    public function customerChangeStatus($id,$status)
    {
        return $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
    }

    public function customerList()
    {
        return $this->getList("SELECT * FROM $this->table WHERE status != 2");
    }
}