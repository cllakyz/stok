<?php
class controller
{
    public $session;

    public function __construct()
    {
        $this->session = new session();
    }

    public function render($file, array $param = [])
    {
        view::render($file, $param);
    }

    public function model($file)
    {
        if(file_exists(MODELS_PATH."/$file.php")){
            require_once MODELS_PATH."/$file.php";
            if(class_exists($file)){
                return new $file;
            } else{
                exit("$file Dosyası Bir Class Değil");
            }
        } else{
            exit("$file Model Dosyası Bulunamadı");
        }
    }
}