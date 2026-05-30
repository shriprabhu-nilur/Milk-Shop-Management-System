<?php
	require_once("userclass.php");
	$auth_user = new USER();
	$csalt=$_COOKIE["c_id"];
	$userRow = $auth_user->userfetchC($csalt);
	$user_id=$userRow['cid'];
	if(!$auth_user->is_loggedinC())
	{
		$auth_user->redirect('index.php');
	}
	elseif($userRow <= 0){
		 $auth_user->redirect('logout.php?logout=true');
	}
?>