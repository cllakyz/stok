<?php
class userModel extends model
{
    public function control($email, $password)
    {
        $control = $this->getRow("SELECT * FROM user WHERE email=? AND password=?", array($email, sha1($password)));
        return $control;
    }
}