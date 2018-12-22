<?php
class uyeModel extends model
{
    public function control($email, $password)
    {
        $control = $this->getRow("SELECT * FROM uyeler WHERE email=? AND password=?", array($email, sha1($password)));
        return $control;
    }
}