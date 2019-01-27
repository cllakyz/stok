<?php
class invoiceModel extends model
{
    private $table;
    private $table_customer;
    private $zaman;

    public function __construct()
    {
        $this->table = "invoice";
        $this->table_customer = "customer";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function invoiceCheck($no, $not_in=NULL)
    {
        $sql_text = "";
        $sql_array = array($no, 2);
        if(!is_null($not_in)){
            $sql_text .= " AND id != ?";
            $sql_array[] = $not_in;
        }
        $kontrol = $this->getVar("SELECT COUNT(id) FROM $this->table WHERE no = ? AND status != ?$sql_text", $sql_array);
        return $kontrol;
    }

    public function invoiceAdd($cus_id, $no, $type, $total, $desc)
    {
        $check = $this->invoiceCheck($no);
        if($check){
            return array('status_code' => 101, 'status_text' => "Aynı numaraya sahip birden fazla fatura olamaz");
        }
        $add = $this->insert("INSERT INTO $this->table SET customer_id = ?, no = ?, type = ?, total = ?, description = ?, create_date = ?",array($cus_id, $no, $type, $total, $desc, $this->zaman));
        return helper::outputDataStatus($add, "Fatura eklendi", "Fatura eklenemedi");
    }

    public function invoiceList($status=NULL)
    {
        $cikti = array();
        $sql_array = array();
        if(!is_null($status)){
            $sql_text = "$this->table.status = ?";
            $sql_array[] = $status;
        } else{
            $sql_text = "$this->table.status != ?";
            $sql_array[] = 2;
        }
        $data = $this->getList("SELECT $this->table.*, 
                    $this->table_customer.name AS customer_name, 
                    $this->table_customer.surname AS customer_surname 
                    FROM $this->table 
                    LEFT JOIN $this->table_customer ON $this->table.customer_id = $this->table_customer.id 
                    WHERE $sql_text", $sql_array);
        if ($data){
            foreach ($data as $d){
                $cikti[] = $d;
            }
        }
        return helper::outputDataStatus($cikti, "Fatura listesi", "Fatura bulunamadı");
    }

    public function invoiceInfo($id)
    {
        $data = $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
        return helper::outputDataStatus($data, "Fatura bilgileri", "Fatura bulunamadı");
    }

    public function invoiceEdit($id, $cus_id, $no, $type, $total, $desc)
    {
        $check = $this->invoiceCheck($no, $id);
        if($check){
            return array('status_code' => 101, 'status_text' => "Aynı numaraya sahip birden fazla fatura olamaz");
        }
        $update = $this->exec("UPDATE $this->table SET customer_id = ?, no = ?, type = ?, total = ?, description = ?, update_date = ? WHERE id = ?", array($cus_id, $no, $type, $total, $desc, $this->zaman, $id));
        return helper::outputStatus($update, "Fatura bilgileri güncellendi", "Fatura bilgileri güncellenemedi");
    }

    public function invoiceChangeStatus($id,$status)
    {
        $update = $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
        return helper::outputStatus($update, "Fatura durumu güncellendi", "Fatura durumu güncellenemedi");
    }

    public function invoiceDelete($id)
    {
        $delete = $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
        return helper::outputStatus($delete, "Fatura silindi", "Fatura silinemedi");
    }
}