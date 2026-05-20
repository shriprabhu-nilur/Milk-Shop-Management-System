<?php
include('lock.php');
if($_POST)
{
$q=$_POST['searchword'];
$searchstck=$auth_user->searchstck($q,$user_id);
										foreach($searchstck as $stockdata)
                     						{
												
                        							$st_desc=$stockdata['st_desc'];
													$st_cost=$stockdata['st_cost'];
													$st_rdesc=$stockdata['st_rdesc'];
													$st_qty=$stockdata['st_qty'];
													$st_sell=$stockdata['st_sell'];
													$profit=$st_cost*3/100;
													$proprice=$st_cost+$profit;
													$st_id=$stockdata['st_id'];
													$st_rtot=$stockdata['st_rtot'];
													$dam=$stockdata['dam'];
                      						?>
                                      <tr>
                                            <td data-title="Sr.No."><?php echo $st_id; ?></td>
										    <td data-title="Item Name"><?php echo $st_desc; ?></td>
											<td data-title="Item code"><?php echo"ST00".$st_id; ?></td>
											<td data-title="Item Description"><?php echo $st_rdesc; ?></td>
											<td data-title="Item price"><?php echo $st_cost; ?></td>
											 <td data-title="Item Quantity"><?php echo $st_qty; ?></td>
											 <?php if($st_sell > 0){ ?>
											 <td data-title="Stock Remains"><?php echo $st_sell; ?></td><?php }else{ ?>
											 <td data-title="Stock Remains" style="color:Green;">Out Of Stock</td><?php } ?>
											<td data-title="Item Quantity"><?php echo $dam; ?></td>
											<td data-title="Damage">
											 <a href="#" onclick="damage('<?php echo $st_id; ?>','<?php echo $st_sell; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Add Damage</a>
											</td>
                                      </tr>
<?php  } } ?>
