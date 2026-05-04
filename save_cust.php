<?php
//error_reporting(0);
include('lock.php');
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	$cname	=$_POST['cname'];
	$caddr	=$_POST['caddr'];
	$ccont =$_POST['ccont'];
	$cotp =md5($ccont);
	$cdairy =$_POST['cdairy'];
	$cgno =$_POST['cgno'];
	$pas=$_POST['pass'];
	$pass=password_hash($pas, PASSWORD_DEFAULT);
	$cflag=1;
	$ctime=time();
	$count=$auth_user->validcont($user_id,$ccont);
	if($count >= 1){
		echo "Contact No Already Registered";
	}else{
	
				if($auth_user->addcust($cname,$caddr,$ccont,$cdairy,$pass,$ctime,$cflag,$user_id,$cotp,$cgno))
				{	
				echo "Success" ;
				}
				else
				{
					echo "Fails upload ";
				}
	}
}
?>