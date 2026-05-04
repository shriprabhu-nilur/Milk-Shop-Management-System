<?php 
error_reporting(0);
include("lock.php");
$cotp=$_GET['source_ref'];
if(empty($_GET['source_ref'])) {
  header("location: 404");
}
else{
   $fetchotp=$auth_user->fetchotp($user_id,$cotp);
	if($fetchotp<=0){
	header("location: 404");
	}else{
	//print_r($fetchotp);
	$cname=$fetchotp[0]['cname'];
	$cid=$fetchotp[0]['cid'];
	$caddr=$fetchotp[0]['caddr'];
	$cemail=$fetchotp[0]['cemail'];
	$ccont=$fetchotp[0]['ccont'];
	$fcotp=$fetchotp[0]['cotp'];
	$ad_cod="Inv";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Katareinfo">
    <meta name="keyword" content="Katareinfo, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="views/img/favicon.html">
    <title>purchase list</title>
    <!-- Bootstrap core CSS -->
   <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="views/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <!--right slidebar-->
      <link href="views/css/slidebars.css" rel="stylesheet">
      <!-- Custom styles for this template -->
    <link href="views/css/style.css" rel="stylesheet">
    <link href="views/css/style-responsive.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="views/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="views/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="views/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="views/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="views/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
	<link href="views/assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <section id="container" class="">
     <?php include ("header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- invoice start-->
              <section >
                  <div class="panel panel-primary">
                      <!-- <div class="panel-heading navyblue"> INVOICE</div> -->
                      <div class="panel-body">
                          <div class="row invoice-list">
                              <div class="col-lg-4 col-sm-4">
                                  <h4>Organic Milk Shop</h4>
                                  <p>
                                    <img style="width:50%;" src="views/img/om.png" alt=""> 
                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                 <h4><strong>Organic Milk Shop</strong></h4>
                                  <p>
121 Krushanaveni nagar<br>
Vidi Gharkul ,<br>
Solapur 413005.<br>
Phone: <strong>0217-2623685</strong><br>
Email: <strong>rs.center@gmail.com</strong><br>
<strong style="color:red;">GST IN-27CBXPM1638N1ZR</strong>
                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>INVOICE INFO</h4>
                                  <ul class="unstyled">
								  <?php $inv=$auth_user->fetchinv($user_id);
										if($inv == 0){
											$incode=$inv + 1;
											$ino=date("Y")."-".$ad_cod."-".$incode;
											$auth=md5($ino);
										}else{
										$icode=$inv['i_code'];
										$parts = explode('-', "$icode");
										$icnt = $parts[2];
										$incode=$icnt + 1;
										$ino=date("Y")."-".$ad_cod."-".$incode;
										$auth=md5($ino);
										}
										?>
                                      <li>Invoice Number		: <strong><?php echo $ino; ?></strong></li>
									 <li>Name	:  <?php echo $cname; ?> </li>	
									  <li>Address		: <?php echo $caddr; ?></li>
                                      <li>M.No		: <?php echo $ccont; ?></li>
                                  </ul>
                              </div>
                          </div>
                          <table class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th class="hidden-phone">Particulars</th>
								  <th class="hidden-phone">Description</th>
								  <th class="hidden-phone">Quantity </th>
                                  <th class="hidden-phone">Amount (INR)</th>
								  <th class="hidden-phone">Total Amount (INR)</th>
                              </tr>
                              </thead>
                              <tbody>
								<tr>
                                  <td> <a id="am" onclick="addorder()" class="btn btn-success " ><i class="fa fa-plus"></i></a></td>
                                  <td> <input list="Refrences"  name="parti" id="parti" value="" class="form-control small" placeholder="Refrences">
								    <datalist id="Refrences">
									<?php $fetchstock=$auth_user->fetchinvstock($user_id);
										foreach($fetchstock as $stockinvdata)
                     						{?>
										<option value="<?php echo "ST00".$stockinvdata['st_id']." ".$stockinvdata['st_desc']; ?>"> </option>
									<?php } ?>
								    </datalist>
									</td>
								  <td> <textarea class="form-control small" id="rdesc" name="rdesc" value="" placeholder="Description"></textarea></td>
                                  <td> <input type="text"  class="form-control small pull-right" id="qty" name="qty" value="" placeholder="Quantity" onKeyPress="return isNumberKey(event);" ></td>
								  <td> <input type="text"  class="form-control small pull-right" id="ocost" name="ocost" value="" placeholder="Amount" onKeyPress="return isNumberKey(event);" ></td>
								</tr>
								<?php $order=$auth_user->fetchorder($user_id,$ino,$cid);
										foreach($order as $orderdata)
                     						{
                        							$ord_desc=$orderdata['ord_desc'] ;
													$ord_cost=$orderdata['ord_cost'] ;
													$rdesc=$orderdata['rdesc'] ;
													$qty=$orderdata['qty'] ;
													$ord_id=$orderdata['ord_id'] ;
													$rtot=$orderdata['rtot'];
													$grandtotal += $rtot;
													$st_id=$orderdata['st_id'];
                      						?>
								<tr>
                                  <td><a onclick="remove('<?php echo $ord_id; ?>','<?php echo $st_id; ?>','<?php echo $qty; ?>')" class="btn btn-danger " ><i class="fa fa-times"></i></a></td>
                                  <td class="hidden-phone"><?php echo $ord_desc; ?></td>
								  <td class="hidden-phone"><?php echo $rdesc; ?></td>
								  <td class="hidden-phone"><?php echo $qty; ?></td>
                                  <td class="hidden-phone"><?php echo $ord_cost; ?>  /-</td>
								   <td class="hidden-phone"><?php echo $rtot; ?>  /-</td>
								</tr>
											<?php } ?>
                              </tbody>
                          </table>
                          <div class="row">
                              <div class="col-lg-4 invoice-block pull-right">
                                  <ul class="unstyled amounts">
                                      <li class="form-inline"><strong>Grand Total amount : </strong><input style="width:45%;" maxlength="7" readonly="readonly" onKeyPress="return isNumberKey(event);" class="form-control small" type="text" id="gtot" name="gtot" value="<?php echo $grandtotal; ?>"></li>
                                      <li class="form-inline"><strong >Advance :</strong> <input style="width:45%;" maxlength="7" onKeyPress="return isNumberKey(event);" class="form-control small" type="text" id="advance" name="advance" value=""></li>
									 <input style="width:45%;" maxlength="7" readonly="readonly" onKeyPress="return isNumberKey(event);" class="form-control small" type="hidden" id="igst" name="igst" value="5">
                                      <li class="form-inline"><strong>GST type :</strong><select id="cs" name="cs" class="form-control small" >
									 <option value="">CGST / SGST</option>
									 <option value="cs25">SGST & CGST 2.5 % + 2.5 %</option>
									 <option value="i25">IGST 5 %</option>
									  <option value="na">Without GST</option>
									 </select>
									 </li>
									  <li class="form-inline"><strong>Payment Mode :</strong><select id="pmode" name="pmode" class="form-control small" onchange="paymode(this.value)">
									 <option value="">Payment Mode</option>
									 <option value="1">Cash</option>
									 <option value="2">Cheque</option>
									 <option value="3">NFT</option>
									 </select>
									 </li>
									 <li class="form-inline"><input style="width:100%;" class="form-control small" type="hidden" id="chno" name="chno" value="" placeholder=" cheque No"></li>
                                   </ul>
                              </div>
							  <div class="col-lg-4 invoice-block pull-left">
                                  <ul class="unstyled amounts">
									  <li class="form-inline"><div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="" class="input-append date dpYears">
                                          <input type="text" readonly="" style="width: 80%;" name="od" id="od" value="" placeholder="Invoice Date" class="form-control">
                                              <span class="input-group-btn add-on">
                                              </span>
                                      </div></li>
                                      <li class="form-inline"><strong>Destination : </strong><input style="width:45%;" maxlength="255"   class="form-control small" type="text" id="desti" name="desti" value=""></li>
                                      <li class="form-inline"><strong >L.R.No :</strong> <input style="width:45%;" maxlength="7"  class="form-control small" type="text" id="lr" name="lr" value=""></li>
									  <li class="form-inline"><strong >Transport :</strong> <input style="width:45%;" maxlength="200"  class="form-control small" type="text" id="trans" name="trans" value=""></li>
                                   </ul>
                              </div>
                          </div>
						  <div class="text-center corporate-id">
                                 <p><strong>OUR BANK A/C  :</strong></p>
								 <p><strong>PNB A/C No:2109031859, IFSC-CODE: PUNB0376400, Punjab Natinal Bank, Kasturba Market, Solapur  </strong></p>
                              </div> 
                          <div class="text-center invoice-btn">
                              <a id="si" onclick="saveinv()" class="btn btn-danger btn-lg"><i class="fa fa-check"></i> Save Invoice </a>
                          </div>
						  
                      </div>
                  </div>
              </section>
              <!-- invoice end-->
          </section>
      </section>
      <!--main content end-->
	   <div id="toast-container" style="display:none; " class="toast-top-right" aria-live="polite" role="alert"><div class="toast toast-success"><div class="toast-progress" style="width: 99.9218%;"></div><button type="button" class="toast-close-button" role="button">×</button><div class="toast-title">Toastr Notification</div><div id="sucess" class="toast-message"> </div></div></div>
	  <div  id="toast-container"style="display:none; " class="toast-top-center" aria-live="polite" role="alert"><div class="toast toast-error"><button type="button" class="toast-close-button" role="button">×</button><div class="toast-title">Error Notification</div><div id="error" class="toast-message"></div></div></div>
     
      <!--footer start-->
  
      <!--footer end-->
  </section>
    	<script>
 function paymode(mode)
{
	if(mode==2){
		$('#chno').attr('type', 'text');
	}else{
		$('#chno').attr('type', 'hidden');
	}
} 
  	</script>
	<script>
function isCharKey(evt)
      {
	 var charCode= (evt.which) ? evt.which : event.keyCode
         if (charCode!=8 &&(charCode >122  || charCode < 97) && (charCode < 65 || charCode > 90))
		 {
            	    return false;
		  }
         return true;
      }
</script>
<script>
function isNumberKey(evt)
      {
	     var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
		 {
            return false;
		  }
         return true;
      }
</script>
<script type="text/javascript">	
function addorder()
{
	//alert("aa");
	$("#am").attr("onclick", "aaa");
	var parti = $("#parti").val();
	var ocost = $("#ocost").val();
	var qty = $("#qty").val();
	var rdesc = $("#rdesc").val();
	var cid = "<?php echo $cid ;?>";
	var ino = "<?php echo $ino ;?>";
	//alert(parti);
	if(parti!="" && ocost!="" && cid!="" && ino!="" && rdesc!="" && qty!=""){
	$.ajax({
    type:'POST',
    url:'addorder.php',
    data:{parti:parti,ocost:ocost,cid:cid,ino:ino,rdesc:rdesc,qty:qty},
    success:function(msg){
		//alert(msg);
		if(msg=="Success"){
	//$('#container').load(document.URL +  ' #container');
	window.location.reload();
	//$("#view").html(msg);
	$("#parti").val("");
	$("#ocost").val("");
	$("#rdesc").val("");
	$("#qty").val("");
	$('#am').attr('onclick', 'addorder()');
		}else{
		$('#error').text(msg);
		$('.toast-top-center').show();
		$('.toast-top-center').fadeOut(5000);
		$('#am').attr('onclick', 'addorder()');	
		}
    }
});
	}else
	{
		$('#error').text("Please Fill All Mandatory Fields");
		$('.toast-top-center').show();
		$('.toast-top-center').fadeOut(5000);
		$('#am').attr('onclick', 'addorder()');
	}
}
</script>
<script type="text/javascript">	
function saveinv()
{ 
	$('#si').attr('onclick', 'aaa');
	var advance = $("#advance").val();
	var pmode = $("#pmode").val();
	var chno = $("#chno").val();
	var igst = $("#igst").val();
	var cs = $("#cs").val();
	var cid = "<?php echo $cid ;?>";
	var ino = "<?php echo $ino ;?>";
	var gtotal = $("#gtot").val();
	var od = $("#od").val();
	var desti = $("#desti").val();
	var trans = $("#trans").val();
	var lr = $("#lr").val();
	var od = $("#od").val();
	//alert(pmode+"xx"+advance+"xx"+ino+"xx"+gtotal+"xx"+cid+"xx"+chno+"xxx"+igst);
	if(ino!="" && gtotal!="" && cid!="" && advance!="" && pmode!="" && cs!="" && igst!="" && od!=""){
	$.ajax({
    type:'POST',
    url:'savinv.php',
    data:{pmode:pmode, advance:advance, ino:ino, gtotal:gtotal, cid:cid, chno:chno, cs:cs, igst:igst, od:od, desti:desti, trans:trans, lr:lr},
    success:function(msg){
		$('#si').attr('onclick', 'aaa');
		$("#chno").val("");
		$("#advance").val("");
		$('#sucess').text("Invoice Saved Successfully");
		$('.toast-top-right').show();
		$('.toast-top-right').fadeOut(5000);
		setTimeout(' window.location.href = "bill?source_ref=<?php echo $auth; ?>"; ',1000);
    }
	});
	}else
	{
		$('#error').text("Please Fill All Mandatory Fields");
		$('.toast-top-center').show();
		$('.toast-top-center').fadeOut(5000);
		$('#si').attr('onclick', 'saveinv()');
	}
}
</script>
<script type="text/javascript">	
function remove(ord_id,st_id,qty)
{
	//alert(ord_id+"xxx"+st_id+"xxx"+qty);
	$.ajax({
    type:'POST',
    url:'remove.php',
    data:{ord_id:ord_id, st_id:st_id, qty:qty},
    success:function(msg){
		window.location.reload();
		 }
	});
}
</script>
         <script src="views/js/jquery.js"></script>
    <script src="views/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="views/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="views/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="views/js/jquery.scrollTo.min.js"></script>
    <script src="views/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="views/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="views/assets/data-tables/DT_bootstrap.js"></script>
    <script src="views/js/respond.min.js" ></script>
<script src="views/js/advanced-form-components.js"></script>
    <!--right slidebar-->
  <script src="views/js/slidebars.min.js"></script>
  <script type="text/javascript" src="views/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="views/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="views/assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="views/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!--dynamic table initialization -->
    <script src="views/js/dynamic_table_init.js"></script>
    <!--common script for all pages-->
    <script src="views/js/common-scripts.js"></script>
<script type="text/javascript" src="views/js/jquery.validate.min.js"></script>
  </body>
</html>
