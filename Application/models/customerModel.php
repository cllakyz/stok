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

    public function customerAdd($name, $surname, $email, $phone, $tc_no, $company, $address, $note)
    {
        return $this->insert("INSERT INTO $this->table SET 
                name = ?, surname = ?, email = ?, phone = ?, company = ?, address = ?, note = ?, tc_no = ?, create_date = ?", array(
                    $name, $surname, $email, $phone, $company, $address, $note, $tc_no, $this->zaman
        ));
    }

    public function customerInfo($id)
    {
        return $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
    }

    public function customerList()
    {
        return $this->getList("SELECT * FROM $this->table WHERE status != 2");
    }
}