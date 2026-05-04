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
	$trans =$rowup['trans'];
	$desti =$rowup['desti'];
	$lr =$rowup['lr'];
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
                                  <h4>Rekha Saree`s</h4>
                                  <p>
                                    <img style="width:50%;" src="views/img/om.png" alt=""> 
                                  </p>
                              </div>
                              <div id="two" style="width: 33.33333333%; float: left;">
                                <h4><strong>Rekha Saree Center</strong></h4>
                                  <p>
296 A Ektanagar<br>
Near WIT College,<br>
Solapur 413005.<br>
Phone: <strong>0217-2623685</strong><br>
Email: <strong>rs.center@gmail.com</strong><br>
<strong style="color:red;">GST IN-27CBXPM1638N1ZR</strong>
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
									  <li>GST IN		: <strong style="color:red;"><?php echo $cgno; ?></strong></li>
									  <li>LR NO	: <strong><?php echo $lr; ?></strong></li>
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
                                   <td>#</td>
                                  <td class="hidden-phone"><?php echo $ord_desc; ?></td>
								  <td class="hidden-phone"><?php echo $rdesc; ?></td>
								  <td class="hidden-phone"><?php echo $qty; ?></td>
                                  <td class="hidden-phone"><?php echo $ord_cost; ?>  /-</td>
								   <td class="hidden-phone"><?php echo $rtot; ?>  /-</td>
								</tr>
											<?php } ?>
                              </tbody>
                          </table><hr>
                          <div class="row">
						  <div class="col-lg-4  pull-left">	
							  <h4><strong>Advance Details</strong></h4>
<ul class="unstyled amounts">
							
					<?php $advanceall = $auth_user->fetchaudi($i_code);
					if($advanceall > 0){
					foreach($advanceall as $advn){
						$m_adv=$advn['aud_credit'];
						$a_date=date("d M Y",$advn['aud_date']);
						$m_pmode=$advn['pmode'];
						$m_chno=$advn['chno'];
						$aud_id=$advn['aud_id'];
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
 if($i_pmode==2){?> : Cheque No: <?php echo $m_chno; ?> <?php } ?> </strong> <a onclick="recipt('<?php echo $aud_id; ?>')" class="btn btn-success btn-xs"><i class="fa fa-money"></i> Recipt </a>
								  </li>
					<?php }}else{ echo"<li><strong>No Advance Taken</strong></li>";}?>
                                  </ul>
                                   </div>
                              <div class="col-lg-4 invoice-block pull-right">
                                  <ul class="unstyled amounts">
                                      <li><strong>Total Amount :   <?php echo $grandtotal; ?> /- </strong></li>
									  <li><strong><?php if($i_csg=="i25"){echo "IGST 5%";}
									  else{echo "SGST 2.5% + CGST 2.5%";}?>  :Rs.<?php echo $i_gst; ?> /- </strong></li>
									  <li><strong>Gross Total Amount : <?php echo $i_total; ?> /- </strong></li>
                                      <li>  <?php if($i_flag!='2') {?> <a onclick="advn('<?php echo $i_code; ?>','<?php echo $i_bal; ?>')" class="btn btn-danger  btn-xs"><i class="fa fa-money"></i> Add Advance </a><?php } ?> </li>
									  <li><strong>Balence : <?php echo $i_bal; ?> /-</strong></li>
                                      <li><strong>Payment Mode :</strong><?php
									  switch ($i_pmode) {
    case "1":
        echo "Cash";
        break;
    case "2":
        echo "Cheque";
        break;
    case "3":
        echo "NFT";
        break;
}
?></li>
									  <?php if($i_pmode==2){?>
									  <li><strong>Cheque NO :</strong><?php echo $chno; ?></li>
									  <?php } ?>
                                  </ul>
                              </div>
                          </div>
						  <hr>
                         <div class="text-center corporate-id">
						 <strong style="color:red;">GST IN-27CBXPM1638N1ZR</strong><hr>
								 <p><strong>BANK A/C DETAILS :-  PNB A/C No:2109031859, IFSC-CODE: PUNB0376400, Punjab Natinal Bank, Kasturba Marcket, Solapur  </strong></p>
								 <hr>
								 <p><strong style="float:left;">Transport:<?php echo $trans; ?> </strong>
								 <strong style="float:right;">Destination : <?php echo $desti; ?></strong></p><br><br>
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
							   <a class="btn btn-warning btn-lg" href="editbill?source_ref=<?php echo $outh_url; ?>"><i class="fa fa-print"></i> Edit </a>
                              <a class="btn btn-danger btn-lg" id="paid" onclick="clearbill('<?php echo $i_bal; ?>','<?php echo $i_id; ?>','<?php echo $i_code; ?>')"><i class="fa fa-check"></i>Paid bill</a>
						  <?php }else{
							  
						  }?>
						   
                          
                              <a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
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
function clearbill(bal,iid,ino)
{
	var x;
    if (confirm("Paid all balence amount bill!") == true) {
     $.ajax({
    type:'POST',
    url:'clrbill.php',
    data:{bal:bal,iid:iid,ino:ino},
    success:function(msg){
	$('#view').load(document.URL +  ' #view');
	$('#paid').attr('onclick', ' ');
	$('#paid').hide();
    }
	});
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

<script>
	function recipt(audid){
		//alert(audid);
			location='recipt.php?auid='+audid;
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
