<?php 
//error_reporting(0);
include("lock.php");
 $cdate=strtotime("now");
 $sdate=$_POST['sdate'];
 $edate=$_POST['edate'];
 $user_id=$_POST['id'];
// $sdate= strtotime($sdate);
// $edate= strtotime($edate); 

                    $gstsalev=$auth_user->calc($user_id,$sdate,$edate);
				
					if($gstsalev !=0){
						$st_id=1;$gtxv=0;
					foreach($gstsalev as $stockdata)
{
$pname=$stockdata['pname'];
													$cost=$stockdata['amount'];
													$cdate=$stockdata['cdate'];
													$qty=$stockdata['quantity'];
													$gtxv+=$cost;
?>
                                      <tr>
                                           <td><?php echo $st_id++; ?></td>
                                          <td><?php echo $cdate; ?></td>
                                          <td class="numeric"><?php echo $pname; ?></td>
                                          <td class="numeric"><?php echo $qty; ?></td>
                                          <td class="numeric"><?php echo $cost; ?></td>
                                      </tr>
                                      <?php }
									 echo " <tr><td style='border-right-color: #f9f9f9'></td>
									 <td>Total Balance</td>
									 <td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
							
									 <td class='numeric' data-title=' '><b>$gtxv</b></td></tr>";
									  }else{
											echo"<tr><td style='border-right-color: #f9f9f9'>
                                No data found
                            </td> 
							<td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
							</tr>";	} ?>