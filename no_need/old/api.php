<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');

require_once('db.php');
require_once('rb.php');
R::setup('mysql:host='.DBHOST.';dbname='.DBNAME , DBUSER, DBPASS);
R::$writer->setUseCache(true);

$all = R::getAll('Select * from places');
$all = json_encode($all);
print $all;

?>
