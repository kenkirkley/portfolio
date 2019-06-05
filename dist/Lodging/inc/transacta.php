<?php
require("functions.php");
$sdate;
$edate;
$unit;
$pkg;
$numrooms;
$keys;
$sql;
$roomtype;
if(isset($_POST['data'])){
    $data=json_decode($_POST['data'],false);
    $sdate=$data->sdate;
    $edate=$data->edate;
    $unit=$data->unit;
    $pkg=(int)$data->pkg;
    $numrooms=$data->numrooms;
}
try{
    if(!($unit=="htl" || $unit=="cnd")) throw new Exception('fail2');
    if(!($pkg==0 || $pkg==1 || $pkg==2 || $pkg==3 || $pkg ==4 || $pkg ==5)) throw new Exception('fail2');
    if(!($numrooms>=1 && 9>=$numrooms)) throw new Exception('fail2');
    $regex="^[0-9]{4}-[0-9]{2}-[0-9]{2}$^";
    if(!(preg_match($regex,$sdate))) throw new Exception('fail2');
    if(!(preg_match($regex,$edate))) throw new Exception('fail2');
    $booked=booked($sdate,$edate,$unit,$pkg,$numrooms);
    if($booked=="fail"){
        throw new Exception('fail2');
    }else{
        print json_encode($booked);
    }
}catch(Exception $e){
    print ($e);
}
die();

?>