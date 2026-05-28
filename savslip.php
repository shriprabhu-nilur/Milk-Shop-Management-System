<?php 
include("lock.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
		{ 
			 $sl_code=$_POST['slno'];
			 $outh=md5($sl_code);
			 $inno=$_POST['inno'];
			 $iondat=$_POST['innod'];
			 $iondate= strtotime($iondat);
			 $lrno=$_POST['lr'];
			 $sid=$_POST['sid'];
			 $gtotal=$_POST['gtotal'];
			 $igst=$_POST['gst'];
			 if($igst > 0){
			 $gst=$gtotal*5/100;
			 $gsttotall=$gtotal+$gst;
			 $gsttotal= round($gsttotall);
			 }else{
			   $gsttotal=$gtotal;
			 }
			 $sl_flag="1";
			 if($auth_user->addslip($sl_code,$inno,$iondate,$lrno,$gsttotal,$user_id,$sid,$sl_flag,$outh,$igst,$gtotal)){
				echo"success"; 
			 }
		}
		?>