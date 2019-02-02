<?php
class userModel extends model
{
    private $table;
    private $zaman;

    public function __construct()
    {
        $this->table = "user";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function control($email, $password)
    {
        $control = $this->getRow("SELECT * FROM user WHERE email = ? AND password = ?", array($email, sha1($password)));
        return $control;
    }

    public function userCheck($email, $not_in=NULL)
    {
        $sql_text = "";
        $sql_array = array($email, 2);
        if(!is_null($not_in)){
            $sql_text .= " AND id != ?";
            $sql_array[] = $not_in;
        }
        $kontrol = $this->getVar("SELECT COUNT(id) FROM $this->table WHERE email = ? AND status != ?$sql_text", $sql_array);
        return $kontrol;
    }

    public function userAdd($name, $email, $pass, $permission)
    {
        $check = $this->userCheck($email);
        if($check){
            return array('status_code' => 101, 'status_text' => "Aynı e-posta'ya sahip birden fazla kullanıcı olamaz");
        }
        $add = $this->insert("INSERT INTO $this->table SET name = ?, email = ?, password = ?, permission = ?, create_date = ?",array($name, $email, sha1($pass), $permission, $this->zaman));
        return helper::outputDataStatus($add, "Kullanıcı eklendi", "Kullanıcı eklenemedi");
    }

    public function userList($not_in, $status=NULL)
    {
        $cikti = array();
        $sql_array = array($not_in);
        if(!is_null($status)){
            $sql_text = " AND status = ?";
            $sql_array[] = $status;
        } else{
            $sql_text = " AND status != ?";
            $sql_array[] = 2;
        }
        $data = $this->getList("SELECT * FROM $this->table WHERE id != ?$sql_text", $sql_array);
        foreach ($data as $d){
            $cikti[] = $d;
        }
        return helper::outputDataStatus($cikti, "Kullanıcı listesi", "Kullanıcı bulunamadı");
    }

    public function userInfo($id)
    {
        $data = $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
        return helper::outputDataStatus($data, "Kullanıcı bilgileri", "Kullanıcı bulunamadı");
    }

    public function userEdit($id, $name, $email, $permission, $pass=NULL)
    {
        $check = $this->userCheck($email,$id);
        if($check){
            return array("status_code" => 101, "status_text" => "Aynı e-posta'ya sahip birden fazla kullanıcı olamaz");
        }
        $sql_text = "";
        $sql_array = array($name, $email, $permission, $this->zaman);
        if(!is_null($pass)){
            $sql_text .= ", password = ?";
            $sql_array[] = sha1($pass);
        }
        $sql_array[] = $id;
        $update = $this->exec("UPDATE $this->table SET name = ?, email = ?, permission = ?, update_date = ?$sql_text WHERE id = ?", $sql_array);
        return helper::outputStatus($update, "Kullanıcı bilgileri güncellendi", "Kullanıcı bilgileri güncellenemedi");
    }

    public function userChangeStatus($id,$status)
    {
        $update = $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
        return helper::outputStatus($update, "Kullanıcı durumu güncellendi", "Kullanıcı durumu güncellenemedi");
    }

    public function userDelete($id)
    {
        $delete = $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
        return helper::outputStatus($delete, "Kullanıcı silindi", "Kullanıcı silinemedi");
    }
}