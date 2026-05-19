<?php 
include("lock.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			 $bal=$_POST['bal'];
			 $iid=$_POST['iid'];
			 $ino=$_POST['ino'];
			 $curdate=time();
			 $status="Nill";
			 $flag="2";
			 $aflag="1";
			$upst=$auth_user->clrbill($status,$flag,$bal,$iid);
			  $sqlt=$auth_user->clrbillorder($flag,$iid);
		if(!empty($_POST['bal'])) {
			 $sqin=$auth_user->clrsavebill($bal,$aflag,$curdate,$ino,$user_id);
		}
		}
		?>