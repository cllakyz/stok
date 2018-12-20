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

    static function getSession($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    static function getAll(){
        return !empty($_SESSION) ? $_SESSION : 'Session Not Found';
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
            $userInfo = $this->getRow("SELECT * FROM uyeler WHERE email=? AND password=? AND status=1", array(self::getSession('email'),self::getSession('password')));
            if($userInfo){
                $out = true;
            }
        }
        return $out;
    }

    public function getUserInfo()
    {
        $out = false;
        if($this->isLogged()){
            $out = $this->getRow("SELECT * FROM uyeler WHERE email=? AND password=? AND status=1", array(self::getSession('email'),self::getSession('password')));
        }
        return $out;
    }
}