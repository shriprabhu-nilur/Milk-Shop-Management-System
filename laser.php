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
  float: left;" >
               <select  name="cid" id="cid" class="form-control">
                    <option value="">Select Customer </option> 
					<?php $clrow=$auth_user->fetchlgcust($user_id);
										foreach($clrow as $row)
                     						{ ?>
											<option value="<?php echo $row['cid'];?>"><?php echo $row['cname'];?> </option> 
											<?php } ?>
                </select>
									  </div>
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
var cid=$("#cid").val();
var sdate=$("#sdate").val();
var edate=$("#edate").val();
//alert(cid+"xx"+sdate+"xx"+edate);
	  $.ajax({
           type: 'POST',
            url: 'ajax_ladger.php',
           data: {cid:cid, sdate:sdate, edate:edate},
            success: function(result) {
				//alert(result);
               $('#divToPrint').html(result);
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
