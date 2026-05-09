<?php require_once('lock.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{ 
$st_sell=$_POST['strem'];
$stid=$_POST['stid'];
$dam=$_POST['dam'];
$strem=$st_sell-$dam;
if($sql=$auth_user->updstk($stid,$strem,$dam)){
	echo "Success";
	}
}
?>