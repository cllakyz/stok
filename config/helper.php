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

    static function ajaxResponse($status_code, $status_text, $data=null){
        if($status_code == '' || $status_text == ''){
            return false;
        }else{
            if(!is_null($data) && is_array($data)){
                $return_array = array('status_code' => $status_code, 'status_text' => $status_text, 'data' => $data);
            }else{
                $return_array = array('status_code' => $status_code, 'status_text' => $status_text);
            }
            return json_encode($return_array);
        }
    }

    static function route($sira=0)
    {
        $a = explode('/', filter_var(rtrim(@$_GET['page'],'/')));
        return @$a[$sira];
    }

    static function currencyPrice($price, $currency="₺")
    {
        return number_format($price,2,".",",").$currency;
    }
}