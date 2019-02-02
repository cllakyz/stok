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
        if(self::exists('loginUserId') and self::exists('loginUserToken')){
            $userInfo = $this->getRow("SELECT * FROM user WHERE id = ? AND token = ? AND status = 1", array(self::get('loginUserId'),self::get('loginUserToken')));
            if($userInfo){
                $out = true;
            }
        } elseif(isset($_COOKIE['loginUserId']) && isset($_COOKIE['loginUserToken'])){
            $userInfo = $this->getRow("SELECT * FROM user WHERE id = ? AND token = ? AND status = 1", array($_COOKIE['loginUserId'],$_COOKIE['loginUserToken']));
            if($userInfo){
                self::set(array('loginUserId' => $_COOKIE['loginUserId'], 'loginUserToken' => $_COOKIE['loginUserToken']));
                $out = true;
            }
        }
        return $out;
    }

    public function getUserInfo()
    {
        $out = false;
        if($this->isLogged()){
            $out = $this->getRow("SELECT * FROM user WHERE id = ? AND token = ? AND status = 1", array(self::get('loginUserId'),self::get('loginUserToken')));
        }
        return $out;
    }
}