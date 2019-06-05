<?php
require("dbconfig.php");
$calendar=array(array("January", 31),
        array("February", 28),
        array("March", 31),
        array("April", 30),
        array("May", 31),
        array("June", 30),
        array("July", 31),
        array("August", 31),
        array("September", 30),
        array("October", 31),
        array("November", 30),
        array("December", 31));
function DateRange($begin,$end){
        $begin = new DateTime($begin);
        $end = new DateTime($end.' +1 day');
        $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
        foreach($daterange as $date){
            $dates[] = $date->format("Y-m-d");
        }
        return $dates;
    }
function checkleapyear($year){
        $flag=0;
        if($year%4==0){
                $flag=1;
                if($year%100==0 && $year%400>0){
                       $flag=0;
                }
        }
        return $flag;
}
function escapeavbt($goption,$escopt1,$escopt2,$escopt3){
    if($goption==0){
        //VALLE SUR
        $keys=[];
    }
}
function tptgetable($sdate,$edate){
    global $pdo;
    $captransport=100;
    $captour=100;
    $regex="^[0-9]{4}-[0-9]{2}-[0-9]{2}$^";
    if(!(preg_match($regex,$sdate))) return('fail4');
    if(!(preg_match($regex,$edate))) return('fail5');
    $everyday=DateRange($sdate,$edate);
    $cnt=array_fill(0,count($everyday),[0,0]);
    $arr=array_combine($everyday,$cnt);
    $sql="SELECT * FROM agents WHERE dt >= :sdate and dt <= :edate";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':sdate',$sdate,PDO::PARAM_STR);
    $stmt->bindValue(':edate',$edate,PDO::PARAM_STR);
    $stmt->execute();
    foreach($stmt as $row){
        $arr[$row['dt']][0]=$arr[$row['dt']][0]+1;
        if($row['ptour']==1) $arr[$row['dt']][1]+1;
    }
    foreach($arr as $key => $info){
        if($info[0]>=$captransport) $arr[$key][0]=1;
        else $arr[$key][0]=0;
        if($info[1]>=$captour) $arr[$key][1]=1;
        else $arr[$key][1]=0;
    }
    return $arr;
}
function booked($sdate,$edate,$unit,$pkg,$numrooms){
    global $pdo;
    if(!($unit=="htl" || $unit=="cnd")) return('fail1');
    if(!($pkg==0 || $pkg==1 || $pkg==2 || $pkg==3 || $pkg ==4 || $pkg ==5)) return('fail2');
    if(!($numrooms>=1 && 9>=$numrooms)) return('fail3');
    $regex="^[0-9]{4}-[0-9]{2}-[0-9]{2}$^";
    if(!(preg_match($regex,$sdate))) return('fail4');
    if(!(preg_match($regex,$edate))) return('fail5');
    $max;
    if($unit=="htl"){ 
        //$sql="SELECT * FROM transactions WHERE htledate >= :sdate and htlsdate <= :edate and htlunit";
        $sql="SELECT * FROM transactions WHERE htledate >= :sdate and htlsdate <= :edate and htlunit is not null";
        $keys=array("htlunit","htlsdate","htledate");
        $max=16;
    }
    else if($unit=="cnd"){
        //$sql="SELECT * FROM transactions WHERE cndedate >= :sdate and cndsdate <= :edate";
        $sql="SELECT * FROM transactions WHERE cndedate >= :sdate and cndsdate <= :edate and cndunit is not null";
        $keys=array("cndunit","cndsdate","cndedate");
        $max=12;
    } 
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':sdate',$sdate,PDO::PARAM_STR);
    $stmt->bindValue(':edate',$edate,PDO::PARAM_STR);
    $stmt->execute();
    $rawdates=array([],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]);
    foreach($stmt as $row){
        if($row[$keys[1]]<$sdate) $row[$keys[1]]=$sdate;
        $rawdates[$row[$keys[0]]]=array_merge($rawdates[$row[$keys[0]]],DateRange($row[$keys[1]],$row[$keys[2]]));
    }
    for($i=0;$i<$max;$i++){
        sort($rawdates[$i]);
    }
    $dates=array([],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]);
    $cnt=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    foreach(DateRange($sdate,$edate) as $day){
        for($i=0;$i<$max;$i++){
            $flag=0;
            if($cnt[$i]<count($rawdates[$i])){
                if($day==$rawdates[$i][$cnt[$i]]){
                    $flag=1;
                    $cnt[$i]++;
                }
            }
            $dates[$i][]=$flag;
        }
    }
    $uoi=array(array([[0,1,2,3]],[[1,0]],[[2,0]],[[3,0]]),array([[0,1,2,3]],[[1,0]],[[2,0]],[[3,0]]));
    $numunits=array(array(4,4,4,4),array(3,3,3,3));
    $divisor=array(array(1,1,1,1),array(1,1,1,1));
    $unitindex;
    $pkgindex;
    if($unit=="htl"){
        $unitindex=0;
        if($pkg==0 || $pkg==1 || $pkg==2 || $pkg==3 || $pkg==4) $pkgindex=0;
    }
    else if($unit=="cnd"){
        $unitindex=1;
        if($pkg==0 || $pkg==1 || $pkg==2 || $pkg==3 || $pkg==4) $pkgindex=0;
    }
    $activeuoi=$uoi[$unitindex][$pkgindex]; //[[0,1,2,3]]
    $activenumunits=$numunits[$unitindex][$pkgindex];
    $activedivisor=$divisor[$unitindex][$pkgindex];
    $booked=[];
    $key;
    for($d=0;$d<count($dates[0]);$d++){
        $bookedcnt=0;
        for($x=0;$x<$activenumunits/($activedivisor);$x++){
            for($a=0;$a<count($activeuoi);$a++){
                $flag=0;
                for($b=0;$b<count($activeuoi[$a]);$b++){
                    if($dates[(4*$x+$activeuoi[$a][$b])][$d]){
                        $flag=1;
                        break;
                    }
                }
                $key=(string)(4*$x+$activeuoi[$a][0]);
                $booked[$key][$d]=$flag;
            }
        }
    }
    return($booked);
}