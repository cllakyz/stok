<?php
class helper
{
    static function redirect($url)
    {
        if($url){
            if(!headers_sent()){
                header("Location:$url");
            } else{
                echo '<script>location.href = "'.$url.'"</script>';
            }
        }
    }

    static function cleaner($text)
    {
        $array = array('insert', 'update', 'union', 'select', '*');
        $text = str_replace($array, '', $text);
        $text = strip_tags($text);
        $text = trim($text);
        return $text;
    }

    static function flashData($key, $value)
    {
        session::set(array($key => $value));
    }

    static function p($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}