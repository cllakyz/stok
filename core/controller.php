<?php
class controller
{
    public function render($file, array $param = [])
    {
        view::render($file, $param);
    }
}