<?php
class categoryModel extends model
{
    private $table;
    private $zaman;

    public function __construct()
    {
        $this->table = "category";
        $this->zaman = date('Y-m-d H:i:s');
    }

    public function categoryCheck($sef, $not_in=NULL)
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

    public function categoryAdd($name)
    {
        $sef = helper::sef($name);
        $check = $this->categoryCheck($sef);
        if($check){
            return array('status_code' => 101, 'status_text' => "Aynı isimde birden fazla kategori olamaz");
        }
        $add = $this->insert("INSERT INTO $this->table SET name = ?, sef = ?, create_date = ?",array($name, $sef,$this->zaman));
        return helper::outputDataStatus($add, "Kategori eklendi", "Kategori eklenemedi");
    }

    public function categoryList($status=NULL)
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
        return helper::outputDataStatus($cikti, "Kategori listesi", "Kategori bulunamadı");
    }

    public function categoryInfo($id)
    {
        $data = $this->getRow("SELECT * FROM $this->table WHERE id = ?", array($id));
        return helper::outputDataStatus($data, "Kategori bilgileri", "Kategori bulunamadı");
    }

    public function categoryEdit($id,$name)
    {
        $sef = helper::sef($name);
        $check = $this->categoryCheck($sef,$id);
        if($check){
            return array("status_code" => 101, "status_text" => "Aynı isimde birden fazla kategori olamaz");
        }
        $update = $this->exec("UPDATE $this->table SET name = ?, sef = ?, update_date = ? WHERE id = ?", array($name, $sef, $this->zaman, $id));
        return helper::outputStatus($update, "Kategori bilgileri güncellendi", "Kategori bilgileri güncellenemedi");
    }

    public function categoryChangeStatus($id,$status)
    {
        $update = $this->exec("UPDATE $this->table SET status = ?, update_date = ? WHERE id = ?", array($status, $this->zaman, $id));
        return helper::outputStatus($update, "Kategori durumu güncellendi", "Kategori durumu güncellenemedi");
    }

    public function categoryDelete($id)
    {
        $delete = $this->exec("UPDATE $this->table SET status = 2, update_date = ? WHERE id = ?", array($this->zaman, $id));
        return helper::outputStatus($delete, "Kategori silindi", "Kategori silinemedi");
    }

    public function getCategoryId($name)
    {
        $catId = $this->getVar("SELECT id FROM $this->table WHERE name = ?", array($name));
        if(!$catId){
            $catAdd = $this->categoryAdd($name);
            if($catAdd['status_code'] == 100){
                $catId = $catAdd['data'];
            }
        }
        return $catId;
    }
}