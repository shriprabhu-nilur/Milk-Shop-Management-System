<?php 
include("lock.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$go_id=$_POST['go_id'];
if($auth_user->dltgoods($go_id) && $auth_user->dltstock($go_id)){
	echo"success";
}else{
	echo"not";
}
}
?>