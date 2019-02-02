<?php
define("CONTROLLERS_PATH", "Application/controllers");
define("VIEWS_PATH", "Application/views");
define("MODELS_PATH", "Application/models");

define('PATH',str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']));
define('SITE_URL', 'http://dev.stok.com');
define("CSS_PATH", SITE_URL."/public/css");
define("JS_PATH", SITE_URL."/public/js");
define("IMG_PATH", SITE_URL."/public/img");
define("BOWER_PATH", SITE_URL."/public/bower_components");
define("PLUGIN_PATH", SITE_URL."/public/plugins");

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'stok');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'mysql');

date_default_timezone_set("Europe/Istanbul");
define('PERMISSIONS', array(
    'category'  => 'Kategoriler',
    'customer'  => 'Müşteriler',
    'invoice'   => 'Faturalar',
    'order'     => 'Siparişler',
    'product'   => 'Ürünler',
    'report'    => 'Raporlar',
    'safe'      => 'Kasalar',
    'stock'     => 'Stok İşlemleri',
    'user'      => 'Kullanıcılar',
));