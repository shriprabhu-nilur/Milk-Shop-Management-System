<?php
include('lock.php');
if($_POST)
{
$q=$_POST['searchword'];
$fetchinvd = $auth_user->fetchinvs($user_id,$q);

foreach($fetchinvd as $prow)
{
$pi_code =$prow['i_code'];
$pi_sdate=date("d M Y",$prow['i_sdate']);
$pi_bal=$prow['i_bal'];
$pouth=$prow['outh'];
$i_flag=$prow['i_flag'];
$i_status=$prow['i_status'];
$cid=$prow['cid'];
$fetchinvd = $auth_user->fetchic($user_id,$cid);
$cname=$fetchinvd['cname'];
?>
                         <tr>
                          <td class="p-name">
                              <a><?php echo $pi_code; ?></a>
                              <br>
                              <small><?php echo $cname; ?> </small>
                          </td>
                          <td class="p-team">
                             <?php echo $pi_sdate; ?>
                          </td>
                          <td class="p-progress">
                            <?php if($i_flag!='2') {?>
						   Rs. <?php echo $pi_bal;?> /-
							<?php }else{
								echo"Paid";
							}?>
                          </td>
                          <td>
                              <span class="label label-primary"><?php echo $i_status; ?></span>
                          </td>
                          <td>
                              <a href="bill?source_ref=<?php echo $pouth; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <?php if($i_flag!='2') {?>
							  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Block </a>
								<?php }else{} ?>
                          </td>
                      </tr>
<?php } 
 } 
 ?>
