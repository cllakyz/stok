<?php
class main extends controller
{
    public function index()
    {
        $this->render("index", array('name' => "celal", 'surname' => "akyüz"));
    }
}