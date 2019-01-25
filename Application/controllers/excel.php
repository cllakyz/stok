<?php

class excel extends controller
{
    public function export()
    {
        require_once PATH."/system/libs/Excel/PHPExcel.php";
        $Excel = new PHPExcel();
        $products = $this->model("productModel")->productList(1);
        /* Excel sayfa adı */
        $Excel->getActiveSheet()->setTitle("Sayfa1");
        /* Kolon başlıkları */
        $Excel->getActiveSheet()->setCellValue("A1", "Ürün ID");
        $Excel->getActiveSheet()->setCellValue("B1", "Ürün Adı");
        $Excel->getActiveSheet()->setCellValue("C1", "Ürün Kategorisi");
        $Excel->getActiveSheet()->setCellValue("D1", "Ürün Özellikleri");
        $Excel->getActiveSheet()->setCellValue("E1", "Eklenme Tarihi");
        /* Kolon başlıkları son */
        /* Ürünleri excel satırlarına yazma*/
        $excelIndis = 2; /* 2.satırdan itibaren yazmaya başla*/
        foreach ($products as $p){
            $Excel->getActiveSheet()->setCellValue("A$excelIndis", $p->id);
            $Excel->getActiveSheet()->setCellValue("B$excelIndis", $p->name);
            $Excel->getActiveSheet()->setCellValue("C$excelIndis", $p->category_name);
            $Excel->getActiveSheet()->setCellValue("D$excelIndis", $this->productModifierText($p->modifiers));
            $Excel->getActiveSheet()->setCellValue("E$excelIndis", date('d.m.Y H:i', strtotime($p->create_date)));
            $excelIndis++;
        }

        $Kaydet = PHPExcel_IOFactory::createWriter($Excel, "Excel2007");
        //$fileName = "Product_".date('d/m/Y').".xlsx";
        $fileName = rand(1,9000).".xlsx";
        $Kaydet->save($fileName);

    }

    public function productModifierText($data)
    {
        $returnArray = array();
        $data = json_decode($data, true);
        foreach ($data as $d){
            $returnArray[] = $d['name'].": ".$d['value'];
        }
        return join(',', $returnArray);
    }

    public function importForm()
    {

    }
}