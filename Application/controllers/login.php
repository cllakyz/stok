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
                    $token = $control->token != "" ? $control->token : $control->id.uniqid(time());
                    setcookie("loginUserId", $control->id, time() + 365*24*60*60, "/");
                    setcookie("loginUserToken", $token, time() + 365*24*60*60, "/");
                    session::set(array('loginUserId' => $control->id, 'loginUserToken' => $token));
                    DB::exec("UPDATE user SET token = ? WHERE id = ?", array($token, $control->id));
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