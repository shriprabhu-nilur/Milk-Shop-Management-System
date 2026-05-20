<?php 
include("lock.php");
 $cdate=strtotime("now");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="katareinfo">
    <meta name="keyword" content="Katareinfo, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Project list</title>

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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
		<script type="text/javascript" src="views/jss/jquery.js"></script>
<script type="text/javascript" src="views/jss/jquery.watermarkinput.js"></script>
<script type="text/javascript">
function serinv() 
{
var searchbox = $("#searchbox").val();
var dataString = 'searchword='+ searchbox;
	//confirm(searchbox);
if(searchbox=='')
{
}
else
{

$.ajax({
type: "POST",
url: "srcinv.php",
data: dataString,
cache: false,
success: function(result)
{
$("#view").html(result);
	}
});
}return false; 
}

jQuery(function($){
   $("#searchbox").Watermark("Search by Invoice No OR Status");
   });
</script>
<script type="text/javascript">
function uinv() 
{
var searchu = $("#searchu").val();
var datauString = 'searchuword='+ searchu;
	//alert(searchu);
if(searchu=='')
{
}
else
{

$.ajax({
type: "POST",
url: "usrh.php",
data: datauString,
cache: false,
success: function(result)
{
$("#view").html(result);
	}
});
}return false; 
}
</script>
  </head>

  <body>

  <section id="container" class="">
     <?php include("header.php");?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                   <header class="panel-heading">
                      All Invoice List
					  <a class="btn btn-info btn pull-right"  onclick="PrintDiv();" ><i class="fa fa-print"></i> Print</a>
                  </header>
                  <div class="panel-body">
                      <div class="row">

                          <div class="col-md-6">
                              <ul class="directory-list">
							<input  type="text"  class="input-sm form-control" placeholder="Search by Invoice No OR Status" 
							id="searchbox" value="" onkeyup="serinv()" >
                        </ul>
                          </div>
						  <div class="col-md-6">
                              <ul class="directory-list">
							<input  type="text" value="" class="input-sm form-control" placeholder="Search by Invoice Name OR Contact" id="searchu"  onkeyup="uinv()" >
                        </ul>
                          </div>
                      </div>
                  </div>
				  <div id="divToPrint" >
                  <table class="table table-hover p-table">
                      <thead>
                      <tr>
                          <th>Invoice code</th>
                          <th>Invoice Date</th>
                          <th>Invoice Balance</th>
                          <th>Invoice Status</th>
                          <th>Custom</th>
                      </tr>
                      </thead>
                      <tbody id="view">
					  <?php 
                    $fetchinvd = $auth_user->fetchinvd($user_id);
					foreach($fetchinvd as $prow)
{
$pi_code =$prow['i_code'];
$pi_sdate=date("d M Y",$prow['i_sdate']);
$pi_bal=$prow['i_bal'];
$pouth=$prow['outh'];
$i_flag=$prow['i_flag'];
$i_status=$prow['i_status'];
$cname=$prow['cname'];
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
<?php } ?>
                      </tbody>
                  </table>
				  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <?php include("footer.php");?>
      <!--footer end-->
  </section>
  <script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=600,height=600');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="views/js/jquery.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="views/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="views/js/jquery.scrollTo.min.js"></script>
    <script src="views/js/slidebars.min.js"></script>
    <script src="views/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="views/js/respond.min.js" ></script>
    <!--common script for all pages-->
    <script src="views/js/common-scripts.js"></script>
  </body>
</html>
