<?php
require_once('functions.php');
$sdate;
$edate;
if(isset($_POST['data'])){
    $data=json_decode($_POST['data'],false);
    $sdate=$data->sdate;
    $edate=$data->edate;
}
try{
	$regex="^[0-9]{4}-[0-9]{2}-[0-9]{2}$^";
	if(!(preg_match($regex,$sdate))) throw new Exception('fail');
	if(!(preg_match($regex,$edate))) throw new Exception('fail');
	print json_encode(tptgetable($sdate,$edate));
}catch(Exception $e){
	print json_encode(['function failed']);
}
die();