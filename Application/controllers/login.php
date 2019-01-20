<?php
class login extends controller
{
    public function index()
    {
        $this->render('login');
    }

    public function send()
    {
        if($_POST){
            $email = helper::cleaner($_POST['email']);
            $password = helper::cleaner($_POST['password']);
            if($email != "" and $password != ""){
                $control = $this->model("userModel")->control($email,$password);
                if($control){
                    setcookie("email", $control->email, time() + 365*24*60*60, "/");
                    setcookie("password", $control->password, time() + 365*24*60*60, "/");
                    session::set(array('email' => $control->email, 'password' => $control->password));
                    echo helper::ajaxResponse(100, "Giriş Başarılı");
                    die;
                } else{
                    echo helper::ajaxResponse(101, "Lütfen E-Mail Adresinizi veya Parolanızı Tekrar Giriniz");
                    die;
                }
            } else{
                echo helper::ajaxResponse(101, "Lütfen Tüm Alanları Eksiksiz Giriniz");
                die;
            }
        } else{
            echo helper::ajaxResponse(101, "Hatalı Giriş");
            die;
        }
    }
}