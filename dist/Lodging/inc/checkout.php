<?php
require('functions.php');
global $pdo;
function uniqueid(){
	global $pdo;
	$l=8;
	$str = ""; for ($x=0;$x<$l;$x++) $str .= substr(str_shuffle("012456789bdfghjklmpqrstvwxyzBDFGHJKLMNPQRSTVWXYZ"), 0, 1);
	$sql="SELECT transid FROM `transactions` WHERE transid=:uniqueid";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':uniqueid',$str);
	$stmt->execute();
	if($stmt->rowcount() >0) return uniqueid();
	else return $str;
}
function confirmavb($booked){
	$out=[];
	foreach($booked as $key => $array){
		$flag=0;
		for($i=0;$i<count($array);$i++){
			if($array[$i]==1){
				$flag=1;
				break;
			} 
		}
		if(!$flag){
			$out[]=$key;
		}
	}
	return $out;
}
function stot($unit,$pkg,$nights,$numrooms){
	$tform=[[130,110,85,65],[105,85,65,45]];
	$unitindex= $unit=="cnd" ? 0 : 1;
	return $tform[$unitindex][$pkg]*$nights*$numrooms;
}
function insertrow($transid,$sdate,$edate,$unit,$roomnum,$pkg){
	global $pdo;
	if($roomnum===NULL) throw new Exception('invaild input');
	$regexdt="^[0-9]{4}-[0-9]{2}-[0-9]{2}$^";
	if(!(preg_match($regexdt,$sdate))) throw new Exception('invalid input');
	if(!(preg_match($regexdt,$edate))) throw new Exception('invalid input');
	$regextransid="^[[:alnum:]]{8}$^";
	if(!(preg_match($regextransid,$transid))) throw new Exception('invalid input');
	if(!($unit=="htl" || $unit=="cnd")) throw new Exception('invalid input');
	if(!($pkg >=0 && $pkg <=4)) throw new Exception('invalid input');
	if ($unit=="cnd"){
		//$sql="INSERT INTO `transactions` (`transid`, `cndsdate`, `cndedate`, `cndunit`, `pkg`) VALUES (:transid,:sdate,:edate,:roomnum,:pkg)";
		$sql="INSERT INTO `transactions` (`transid`, `cndsdate`, `cndedate`, `pkg`) VALUES (:transid,:sdate,:edate,:pkg)";
	}else if($unit=="htl"){
		//$sql="INSERT INTO `transactions` (`transid`, `htlsdate`, `htledate`, `htlunit`, `pkg`) VALUES (:transid,:sdate,:edate,:roomnum,:pkg)";
		$sql="INSERT INTO `transactions` (`transid`, `htlsdate`, `htledate`, `pkg`) VALUES (:transid,:sdate,:edate,:pkg)";
	}
	$stmt=$pdo->prepare($sql);
	$stmt->bindValue(':transid',$transid,PDO::PARAM_STR);
	$stmt->bindValue(':sdate',$sdate,PDO::PARAM_STR);
	$stmt->bindValue(':edate',$edate,PDO::PARAM_STR);
	//$stmt->bindValue(':roomnum',$roomnum,PDO::PARAM_INT);
	$stmt->bindValue(':pkg',$pkg,PDO::PARAM_INT);
	$stmt->execute();
}
function roomnumbers($numavb,$numrooms){
	$roomnumbers=[];
	for($i=0;$i<$numrooms;$i++){
		$roomnumbers[]=$numavb[$i];
	}
	return $roomnumbers;
}
try{
$commit=1;
$transid=uniqueid();
if(isset($_POST['pkg'])){
	if($_POST['pkg']==0){
		$pkg=0;
		//all out escape shelter
		$sdate=$_POST['unit1sdate'];
		$regex="^[0-9]{4}-[0-9]{2}-[0-9]{2}$^";
		$dt= new DateTime($sdate);
		$dt->add(new DateInterval('P6D'));
		$edate= $dt->format('Y-m-d');
		$everyday=DateRange($sdate,$edate);
    	if(!(preg_match($regex,$sdate))) throw new Exception('invalid input');
		if($_POST['goption']==0){
			$night6= (int)$_POST['escopt1']==0 ? 0 : 1;
			$night7= (int)$_POST['escopt2']==0 ? 0 : 1;
			$seq=array([[$everyday[0],$everyday[1]]],[[$everyday[2]]]);
			if($night6){
				if($night7){
					$seq[1][]=[$everyday[4],$everyday[5],$everyday[6]];
				}else{
					$seq[1][]=[$everyday[4],$everyday[5]];
					$seq[0][]=[$everyday[6]];
				}
			}else{
				$seq[1][]=[$everyday[4]];
				if($night7){
					$seq[0][]=[$everyday[5]];
					$seq[1][]=[$everyday[6]];
				}else{
					$seq[0][]=[$everyday[5],$everyday[6]];
				}
			}
		}else if($_POST['goption']==1){
			$night5= (int)$_POST['escopt1']==0 ? 0 : 1;
			$night6 =(int)$_POST['escopt2']==0 ? 0 : 1;
			$night7 =(int) $_POST['escopt3']==0 ? 0 : 1;
			$seq=array([[$everyday[0],$everyday[1]]],[]);
			if($night5){
				if($night6){
					if($night7){
						$seq[1][]=[$everyday[3],$everyday[4],$everyday[5],$everyday[6]];
					}else{
						$seq[1][]=[$everyday[3],$everyday[4],$everyday[5]];
						$seq[0][]=[$everyday[6]];
					}
				}else{
					if($night7){
						//YES 4,NO 5, YES 6
						$seq[1][]=[$everyday[4]];
						$seq[0][]=[$everyday[5]];
						$seq[1][]=[$everyday[6]];
					}else{
						//YES 4,NO 5, NO 6
						$seq[1][]=[$everyday[3],$everyday[4]];
						$seq[0][]=[$everyday[5],$everyday[6]];
					}
				}
			}else{
				$seq[1][]=[$everyday[3]];
				if($night6){
					if($night7){
						//No 4, YES 5 6
						$seq[0][]=[$everyday[4]];
						$seq[1][]=[$everyday[5],$everyday[6]];
					}else{
						//no 4, yes 5, no 6
						$seq[0][]=[$everyday[4]];
						$seq[1][]=[$everyday[5]];
						$seq[0][]=[$everyday[6]];
					}
				}else{
					if($night7){
						//No 4, No 5, Yes 6
						$seq[0][]=[$everyday[4],$everyday[5]];
						$seq[1][]=[$everyday[6]];
					}else{
						//No 4, no 5, no 6
						$seq[0][]=[$everyday[4],$everyday[5],$everyday[6]];
					}
				}
			}
		}else{
			throw new Exception ('invalid input');
		}
		$htot=1100;
		//Attractions
		$numadults=(int)$_POST['numadults'];
		if(!($numadults>=0 && $numadults<=5)) throw new Exception('invalid input');
		$numchildren=(int)$_POST['numchildren'];
		if(!($numchildren>=0 && $numchildren<=5)) throw new Exception('invalid input');
		$attopt;
		$ratt=[["Main bundle",46,46],["Calderon Escape Bundle",25,25],["Bus Ticket",25,13],["247 Travel Advisor",0,0]];
		if(isset($_POST['att15'])){
			if($_POST['att15']==1){
				$attopt=2;
				$ratt[]=["Machu Pichu +Huaynapicchu",61,61];
			}else{
				$attopt=1;
				$ratt[]=["Machu Picchu",46,46];
			}
		}else{
			$attopt=1;
		}
		if($attopt==2){
			$atttot=$numadults*157 + $numchildren*130;
		}else if($attopt==1){
			$atttot=$numadults*142 +$numchildren*145;
		}else{
			throw new Exception ('invalid input');
		}
		try{
			global $pdo;
			$pdo->beginTransaction();
			$rh=[];
			foreach($seq as $u => $subseq){
				foreach($subseq as $dr){
					if($u==0) $unit="cnd";
					else if($u==1) $unit="htl";
					$booked=booked($dr[0],$dr[count($dr)-1],$unit,0,1,0);
					$numavb=confirmavb($booked);
					if(count($numavb)<1) throw new Exception('no availability');
					$roomnum=roomnumbers($numavb,1);
					insertrow($transid,$dr[0],$dr[count($dr)-1],$unit,$roomnum[0],0);
					///HOUSING OUTPUT////
					$checkoutdate=new DateTime($dr[count($dr)-1]);
					$checkoutdate->add(new DateInterval('P1D'));
					$checkout= $checkoutdate->format('Y-m-d');
					$rh[]=[$unit,0,$dr[0],count($dr),$checkout];
				}
			}
			$sql="INSERT INTO `attractionsaoe` (`transid`, `attopt`, `numadults`, `numchildren`) VALUES (:transid,:attopt,:numadults,:numchildren)";
			$stmt=$pdo->prepare($sql);
			$stmt->bindValue(':transid',$transid,PDO::PARAM_STR);
			$stmt->bindValue('attopt',$attopt,PDO::PARAM_INT);
			$stmt->bindValue(':numadults',$numadults,PDO::PARAM_INT);
			$stmt->bindValue(':numchildren',$numchildren,PDO::PARAM_INT);
			$stmt->execute();
			//transid
			//ptour
			//ptransport
			//airportorunit
			$gtot=$htot+$atttot;
			$sql="INSERT INTO `agents`(`transid`, `dt`, `ptour`, `ptransport`, `airportorunit`) VALUES (:transid,:dt,:ptour,:ptransport,:airportorunit)";
			$stmt=$pdo->prepare($sql);
			$stmt->bindValue(':transid',$transid,PDO::PARAM_STR);
			$stmt->bindValue(':ptour',1,PDO::PARAM_INT);
			$stmt->bindValue(':ptransport',0,PDO::PARAM_INT);
			$stmt->bindValue(':airportorunit',0,PDO::PARAM_INT);
			$ragents=[];
			foreach($everyday as $day){
				$ragents[]=[$day,1,0,0];
				$stmt->bindValue(':dt',$day);
				$stmt->execute();
			}
			$sql="INSERT INTO `orders`(`transid`, `gtot`, `help247`) VALUES (:transid,:gtot,:help247)";
			$stmt=$pdo->prepare($sql);
			$stmt->bindValue(':transid',$transid,PDO::PARAM_STR);
			$stmt->bindValue(':gtot',$gtot,PDO::PARAM_INT);
			$stmt->bindValue(':help247',1,PDO::PARAM_INT);
			$stmt->execute();
			if($commit==1){
				$pdo->commit();
			}
		}catch (Exception $e){
			$pdo->rollBack();
			throw new Exception($e);
		}
	}else{
		//alacarte HOUSING INPUT--------------------------------------------------------------------------------------------
		$pkg=$_POST['pkg'];
			if(isset($_POST['pkg'])){
			$pkg=(int)$_POST['pkg'];
		}
		$regextransid="^[[:alnum:]]{8}$^";
		if(!(preg_match($regextransid,$transid))) throw new Exception('invalid input');
		if(isset($_POST['numrooms'])){
			$numrooms=(int)$_POST['numrooms'];
		}
		if(!($pkg==1 || $pkg==2 || $pkg==3 || $pkg ==4)) throw new Exception('fail');
		if(!($numrooms>=1 && 4>=$numrooms)) throw new Exception('fail');
		$regex="^[0-9]{4}-[0-9]{2}-[0-9]{2}$^";
		$unit1stot=0;
		if(isset($_POST['unit1'])){
			if($_POST['unit1']=="htl" || $_POST['unit1']=="cnd"){
				$unit1=$_POST['unit1'];
				if(!($unit1=="htl" || $unit1=="cnd")) throw new Exception('invalid input');
				$unit1nights=(int)$_POST['unit1nights'];
				$unit1sdate=$_POST['unit1sdate'];
				$unit1edate=$_POST['unit1edate'];
				if(!($unit1nights>0 && $unit1nights<=150)) throw new Exception('fail');
				if(!(preg_match($regex,$unit1sdate))) throw new Exception('fail');
				if(!(preg_match($regex,$unit1edate))) throw new Exception('fail');
				$dt=$unit1edate;
				if($unit1edate<$unit1sdate) throw new Exception('fail');
				if(!(count(DateRange($unit1sdate,$unit1edate)))==$unit1nights) throw new Exception('fail');
				$booked1=booked($unit1sdate,$unit1edate,$unit1,$pkg,$numrooms);
				$numavb1=confirmavb($booked1);
				if(count($numavb1)<$numrooms) throw new Exception('fail');
				$unit1roomnumbers=roomnumbers($numavb1,$numrooms);
				$unit1stot=stot($unit1,$pkg-1,$unit1nights,$numrooms);
			}
		}
		$unit2stot=0;
		if(isset($_POST['unit2'])){
			if($_POST['unit2']=="htl" || $_POST['unit2']=="cnd"){
				$unit2=$_POST['unit2'];
				if(!($unit2=="htl" || $unit2=="cnd")) throw new Exception('invalid input');
				$unit2nights=(int)$_POST['unit2nights'];
				$unit2sdate=$_POST['unit2sdate'];
				$unit2edate=$_POST['unit2edate'];
				if($unit2==$unit1) exit();
				if(!($unit2nights>0 && $unit2nights<=150)) throw new Exception('fail');
				if(!(preg_match($regex,$unit2sdate))) throw new Exception('fail');
				if(!(preg_match($regex,$unit2edate))) throw new Exception('fail');
				$dt=$unit2edate;
				if($unit2edate<$unit2sdate) throw new Exception('fail');
				if(!(count(DateRange($unit2sdate,$unit2edate)))==$unit1nights) throw new Exception('fail');
				$booked2=booked($unit2sdate,$unit2edate,$unit2,$pkg,$numrooms);
				$numavb2=confirmavb($booked2);
				if(count($numavb2)<$numrooms) throw new Exception('fail');
				$unit2roomnumbers=roomnumbers($numavb2,$numrooms);
				$unit2stot=stot($unit2,$pkg-1,$unit2nights,$numrooms);
			}
		}
		$htot=$unit1stot+$unit2stot; //Total of housing
		//ATT INPUT-----------------------------------------------------------------------------------------------------------------
		$ratt=[];
		$attbundlemain=(int)$_POST['attbundlemain'];
		if(!($attbundlemain==0 || $attbundlemain==1)) throw new Exception('invalid input');
		$attbundlece=(int)$_POST['attbundlece'];
		if(!($attbundlece==0 || $attbundlece==1)) throw new Exception('invalid input');
		$numchildren=(int)$_POST['numchildren'];
		if(!($numchildren>=0 && $numchildren <=5)) throw new Exception ('invalid input');
		$numadults=(int)$_POST['numadults'];
		if(!($numadults>=1 && $numadults <=5))  throw new Exception ('invalid input');
		$atttot=0;
		$attsubtotmain=0;
		if($attbundlemain==1){
			$ratt[]=["Main bundle",46,46];
			$pisac=0;
			$tipon=0;
			$chincheros=0;
			$museums=0;
			$saqsaywamna=0;
			$moray=0;
			$ollantaytambo=0;
			$attsubtotmain=46;
		}else{
			$mainpv=[10,15,10,10,15,10,10];
			$pisac=(int)$_POST['att1'];
			if(!($pisac==0 || $pisac==1)) throw new Exception('invalid input');
			if($pisac==1) $ratt[]=["Pisac",10,10];
			$tipon=(int)$_POST['att2'];
			if(!($tipon==0 || $tipon==1)) throw new Exception('invalid input');
			if($tipon==1) $ratt[]=["Tipon",15,15];
			$chincheros=(int)$_POST['att3'];
			if(!($chincheros==0 || $chincheros==1)) throw new Exception('invalid input');
			if($chincheros==1) $ratt[]=["Chincheros",10,10];
			$museums=(int)$_POST['att4'];
			if(!($museums==0 || $museums==1)) throw new Exception('invalid input');
			if($museums==1) $ratt[]=["Museums",10,10];
			$saqsaywamna=(int)$_POST['att5'];
			if(!($saqsaywamna==0 || $saqsaywamna==1)) throw new Exception('invalid input');
			if($saqsaywamna==1) $ratt[]=["Saqsaywamna",15,15];
			$moray=(int)$_POST['att6'];
			if(!($moray==0 || $moray==1)) throw new Exception('invalid input');
			if($moray==1) $ratt[]=["Moray",10,10];
			$ollantaytambo=(int)$_POST['att7'];
			if(!($ollantaytambo==0 || $ollantaytambo==1)) throw new Exception('invalid input');
			if($ollantaytambo==1) $ratt[]=["Ollantaytambo",15,15];
			$mainnames=array($pisac,$tipon,$chincheros,$museums,$saqsaywamna,$moray,$ollantaytambo);
			for($i=0;$i<7;$i++){
				$attsubtotmain+=$mainnames[$i]*$mainpv[$i];
			}
		}
		$attsubtotce=0;
		if($attbundlece==1){
			$salineras=0;
			$coricancha=0;
			$sevencolormountain=0;
			$lagohuamantay=0;
			$iglesiaandahuaylillas=0;
			$piquillacta=0;
			$ratt[]=["Calderon Escape Bundle",25,25];
			$attsubtotce=25;
		}else{
			$cepv=[10,8,10,10,5,5];
			$salineras=(int)$_POST['att8'];
			if(!($salineras==0 || $salineras==1)) throw new Exception('invalid input');
			if($salineras==1) $ratt[]=["Salineras",10,10];

			$coricancha=(int)$_POST['att9'];
			if(!($coricancha==0 || $coricancha==1)) throw new Exception('invalid input');
			if($coricancha==1) $ratt[]=["Coricancha",8,8];

			$sevencolormountain=(int)$_POST['att10'];
			if(!($sevencolormountain==0 || $sevencolormountain==1)) throw new Exception('invalid input');
			if($sevencolormountain==1) $ratt[]=["Seven Color Mountain",10,10];

			$lagohuamantay=(int)$_POST['att11'];
			if(!($lagohuamantay==0 || $lagohuamantay==1)) throw new Exception('invalid input');
			if($lagohuamantay==1) $ratt[]=["Lago Huamantay",10,10];

			$iglesiaandahuaylillas=(int)$_POST['att12'];
			if(!($iglesiaandahuaylillas==0 || $iglesiaandahuaylillas==1)) throw new Exception('invalid input');
			if($iglesiaandahuaylillas==1) $ratt[]=["Iglesia AndaHuaylillas",10,10];

			$piquillacta=(int)$_POST['att13'];
			if(!($piquillacta==0 || $piquillacta==1)) throw new Exception('invalid input');
			if($pisac==1) $ratt[]=["Piquillacta",10,10];

			$cenames=array($salineras,$coricancha,$sevencolormountain,$lagohuamantay,$iglesiaandahuaylillas,$piquillacta);
			for($i=0;$i<6;$i++){
				$attsubtotce+=$cenames[$i]*$cepv[$i];
			}
		}
		$attsubtotmp=0;
		$machupicchu=(int)$_POST['att14'];
		if(!($machupicchu==0 || $machupicchu==1)) throw new Exception('invalid input');
		$huaynapicchu=(int)$_POST['att15'];
		if(!($huaynapicchu==0 || $huaynapicchu==1)) throw new Exception('invalid input');
		if($huaynapicchu==1){
			$attsubtotmp=61;
			$machupicchu=0;
			$ratt[]=["Machu Pichu +Huaynapicchu",61,61];
		}else if($machupicchu==1){
			$attsubtotmp=46;
			$ratt[]=["Machu Pichu",46,46];
		}
		$atttot=($attsubtotmp+$attsubtotce+$attsubtotmain)*($numadults+$numchildren);
		if($atttot>0 && $pkg>1){
			$atttot+=20;
			$ratt[]=["Booking Fee",20,20];
		}
		if($pkg>2 && isset($_POST['247help'])){
			$atttot+=20;
			$ratt[]=["247 Travel Advisor",20,20];
			$help247=1;
		}else{
			$help247=0;
		}

		//-----------------------------PTOUR/TRANSPORT/AIRPORTPICKUP==================-=====
		$ragents=[];
		$lastday=new DateTime($dt);
		$lastday->add(new DateInterval('P1D'));
		$edate= $lastday->format('Y-m-d');
		$everyday=DateRange($unit1sdate,$edate);
		$insarr=[];
		$agenttot=0;
		if($pkg==1 || $pkg ==2){
			$help247=1;
            $ratt[]=["247 Travel Advisor",0,0];
			if(!(isset($_POST[$everyday[0]]))){
				$_POST[$everyday[0]]=1;
			}else if(isset($_POST[$everyday[0]])){
				if(!((int)$_POST[$everyday[0]]>1)) $_POST[$everyday[0]]=1;
			}
			if(!(isset($_POST[$everyday[count($everyday)-1]]))){
				$_POST[$everyday[count($everyday)-1]]=1;
			}else if((isset($_POST[$everyday[count($everyday)-1]]))){
				if(!((int)$_POST[$everyday[count($everyday)-1]]>1)) $_POST[$everyday[count($everyday)-1]]=1;
			}
		}
		foreach($everyday as $day){
			if(isset($_POST[$day])){
				if($_POST[$day]==3){
					//ptour
					$insarr[]=[$day,[1,0,0]];
					$agenttot+=100;
				}else if($_POST[$day]==2){
					//ptransport
					$insarr[]=[$day,[0,1,0]];
					$agenttot+=60;
				}else if($_POST[$day]==1){
					//airport
					$insarr[]=[$day,[0,0,1]];
					if($pkg>2) $agenttot+=35;
				}
			}
		}
		//CHECK TO SEE WHERE THEY TRAVEL FOR AIRPORT CASE
		if($insarr[0][0]==$unit1sdate){ // POst will be set if this is true

			if($_POST[$insarr[0][0]]==1){
				if($unit1=="cnd" && $pkg>2) $agenttot-=28;
			}
		}
		if($insarr[count($insarr)-1][0]==$edate){
			if($_POST[$insarr[0][0]]==1){
				if(isset($unit2)){
					if($unit2=="cnd" && $pkg>2) $agenttot-=28;
				}else{
					if($unit1=="cnd" && $pkg>2) $agenttot-=28;
				}
			}
		}
		//==========================ORDERS TABLE======================
		$gtot=$htot+$atttot+$agenttot;
		try{
			$pdo->beginTransaction();
			foreach($insarr as $row){
				$sql="INSERT INTO `agents`(`transid`, `dt`, `ptour`, `ptransport`, `airportorunit`) VALUES (:transid,:dt,:ptour,:ptransport,:airportorunit)";
				$stmt=$pdo->prepare($sql);
				$stmt->bindValue(':transid',$transid,PDO::PARAM_STR);
				$stmt->bindValue(':dt',$row[0],PDO::PARAM_STR);
				$stmt->bindValue(':ptour',$row[1][0],PDO::PARAM_STR);
				$stmt->bindValue(':ptransport',$row[1][1],PDO::PARAM_STR);
				$stmt->bindValue(':airportorunit',$row[1][2],PDO::PARAM_STR);
				$stmt->execute();
				$ragents[]=[$row[0],$row[1][0],$row[1][1],$row[1][2]];
			}
			$sql="INSERT INTO `orders`(`transid`, `gtot`, `help247`) VALUES (:transid,:gtot,:help247)";
			$stmt=$pdo->prepare($sql);
			$stmt->bindValue(':transid',$transid,PDO::PARAM_STR);
			$stmt->bindValue(':gtot',$gtot,PDO::PARAM_INT);
			$stmt->bindValue(':help247',$help247,PDO::PARAM_INT);
			$stmt->execute();
			$rh=[];
			if(isset($unit1roomnumbers)){
				foreach($unit1roomnumbers as $roomnum){
					insertrow($transid,$unit1sdate,$unit1edate,$unit1,$roomnum,$pkg);
					$checkoutdate=new DateTime($unit1sdate);
					$checkoutdate->add(new DateInterval('P'.$unit1nights.'D'));
					$checkout= $checkoutdate->format('Y-m-d');
					$rh[]=[$unit1,$pkg,$unit1sdate,$unit1nights,$checkout,$unit1stot/$numrooms];
				}
			}
			if(isset($unit2roomnumbers)){
				foreach($unit2roomnumbers as $roomnum){
					insertrow($transid,$unit2sdate,$unit2edate,$unit2,$roomnum,$pkg);
					$checkoutdate=new DateTime($unit1sdate);
					$checkoutdate->add(new DateInterval('P'.$unit1nights.'D'));
					$checkout= $checkoutdate->format('Y-m-d');
					$rh[]=[$unit2,$pkg,$unit2sdate,$unit2nights,$checkout,$unit2stot/$numrooms];
				}
				
			}
			$sql="INSERT INTO `attractionsalc`(`transid`, `numadults`, `numchildren`,`mainbundle`, `pisac`, `tipon`, `chincheros`, `museums`, `saqsaywamna`, `moray`, `ollantaytambo`, `cebundle`, `salineras`, `coricancha`, `sevencolormountain`, `lagohuamantay`, `iglesiaandahuaylillas`, `piquilacta`, `huaynapicchu`, `machupicchu`) VALUES (:transid, :numadults, :numchildren, :mainbundle , :pisac, :tipon , :chincheros ,:museums , :saqsaywamna , :moray , :ollantaytambo, :cebundle, :salineras, :coricancha, :sevencolormountain, :lagohuamantay, :iglesiaandahuaylillas, :piquilacta, :huaynapicchu, :machupicchu)";
			$stmt=$pdo->prepare($sql);
			$stmt->bindValue(':transid',$transid,PDO::PARAM_STR);
			$stmt->bindValue(':numadults',$numadults,PDO::PARAM_INT);
			$stmt->bindValue(':numchildren',$numchildren,PDO::PARAM_INT);
			$stmt->bindValue(':mainbundle',$attbundlemain,PDO::PARAM_STR);
			$stmt->bindValue(':pisac',$pisac,PDO::PARAM_STR);
			$stmt->bindValue(':tipon',$tipon,PDO::PARAM_STR);
			$stmt->bindValue(':chincheros',$chincheros,PDO::PARAM_STR);
			$stmt->bindValue(':museums',$museums,PDO::PARAM_STR);
			$stmt->bindValue(':saqsaywamna',$saqsaywamna,PDO::PARAM_STR);
			$stmt->bindValue(':moray',$moray,PDO::PARAM_STR);
			$stmt->bindValue(':ollantaytambo',$ollantaytambo,PDO::PARAM_STR);
			$stmt->bindValue(':cebundle',$attbundlece,PDO::PARAM_STR);
			$stmt->bindValue(':salineras',$salineras,PDO::PARAM_STR);
			$stmt->bindValue(':coricancha',$coricancha,PDO::PARAM_STR);
			$stmt->bindValue(':sevencolormountain',$sevencolormountain,PDO::PARAM_STR);
			$stmt->bindValue(':lagohuamantay',$lagohuamantay,PDO::PARAM_STR);
			$stmt->bindValue(':iglesiaandahuaylillas',$iglesiaandahuaylillas,PDO::PARAM_STR);
			$stmt->bindValue(':piquilacta',$piquillacta,PDO::PARAM_STR);
			$stmt->bindValue(':huaynapicchu',$huaynapicchu,PDO::PARAM_STR);
			$stmt->bindValue(':machupicchu',$machupicchu,PDO::PARAM_STR);
			$stmt->execute();
			if($commit==1){
				$pdo->commit();
			}
		}catch(Exception $e){
			$pdo->rollBack();
			throw new Exception($e);
		}
	}
}
$send=array($transid,[$gtot,$htot,$atttot,$agenttot],$rh,$ratt,$ragents);
json_encode($send);
header('Location: /purchase.php?data='.json_encode($send));
die();
}catch(Exception $e){
	print $e;
    header('Location: /cancel.php');
    die();
}
?>