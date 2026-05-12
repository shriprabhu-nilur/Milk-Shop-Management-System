<?php 
error_reporting(0);
include("lock.php");
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

    <title>Studio Profit Book</title>

     <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="views/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="views/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="views/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="views/assets/data-tables/DT_bootstrap.css" />
	
	<!--Datepicker table-->
	<link rel="stylesheet" type="text/css" href="views/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="views/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="views/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="views/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="views/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
      <!--right slidebar-->
      <link href="views/css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="views/css/style.css" rel="stylesheet">
    <link href="views/css/style-responsive.css" rel="stylesheet" />
  </head>
  <body>
  <section id="container" class="">
      <!--header start-->
<?php include("header.php");?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
				  <div style="margin-bottom:15px;" class="Search">
			  <form class="form-horizontal" >
									<div class="col-sm-3" style="display:inline; width:18%;padding-right: 1px;
  padding-left: 1px;  padding: 3px;
  background-color: #dbdbdb;
  background-color: rgba(219,219,219,.7);
  float: left;" ><div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                          <input type="text" readonly="" name="sdate" id="sdate" placeholder="Start Date"  class="form-control">
                                              <span class="input-group-btn add-on">
                                              </span>
                                    </div>
									  </div>
  <div class="col-sm-3" style="display:inline; width:18%;padding-right: 1px;
  padding-left: 1px;  padding: 3px;
  background-color: #dbdbdb;
  background-color: rgba(219,219,219,.7);
  float: left;" ><div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                          <input type="text" readonly="" name="edate" id="edate" placeholder="End date"  class="form-control">
                                              <span class="input-group-btn add-on">
                                              </span>
                                      </div></div>
									<a onclick="addfilter()" style="padding: 9px;" class="btn-success btn">Search</a>
									<a class="btn btn-info btn pull-right"  onclick="PrintDiv();" ><i class="fa fa-print"></i> Print</a>
							</form>
							
			  </div>
			  <div id="divToPrint" >
                      <section  class="panel">
                          <header class="panel-heading">
                          Voucher type : Sales
                          </header>
                          <div class="panel-body">
                              <section id="no-more-tables">
                                  <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                      <tr>
                                          <th>Date</th>
                                          <th>Particulars</th>
                                          <th class="numeric">GSTIN/UIN</th>
                                          <th class="numeric">Vch Type</th>
                                          <th class="numeric">Vch No</th>
										  <th class="numeric">Taxable Value</th>
										  <th class="numeric">Integrated Tax Amount</th>
										  <th class="numeric">Central Tax Amount</th>
										  <th class="numeric">State Tax Amount</th>
										  <th class="numeric">Total Tax
										  Amount</th>
										  <th class="numeric">Invoice
										  Amount</th>
                                      </tr>
                                      </thead>
                                      <tbody id="view9" >
									   <?php 
                    $fetchinvd = $auth_user->fetchinvd($user_id);
					if($fetchinvd !=0){
					foreach($fetchinvd as $prow)
{
$pi_code =$prow['i_code'];
$pi_sdate=date("d M Y",$prow['i_sdate']);
$pi_bal=$prow['i_bal'];
$pouth=$prow['outh'];
$i_flag=$prow['i_flag'];
$i_status=$prow['i_status'];
$cname=$prow['cname'];
$cgno=$prow['cgno'];
$i_total=$prow['i_total'];
$i_gst=$prow['i_gst'];
$i_csg=$prow['i_csg'];
?>
                                      <tr>
                                          <td><?php echo $pi_sdate; ?></td>
                                          <td><?php echo $cname; ?></td>
                                          <td class="numeric"><?php echo $cgno; ?></td>
                                          <td class="numeric">Sales</td>
                                          <td class="numeric"><?php echo $pi_code; ?></td>
										  <td class="numeric"><?php echo $txv=$i_total-$i_gst;
										$gtxv +=$txv;  
										  ?></td>
										  <td class="numeric"><?php if($i_csg=="i25"){ echo $i_gst ; 
										  $txiv +=$i_gst; }else{ echo "0"; } ?></td>
										  <td class="numeric"><?php if($i_csg=="cs25"){ echo $tcxt=$i_gst/2 ; 
										  $tcxtv +=$tcxt; }else{ echo "-"; } ?></td>
										  <td class="numeric"><?php if($i_csg=="cs25"){ echo $tsxt=$i_gst/2 ; 
										$tsxtv +=$tsxt;}else{ echo "-"; } ?></td>
										  <td class="numeric"><?php 
										  echo $i_gst; 
										  $gtis +=$i_gst; ?></td>
										  <td class="numeric"><?php echo $i_total; 
										  $itgt +=$i_total;?></td>
                                      </tr>
                                      <?php }
									 echo" <td style='border-right-color: #f9f9f9'></td>
									 <td>Total Balance</td>
									 <td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
									 <td class='numeric' data-title=' '><b>$gtxv</b></td>
									  <td class='numeric' data-title=' '><b>$txiv</b></td>
									  <td class='numeric' data-title=' '><b>$tcxtv</b></td>
<td class='numeric' data-title=' '><b>$tsxtv</b></td>
<td class='numeric'data-title=''><b>$gtis</b></td>
<td class='numeric'data-title=''><b>$itgt</b></td>";
									  }else{
											echo"<tr><td style='border-right-color: #f9f9f9'>
                                No data found
                            </td> 
							<td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
							<td style='border-right-color: #f9f9f9'></td>
							</tr>";	} ?>
                                      </tbody>
                                  </table>
                              </section>
                          </div>
                      </section>
					  </div>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>

   <!-- js placed at the end of the document so the pages load faster -->
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
	<script type="text/javascript" >
function addfilter()
{
var sdate=$("#sdate").val();
var edate=$("#edate").val();
//alert(sdate+"xx"+edate);
	  $.ajax({
           type: 'POST',
            url: 'gstsalev.php',
           data: {sdate:sdate, edate:edate},
            success: function(result) {
				//alert(result);
               $('#view9').html(result);
           }
       }); 
}
</script>
  <script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=600,height=600');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>
  </body>
</html>
