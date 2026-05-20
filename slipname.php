<?php 
					require_once("lock.php");
					$cdate=strtotime("now");
					$q=$_POST['searchword'];
                    $fetchslipd = $auth_user->fetchsrslip($user_id,$q);
					foreach($fetchslipd as $prow)
{
$sl_code =$prow['sl_code'];
$iondate=$prow['iondate'];
$inno=$prow['inno'];
$pouth=$prow['outh'];
$sl_flag=$prow['sl_flag'];
$gtotal=$prow['gtotal'];
$sl_bal=$prow['sl_bal'];
$sname=$prow['sname'];
?>
						<tr>
                          <td class="p-name">
                              <a><?php echo $sl_code; ?></a>
                              <br>
                              <small><?php echo $sname; ?> </small>
                          </td>
                          <td class="p-team">
                             <?php echo $iondate; ?>
                          </td>
                          <td class="p-progress">
						   Rs. <?php echo $gtotal;?> /-
                          </td>
						   <td class="p-progress">
						   <?php echo $sl_bal;?> /-
                          </td>
                          <td>
                              <span class="label label-primary"><?php echo $inno; ?></span>
                          </td>
                          <td>
                              <a href="slip?source_ref=<?php echo $pouth; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          </td>
                      </tr>
<?php } ?>