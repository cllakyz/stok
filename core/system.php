<?php
class System
{
    protected $controller;
    protected $method;

    public function __construct()
    {
        $this->controller = "main";
        $this->method = "index";
        /* Adres verilerini alma */
        if(isset($_GET['page'])){
            $url = explode('/', filter_var(rtrim($_GET['page'],'/'), FILTER_SANITIZE_URL));
        } else{
            $url = array($this->controller, $this->method);
        }
        /* Controlller Bulma*/
        if(file_exists(CONTROLLERS_PATH."/".$url[0].".php")){
            $this->controller = $url[0];
            array_shift($url);
        }
        require_once CONTROLLERS_PATH."/".$this->controller.".php";
        if(class_exists($this->controller)){
            $this->controller = new $this->controller;
        } else{
            exit($this->controller." class'ı bulunamadı");
        }
        /* Method Bulma*/
        if(isset($url[0])){
            if(method_exists($this->controller, $url[0])){
                $this->method = $url[0];
                array_shift($url);
            } else{
                exit($this->method." method'u bulunamadı");
            }
        }
        if($this->method == "edit" && empty($url)){
            helper::redirect(SITE_URL);
            die;
        }
        call_user_func_array(array($this->controller, $this->method), $url);
    }
}