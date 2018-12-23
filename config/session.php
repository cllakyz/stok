<?php
class session extends model
{
    static function exists($name){
        return array_key_exists($name, $_SESSION) ? true : false;
    }

    static function set(array $array = []){
        foreach ($array as $key => $value){
            $_SESSION[$key] = helper::cleaner($value);
        }
    }

    static function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    static function remove($key){
        unset($_SESSION[$key]);
    }

    static function removeAll($type = false){
        return $type === false ? session_destroy() : session_unset();
    }

    public function isLogged()
    {
        $out = false;
        if(self::exists('email') and self::exists('password')){
            $userInfo = $this->getRow("SELECT * FROM user WHERE email=? AND password=? AND status=1", array(self::get('email'),self::get('password')));
            if($userInfo){
                $out = true;
            }
        } elseif(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
            $userInfo = $this->getRow("SELECT * FROM user WHERE email=? AND password=? AND status=1", array($_COOKIE['email'],$_COOKIE['password']));
            if($userInfo){
                self::set(array('email' => $_COOKIE['email'], 'password' => $_COOKIE['password']));
                $out = true;
            }
        }
        return $out;
    }

    public function getUserInfo()
    {
        $out = false;
        if($this->isLogged()){
            $out = $this->getRow("SELECT * FROM user WHERE email=? AND password=? AND status=1", array(self::get('email'),self::get('password')));
        }
        return $out;
    }
}