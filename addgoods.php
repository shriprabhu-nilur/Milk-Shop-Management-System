<?php 
include("lock.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$go_desc=$_POST['parti'];
			$go_cost=$_POST['ocost'];
			$profit=$go_cost*3/100;
			$profit_cost=$go_cost+$profit;
			$go_rdesc=$_POST['rdesc'];
			$go_qty=$_POST['qty'];
			$go_rtot=$go_cost*$go_qty;
			
			$sid=$_POST['sid'];
			$billno=$_POST['slno'];
			$auth=md5($slno);
			$go_flag="1";
			$auth_user->addstock($billno,$go_flag,$user_id,$go_desc,$go_cost,$profit_cost,$sid,$go_rdesc,$go_qty,$go_rtot);
			if($auth_user->addgoods($billno,$go_flag,$user_id,$go_desc,$go_cost,$sid,$go_rdesc,$go_qty,$go_rtot))
				
				{	
				echo "Success" ;
				}
				else
				{
					echo "Fails upload ";
				}
 }?>