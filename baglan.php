<?php

error_reporting(0);
ob_start();
session_start();

try {
	$db = new PDO("mysql:host=localhost; dbname=homework; charest=utf8", 'root', '');
	$db->query("SET NAMES 'UTF8'");
	//echo 'Veritabanı Bağlantısı Başarılı';
} catch (Exception $e) {
	echo $e->getMessage(); 
}

?>