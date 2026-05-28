<?php
	require_once("controller/class.user.php");
	$session = new USER();
	if(!$session->is_loggedin())
	{
		$session->redirect('index.php');
	}