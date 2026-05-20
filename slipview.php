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

    <title>Slip list</title>

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
		<script type="text/javascript" src="jss/jquery.js"></script>
<script type="text/javascript" src="jss/jquery.watermarkinput.js"></script>
<script type="text/javascript">
function slipname() 
{
var searchbox = $("#urf").val();
var dataString = 'searchword='+ searchbox;
	//alert(searchbox);
if(searchbox=='')
{
}
else
{
$.ajax({
type: "POST",
url: "slipname.php",
data: dataString,
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
			  <input list="Refrences" style="width: 50%; margin-bottom: 10px;" name="urf" id="urf" value="" class="form-control"  placeholder="Refrences" onkeyup="slipname()">
  <datalist id="Refrences">
            <?php $fetchsupp = $auth_user->fetchsupp($user_id);
                     					foreach($fetchsupp AS $row)
                     						{
												echo " <option value='".$row['sname']."'></option>";
                      						}
		     					?>
</datalist>
              <section class="panel">
                   <header class="panel-heading">
                      All Slip List
					  <a class="btn btn-info btn pull-right"  onclick="PrintDiv();" ><i class="fa fa-print"></i> Print</a>
                  </header>
				   <div id="divToPrint" >
                  <table class="table table-hover p-table">
                      <thead>
                      <tr>
                          <th>Slip code</th>
                          <th>Slip Date</th>
						   <th>Slip Total</th>
                          <th>Slip Balance</th>
                          <th>Slip Inv Code</th>
                          <th>Custom</th>
                      </tr>
                      </thead>
                      <tbody id="view">
					  <?php 
                    $fetchslipd = $auth_user->fetchslipd($user_id);
					foreach($fetchslipd as $prow)
{
$sl_code =$prow['sl_code'];
$iondate=date("d M Y ", $prow['iondate']);
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
