<?php
	require_once("controller/class.user.php");
	$auth_user = new USER();
	$csalt=$_COOKIE["c_salt"];
	$userRow = $auth_user->userfetch($csalt);
	$user_id=$userRow['user_id'];
	if(!$auth_user->is_loggedin())
	{
		$auth_user->redirect('index.php');
	}
	elseif($userRow <= 0){
		 $auth_user->redirect('logout.php?logout=true');
	}
?>