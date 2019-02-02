<?php
class controller
{
    public $session;
    public $userInfo;
    public $userId;

    public function __construct()
    {
        $this->session = new session();
        $this->userInfo = $this->session->getUserInfo();
        $this->userId = $this->userInfo->id;
    }

    public function render($file, array $params = [])
    {
        if(file_exists(VIEWS_PATH."/".$file.".php")){
            extract($params);
            require_once VIEWS_PATH."/".$file.".php";
        } else{
            exit($file." Görüntü Dosyası Bulunamadı");
        }
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