<?php
class view
{
    static function render($file, array $params=[])
    {
        if(file_exists(VIEWS_PATH."/".$file.".php")){
            require_once VIEWS_PATH."/".$file.".php";
        } else{
            exit($file." Görüntü Dosyası Bulunamadı");
        }
    }
}