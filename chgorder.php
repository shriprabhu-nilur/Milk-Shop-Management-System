<?php 
include("lock.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$parti=$_POST['parti'];
			$ordid=$_POST['ordid'];
			$ocost=$_POST['ocost'];
			$rdesc=$_POST['rdesc'];
			$qty=$_POST['qty'];
			$oldqty=$_POST['oldqty'];
			$rtot=$ocost*$qty;
			$reqty=$oldqty-$qty;
			$c_id=$_POST['cid'];
			$ino=$_POST['ino'];
			$auth=md5($ino);
			$ord_flag="1";
			$starray=explode(" ",$parti);
			$stcode=$starray[0];
			$st_id=str_replace("ST00","",$stcode);
			$stockd=$auth_user->getstock($st_id,$user_id);
			$sell=$stockd['st_sell'];
			$remqty=$sell+$reqty;
			if($remqty >= 0){
		if($auth_user->editorder($ocost,$rdesc,$qty,$rtot,$ordid))
		{					
			if($auth_user->updatestock($st_id,$remqty,$user_id,$ord_flag)){			
						echo "Success" ;
					}
		}
		else
		{
		echo "Fails upload ";
		}
			}else{
				echo "Stock Not Available ";
			}
 }else{
	  $auth_user->redirect('404.php');
 } ?>