<?php
session_start();
$con = mysqli_connect("localhost","root","","elam");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Go/');
define('SITE_PATH','http://localhost/Go/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>