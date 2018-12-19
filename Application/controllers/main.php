<?php
class main extends controller
{
    public function index()
    {
        $this->render("uyeler/index", array('name' => "celal", 'surname' => "akyüz"));
    }
}