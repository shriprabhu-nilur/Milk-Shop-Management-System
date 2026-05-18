<?php 
error_reporting(0);
include("lock.php");
 $cdate=strtotime("now");
 $sdate=$_POST['sdate'];
 $edate=$_POST['edate'];
 $cid=$_POST['cid'];
  $lgrow=$auth_user->lghcust($cid);
  $cname=$lgrow['cname'];
 $sdate= strtotime($sdate);
 $edate= strtotime($edate); 
                  $lgrow=$auth_user->leadgsale($user_id,$cid,$sdate,$edate);?>
				  <section  class="panel">
                          <header class="panel-heading">
                        <?php echo $cname; ?> Ledger Account <?php echo date("d-m-Y",$sdate); ?> To <?php echo date("d-m-Y",$edate); ?>
                          </header>
                          <div class="panel-body">
                              <section id="no-more-tables">
                                  <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                      <tr>
                                          <th>Date</th>
                                          <th>Particulars</th>
                                          <th class="numeric">Vch Type</th>
                                          <th class="numeric">Vch No </th>
                                          <th class="numeric">Debit</th>
										   <th class="numeric">Credit</th>
                                      </tr>
                                      </thead>
                                      <tbody id="view9" >
										<?php foreach($lgrow as $row)
                     						{
													$debit=$row['i_total'] ;
													$i_code=$row['i_code'] ;
													$i_sdate=date("d-m-Y",$row['i_sdate']);
													$tdebit +=$debit;
                      						?>
											
                                      <tr>
                                          <td data-title="Date"><?php echo $i_sdate; ?></td>
                                            <td data-title="Particulars">credit Sales</td>
											 <td data-title="vtype">Sales</td>
                                           <td data-title="V No"><?php echo $i_code; ?></td>
                                          <td data-title="Debit"><?php echo $debit; ?></td>
										   <td data-title="Credit"> </td>
                                      </tr>
                                      <?php 
											$lgaurow=$auth_user->leadgaud($user_id,$i_code,$sdate,$edate);
										foreach($lgaurow as $arow)
                     						{ 
											$aud_credit=$arow['aud_credit'] ;
													$aud_id=$arow['aud_id'] ;
													$aud_date=date("d-m-Y",$arow['aud_date']);
													$tcredit +=$aud_credit;
											?>
											 <tr>
                                          <td data-title="Date"><?php echo $aud_date; ?></td>
                                            <td data-title="Particulars">Cash</td>
											 <td data-title="vtype">Receipt</td>
                                           <td data-title="V No"><?php echo $aud_id; ?></td>
                                          <td data-title="Debit"></td>
										   <td data-title="Credit"><?php echo $aud_credit; ?> </td>
                                      </tr>	
											<?php } 
										}
										echo" <td style='border-right-color: #f9f9f9'></td>
									 <td>Closing Balance</td>
									 <td style='border-right-color: #f9f9f9'></td>
									 <td> </td>
									 <td class='numeric' data-title='TOTAL Debit'><b>$tdebit</b></td>
									  <td class='numeric' data-title='TOTAL Credit'><b>$tcredit</b></td> ";
									  ?>
									      </tbody>
                                  </table>
                              </section>
                          </div>
                      </section>