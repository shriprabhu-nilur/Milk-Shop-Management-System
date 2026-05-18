<?php 
error_reporting(0);
include("lock.php");
$outh_url=$_GET['source_ref'];
if(empty($_GET['source_ref'])) {
  header("location: 404");
}
else{
	$rowup = $auth_user->fetchbill($user_id,$outh_url);
	if($rowup<=0){
	header("location: 404");
	}else{
	 $i_code =$rowup['i_code'];
	$i_sdate=date("d/m/Y",$rowup['i_sdate']);
	$i_bal=$rowup['i_bal'];
	$i_advance=$rowup['i_advance'];
	$i_total=$rowup['i_total'];
	$i_gst=$rowup['i_gst'];
	$i_csg=$rowup['i_csg'];
	 $cname=$rowup['cname'];
	$ccont=$rowup['ccont'];
	$cemail=$rowup['cemail'];
	$i_status=$rowup['i_status'];
	$i_id =$rowup['i_id'];
	$i_flag =$rowup['i_flag'];
	$cid =$rowup['cid'];
	$i_pmode =$rowup['pmode'];
	$chno =$rowup['chno'];
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
    <link rel="shortcut icon" href="img/favicon.html">
    <title>Invoice</title>
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
    <link href="views/css/invoice-print.css" rel="stylesheet" media="print">
	<link href="views/assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <section id="container" class="">
     <?php include ("header.php"); ?>
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
              <!-- invoice start-->
			
              <section id="bill">
                  <div class="panel panel-primary">
                      <!--<div class="panel-heading navyblue"> INVOICE</div>-->
					  
                      <div class="panel-body">
                          <div class="row invoice-list">
                             <!-- <div class="text-center corporate-id">
                                  <img style="width:20%;" src="views/img/lk.png" alt="">
                              </div> -->
                              <div id="one" style="width: 33.33333333%; float: left; padding-left:10px;">
                                  <h4>Rachana Saree`s</h4>
                                  <p>
                                    <img style="width:50%;" src="views/img/om.png" alt=""> 
                                  </p>
                              </div>
                              <div id="two" style="width: 33.33333333%; float: left;">
                                <h4><strong>Rachana Saree`s</strong></h4>
                                  <p>
Padmshri, 480<br>
W.mangalwar peth,<br>
Chati galli,solapur 413002.<br>
Phone: <strong>0217-2623685</strong><br>
Email: <strong>rachanasareesolapur@gmail.com</strong>
                                  </p>
                              </div>
                              <div id="three" style="width: 33.33333333%; float: left;">
                                  <h4>INVOICE INFO</h4>
                                  <ul class="unstyled">
                                      <li>Invoice Number		: <strong><?php echo $i_code; ?></strong></li>
                                      <li>Invoice Date		: <strong><?php echo $i_sdate; ?></strong></li>
									 <li>Name	:  <strong><?php echo $cname; ?></strong></li>
                                      <li>M.No		: <strong><?php echo $ccont; ?></strong></li>
									  <li>Email		: <?php echo $cemail; ?></li>
                                  </ul>
                              </div>
                          </div><hr>
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
                              <?php 
                     					$order=$auth_user->fetchorder($user_id,$i_code,$cid);
										foreach($order as $row)
                     						{
                        							$ord_desc=$row['ord_desc'] ;
													$ord_cost=$row['ord_cost'] ;
													$rdesc=$row['rdesc'] ;
													$qty=$row['qty'] ;
													$ord_id=$row['ord_id'] ;
													$rtot=$row['rtot'] ;
													$grandtotal += $rtot;
                      						?>
								<tr>
                                  <td> <a id="am" onclick="editorder('<?php echo $ord_id; ?>')" class="btn btn-success " ><i class="fa fa-pencil"></i></a></td>
                                  <td> <input Readonly  name="parti<?php echo $ord_id; ?>" id="parti<?php echo $ord_id; ?>" value="<?php echo $ord_desc; ?>" class="form-control small" placeholder="Refrences">
								    </datalist>
									</td>
								  <td> <textarea class="form-control small" id="rdesc<?php echo $ord_id; ?>" name="rdesc<?php echo $ord_id; ?>" value="" placeholder="Description"><?php echo $rdesc; ?></textarea></td>
                                  <td> <input type="text"  class="form-control small pull-right" id="qty<?php echo $ord_id; ?>" name="qty<?php echo $ord_id; ?>" value="<?php echo $qty; ?>" placeholder="Quantity" onKeyPress="return isNumberKey(event);" >
								  <input type="hidden"  id="oldqty<?php echo $ord_id; ?>" name="oldqty<?php echo $ord_id; ?>" value="<?php echo $qty; ?>" placeholder="Quantity" onKeyPress="return isNumberKey(event);" ></td>
								  <td> <input type="text"  class="form-control small pull-right" id="ocost<?php echo $ord_id; ?>" name="ocost<?php echo $ord_id; ?>" value="<?php echo $ord_cost; ?>" placeholder="Amount" onKeyPress="return isNumberKey(event);" ></td>
								</tr>	
											<?php } ?>
                              </tbody>
                          </table><hr>
                          <div class="row">
						  						  <div class="col-lg-4  pull-left">	
							  <h4><strong>Advance Details</strong></h4>
<ul class="unstyled amounts">
							
					<?php $advanceall = $auth_user->fetchaud($i_code);
					if($advanceall > 0){
					foreach($advanceall as $advn){
						$m_adv=$advn['aud_credit'];
						$a_date=date("d M Y",$advn['aud_date']);
						$m_pmode=$advn['pmode'];
						$m_chno=$advn['chno'];
						$aud_id=$advn['aud_id'];
						$alladv += $m_adv;
					?>
                                      <li><strong><?php echo $a_date; ?> .................... <?php echo $m_adv; ?>/-  By: <?php
									  switch ($m_pmode) {
    case "1":
        echo "Cash";
        break;
    case "2":
        echo "Cheque ";
        break;
    case "3":
        echo "NFT";
        break;
}
 if($i_pmode==2){?> : Cheque No: <?php echo $m_chno; ?> <?php } ?> </strong> 
								  </li>
					<?php }}else{ echo"<li><strong>No Advance Taken</strong></li>";}?>
                                  </ul>
                                   </div>
						  <div class="col-lg-4 invoice-block pull-right">
                                  <ul class="unstyled amounts">
                                      <li class="form-inline"><strong>Grand Total amount : </strong><input style="width:45%;" maxlength="7" readonly="readonly" onKeyPress="return isNumberKey(event);" class="form-control small" type="text" id="gtot" name="gtot" value="<?php echo $grandtotal; ?>"></li>
									  <li class="form-inline"><strong>Advance amount : </strong><?php echo $alladv; ?>/- </li>
                                   </ul>
                              </div>
                              
                          </div>
						  <hr>
                         <div class="text-center corporate-id">
						 <strong style="color:red;">GST IN-27CBXPM1638N1ZR</strong><hr>
								 <p><strong>BANK A/C DETAILS :-  PNB A/C No:2109031859, IFSC-CODE: PUNB0376400, Punjab Natinal Bank, Kasturba Marcket, Solapur  </strong></p>
								 <hr>
								 <p><strong style="float:left;">Invoice No:<?php echo $i_code; ?> </strong>
								 <strong style="float:right;">Invoice Date		: <?php echo $i_sdate; ?></strong></p><br><br>
								 <p> <strong style="float:left;">Goods Reciver Sign:</strong>
								   <strong style="float:right;">For: Rachana Saree`s</strong></p>
                              </div> 
							  
							<hr>  
                      </div>
                  </div>
              </section>
			  
              <!-- invoice end-->
			  <div class="text-center invoice-btn">
								
                              <?php if($i_flag!='2') {?>
							   <a id="si" onclick="svinv()" class="btn btn-danger btn-lg"><i class="fa fa-check"></i> Save  </a>
						  <?php }else{
						  }?>
                          </div>
          </section>
      </section>
	  <div id="toast-container" style="display:none; " class="toast-top-right" aria-live="polite" role="alert"><div class="toast toast-success"><div class="toast-progress" style="width: 99.9218%;"></div><button type="button" class="toast-close-button" role="button">×</button><div class="toast-title">Toastr Notification</div><div id="sucess" class="toast-message"> </div></div></div>
	  <div  id="toast-container"style="display:none; " class="toast-top-center" aria-live="polite" role="alert"><div class="toast toast-error"><button type="button" class="toast-close-button" role="button">×</button><div class="toast-title">Error Notification</div><div id="error" class="toast-message"></div></div></div>
	    <!-- ****************** popup *********************** -->		
	 <link href="views/POPUP/lightbox.css" rel="stylesheet" type="text/css">
<style>
.dropdown-menu .divider {
    background-color: #E5E5E5;
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
}
</style>
		<div id="image_div"></div>
			<div id="light" class="white_content">
				<div id="view9"></div>	 
			<div id="closer" onclick="document.getElementById('light').style.display='none';document.getElementById	('fade').style.display='none';"><img src="POPUP/close.png"/></div>     
		</div>
		<div id="fade" class="black_overlay"></div>
  <?php include ("footer.php"); ?>
      <!--footer end-->
  </section>
<script type="text/javascript">	
function editorder(ordid)
{
	//alert("aa");
	$("#am").attr("onclick", "aaa");
	var parti = $("#parti"+ordid).val();
	var ocost = $("#ocost"+ordid).val();
	var qty = $("#qty"+ordid).val();
	var oldqty = $("#oldqty"+ordid).val();
	var rdesc = $("#rdesc"+ordid).val();
	var cid = "<?php echo $cid ;?>";
	var ino = "<?php echo $i_code ;?>";
	//alert(parti);
	if(parti!="" && ocost!="" && ordid!="" && cid!="" && ino!="" && rdesc!="" && qty!="" && oldqty!=""){
	$.ajax({
    type:'POST',
    url:'chgorder.php',
    data:{parti:parti,ocost:ocost,cid:cid,ino:ino,rdesc:rdesc,qty:qty,oldqty:oldqty,ordid:ordid},
    success:function(msg){
		//alert(msg);
		if(msg=="Success"){
	$('#container').load(document.URL +  ' #container');
	//$("#view").html(msg);
	$("#parti").val("");
	$("#ocost").val("");
	$("#rdesc").val("");
	$("#oldqty").val("");
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
<script>
	function advn(iid, cbal){
		//alert(iid+"xxxxxxx"+cbal);
			$('#light').show();
			$('#fade').show();
	 $.ajax({
			type:'POST',
			url:'advance.php',
			data: {iid:iid, cbal:cbal},
			success: function(result){
			//alert(result);
				$('#view9').html(result);
               document.getElementById('view9').focus();
				}
		        });
	      }
</script>
<script type="text/javascript">	
function svinv()
{ 
	$('#si').attr('onclick', 'aaa');
	var cid = "<?php echo $cid ;?>";
	var ino = "<?php echo $i_code ;?>";
	var advn = "<?php echo $alladv ;?>";
	var iid = "<?php echo $i_id ;?>";
	var gtotal = $("#gtot").val();
	//alert(pmode+"xx"+advance+"xx"+ino+"xx"+gtotal+"xx"+cid+"xx"+chno+"xxx"+igst);
	if(ino!="" && gtotal!="" && cid!="" && iid!=""){
	$.ajax({
    type:'POST',
    url:'svinv.php',
    data:{ino:ino, gtotal:gtotal, cid:cid, advn:advn, iid:iid},
    success:function(msg){
		$('#si').attr('onclick', 'aaa');
		$("#chno").val("");
		$("#advance").val("");
		$('#sucess').text("Invoice Saved Successfully");
		$('.toast-top-right').show();
		$('.toast-top-right').fadeOut(5000);
		setTimeout(' window.location.href = "bill?source_ref=<?php echo $outh_url; ?>"; ',1000);
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
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="views/js/jquery.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="views/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="views/js/jquery.scrollTo.min.js"></script>
    <script src="views/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="views/js/respond.min.js" ></script>
  <!--right slidebar-->
  <script src="views/js/slidebars.min.js"></script>
    <!--common script for all pages-->
    <script src="views/js/common-scripts.js"></script>
  </body>
</html>
