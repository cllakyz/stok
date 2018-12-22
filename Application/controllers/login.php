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
                $control = $this->model("uyeModel")->control($email,$password);
                if($control){
                    if(isset($_POST['remember'])){
                        setcookie("email", $control->email, time() + 365*24*60*60, "/");
                        setcookie("password", $control->password, time() + 365*24*60*60, "/");
                    }
                    session::set(array('email' => $control->email, 'password' => $control->password));
                    helper::redirect(SITE_URL);
                    die;
                } else{
                    helper::flashData("status", "Lütfen E-Mail Adresinizi veya Parolanızı Tekrar Giriniz");
                    helper::redirect(SITE_URL."/login");
                    die;
                }
            } else{
                helper::flashData("status", "Lütfen Tüm Alanları Eksiksiz Giriniz");
                helper::redirect(SITE_URL."/login");
                die;
            }
        } else{
            exit("Hatalı Giriş");
        }
    }
}