<?php

class excel extends controller
{
    public function export()
    {
        require_once PATH."/system/libs/Excel/PHPExcel.php";
        $Excel = new PHPExcel();
        $products = $this->model("productModel")->productList(1);
        $Excel->getProperties()->setCreator($this->userInfo->name)
            ->setLastModifiedBy($this->userInfo->name)
            ->setTitle("Ürün listesi")
            ->setSubject("Ürün listesi")
            ->setDescription("Ürün listesi")
            ->setKeywords("Ürün listesi")
            ->setCategory("Ürün listesi");
        /* Excel sayfa adı */
        $Excel->getActiveSheet()->setTitle("Sayfa1");
        /* Kolon başlıkları */
        $Excel->getActiveSheet()->setCellValue("A1", "Ürün Adı");
        $Excel->getActiveSheet()->setCellValue("B1", "Ürün Kategorisi");
        $Excel->getActiveSheet()->setCellValue("C1", "Ürün Özellikleri");
        $Excel->getActiveSheet()->setCellValue("D1", "Eklenme Tarihi");
        /* Kolon başlıkları son */
        /* Ürünleri excel satırlarına yazma*/
        $excelIndis = 2; /* 2.satırdan itibaren yazmaya başla*/
        foreach ($products as $p){
            $Excel->getActiveSheet()->setCellValue("A$excelIndis", $p->name);
            $Excel->getActiveSheet()->setCellValue("B$excelIndis", $p->category_name);
            $Excel->getActiveSheet()->setCellValue("C$excelIndis", $this->productModifierText($p->modifiers));
            $Excel->getActiveSheet()->setCellValue("D$excelIndis", date('d.m.Y H:i', strtotime($p->create_date)));
            $excelIndis++;
        }
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="urun_listesi.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
        $objWriter = PHPExcel_IOFactory::createWriter($Excel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function productModifierText($data)
    {
        $returnArray = array();
        if($data != ""){
            $data = json_decode($data, true);
            if(count($data) > 0){
                foreach ($data as $d){
                    $returnArray[] = $d['name'].": ".$d['value'];
                }
            }
            return join(',', $returnArray);
        } else{
            return NULL;
        }
    }

    public function import()
    {
        if($_FILES){
            $tmp_name = $_FILES['file']['tmp_name'];

            require_once PATH."/system/libs/Excel/PHPExcel.php";
            $Excel = new PHPExcel();
            /* Excel dosyasını yükleme */
            $objPHPEcel = PHPExcel_IOFactory::load($tmp_name);
            $inputFileType = PHPExcel_IOFactory::identify($tmp_name);
            if($inputFileType != "Excel2007" && $inputFileType != "Excel5"){
                echo helper::ajaxResponse(101, "Dosya formatı excel olmalıdır");
                die;
            }
            $added = 0;
            /* Excel dosyasındaki satırlar */
            foreach ($objPHPEcel->getWorksheetIterator() as $worksheet){
                $worksheetTitle     = $worksheet->getTitle(); /* sayfa başlığı */
                $highestRow         = $worksheet->getHighestRow(); /* 10. 11. vb. */
                $highestColumn      = $worksheet->getHighestColumn(); /* A,B,...,Z gibi */
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); /* en son kolonun indexi*/
                /* dosya içeriğini alma */
                for ($row = 2; $row <= $highestRow; $row++){
                    $cell = $worksheet->getCellByColumnAndRow(0, $row);
                    $productName = helper::cleaner($cell->getValue());

                    $cell1 = $worksheet->getCellByColumnAndRow(1,$row);
                    $categoryName = helper::cleaner($cell1->getValue());
                    $categoryId = $this->model("categoryModel")->getCategoryId($categoryName);

                    $cell2 = $worksheet->getCellByColumnAndRow(2,$row);
                    $productModifiers = helper::cleaner($cell2->getValue());
                    $productModifiersJson = $this->setProductModifier($productModifiers);

                    $cell3 = $worksheet->getCellByColumnAndRow(3,$row);
                    $productAddDate = helper::cleaner($cell3->getValue());

                    $add = $this->model("productModel")->productAdd($productName, $categoryId, $productModifiersJson, $productAddDate);
                    if($add){
                        $added++;
                    }

                    /*for ($col = 0; $col < $highestColumnIndex; ++$col){
                        $cell = $worksheet->getCellByColumnAndRow($col, $row); // Belirtilen kolon ve satırdaki hücre
                        $val = $cell->getValue(); // hücre değeri
                        echo $val."<br/>";
                    }*/
                }
            }

            if($added > 0){
                echo helper::ajaxResponse(100, "Ürün(ler) eklendi");
                die;
            } else{
                echo helper::ajaxResponse(101, "Ürün(ler) eklenemedi");
                die;
            }
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }

    public function setProductModifier($data)
    {
        $returnArray = array();
        $dataArr = explode(",", $data);
        foreach ($dataArr as $dataKey => $dataValue){
            $dataArr2 = explode(':', $dataValue);
            $returnArray[] = array(
                'name'  => helper::cleaner($dataArr2[0]),
                'value' => helper::cleaner($dataArr2[1]),
            );
        }
        if(count($returnArray) > 0){
            return json_encode($returnArray);
        } else{
            return NULL;
        }
    }
}