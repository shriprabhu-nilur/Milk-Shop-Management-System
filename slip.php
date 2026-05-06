<?php 
error_reporting(0);
include("lock.php");
$outh_url=$_GET['source_ref'];
if(empty($_GET['source_ref'])) {
  header("location: 404");
}
else{
	$rowup = $auth_user->fetchslipdata($user_id,$outh_url);
	if($rowup<=0){
	header("location: 404");
	}else{
	$slno =$rowup['sl_code'];
	$iondate=date("d M Y ", $rowup['iondate']);
	$inno =$rowup['inno'];
	$gtotal=$rowup['gtotal'];
	$lrno=$rowup['lrno'];;
	$sname=$rowup['sname'];
	$scont=$rowup['scont'];
	$saddr=$rowup['saddr'];
	$sgno=$rowup['sgno'];
	$sl_id =$rowup['sl_id'];
	$sl_flag =$rowup['sl_flag'];
	$sid =$rowup['sid'];
	$gst =$rowup['gst'];
	$dis =$rowup['dis'];
	$sl_bal =$rowup['sl_bal'];
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
                              <div class="col-lg-4 col-sm-4">
                                  
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4><strong><?php echo $sname; ?></strong></h4>
                                  <p>
<?php echo $saddr; ?><br>
Phone: <strong><?php echo $scont; ?></strong><br>
<strong style="color:red;">GST-IN:<?php echo $sgno; ?></strong>
                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">
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
                             <?php $fetchgoods=$auth_user->fetchgoods($user_id,$slno,$sid);
										foreach($fetchgoods as $fetchgoodsdata)
                     						{
                        							$go_desc=$fetchgoodsdata['go_desc'] ;
													$go_cost=$fetchgoodsdata['go_cost'] ;
													$go_rdesc=$fetchgoodsdata['go_rdesc'] ;
													$go_qty=$fetchgoodsdata['go_qty'] ;
													$go_id=$fetchgoodsdata['go_id'] ;
													$go_rtot=$fetchgoodsdata['go_rtot'];
													$grandtotal += $go_rtot;
                      						?>
								<tr>
								<td class="hidden-phone">#</td>
                                  <td class="hidden-phone"><?php echo $go_desc; ?></td>
								  <td class="hidden-phone"><?php echo $go_rdesc; ?></td>
								  <td class="hidden-phone"><?php echo $go_qty; ?></td>
                                  <td class="hidden-phone"><?php echo $go_cost; ?>  /-</td>
								   <td class="hidden-phone"><?php echo $go_rtot; ?>  /-</td>
								</tr>
											<?php } ?>
                              </tbody>
                          </table><hr>
                          <div class="row">
						  <div class="col-lg-4  pull-left">	
							  <h4><strong>Advance Details</strong></h4>
<ul class="unstyled amounts">
							
					<?php $advanceall = $auth_user->fetchaudvou($slno);
					if($advanceall > 0){
					foreach($advanceall as $advn){
						$m_adv=$advn['aud_debit'];
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
 if($i_pmode==2){?> : Cheque No: <?php echo $m_chno; ?> <?php } ?> </strong>
								  </li>
					<?php }}else{ echo"<li><strong>No Advance Taken</strong></li>";}?>
                                  </ul>
                                   </div>
                              <div class="col-lg-4 invoice-block pull-right">
                                  <ul class="unstyled amounts">
                                      <li><strong>Total amount :   <?php echo $grandtotal; ?> /- </strong></li>
									  <li>  <?php if($sl_flag!='2') {?> <a onclick="advn('<?php echo $slno; ?>','<?php echo $sl_bal; ?>')" class="btn btn-danger  btn-xs"><i class="fa fa-money"></i> Add Advance </a><?php }else{?>
										  <strong>Discount : <?php echo $dis; ?>/- </strong>
									 <?php } ?> </li>
									  <li><strong>Balance : <?php echo $sl_bal; ?> /-</strong></li>
									  <?php if($gst==25){ ?>
									  <li><strong>SGST 2.5% + CGST 2.5%: <?php echo round($grandtotal*5/100); ?></strong></li>
									 <?php }elseif($gst==5){ ?>
									  <li><strong>IGST 5 % : <?php echo round($grandtotal*5/100); ?> /-</strong></li>
									 <?php }else{ ?>
									 <li><strong>Without GST: 0 </strong></li>
									<?php } ?>
									  <li><strong>Net Total amount :   <?php echo $gtotal; ?> /- </strong></li>
                                  </ul>
                              </div>
                          </div>
						  <hr>
                         <div class="text-center corporate-id">
								 <p><strong style="float:left;">Invoice No:<?php echo $inno; ?> </strong>
								 <strong style="float:right;">Invoice Date	: <?php echo $iondate; ?></strong></p><br><br>
								 <p> <strong style="float:left;">LR No:<?php echo $lrno; ?></strong>
								   
                              </div> 
							  
							<hr>  
                      </div>
                  </div>
              </section>
			  
              <!-- invoice end-->
			  <div class="text-center invoice-btn">
			  <?php if($sl_flag!='2') {?>
			  <a class="btn btn-danger btn-lg" id="paid" onclick="clearbill('<?php echo $sl_bal; ?>','<?php echo $sl_id; ?>','<?php echo $slno; ?>')"><i class="fa fa-check"></i>remains Discount</a>
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
function clearbill(bal,slid,slno)
{
	var x;
    if (confirm("Discount all balence amount of Slip!") == true) {
     $.ajax({
    type:'POST',
    url:'clrslip.php',
    data:{bal:bal,slid:slid,slno:slno},
    success:function(msg){
		alert(msg);
	$('#bill').load(document.URL +  ' #bill');
	$('#paid').attr('onclick', ' ');
	$('#paid').hide();
    }
	});
    }
}	 
</script>
<script>
	function advn(slid, cbal){
		//alert(slid+"xxxxxxx"+cbal);
			$('#light').show();
			$('#fade').show();
	 $.ajax({
			type:'POST',
			url:'sladvance.php',
			data: {slid:slid, cbal:cbal},
			success: function(result){
			//alert(result);
				$('#view9').html(result);
               document.getElementById('view9').focus();
				}
		        });
	      }
</script>
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
