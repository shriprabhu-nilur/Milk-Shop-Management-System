<?php require_once("lock.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Katareinfo">
    <meta name="keyword" content="Katareinfo, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">
    <title>Stock</title>
    <!-- Bootstrap core CSS -->
    <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="views/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="views/css/table-responsive.css" rel="stylesheet" />
      <!--right slidebar-->
      <link href="views/css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="views/css/style.css" rel="stylesheet">
    <link href="views/css/style-responsive.css" rel="stylesheet" />
	<script type="text/javascript">
function ser() 
{
var searchbox = $("#searchbox").val();
var dataString = 'searchword='+ searchbox;
	//alert(searchbox);
if(searchbox=='')
{
}
else
{

$.ajax({
type: "POST",
url: "stsearch.php",
data: dataString,
cache: false,
success: function(result)
{
	//alert(result);
$("#view").html(result);
	}
});
}return false; 
}
</script>
  </head>
  <body>
  <section id="container" class="">
      <!--header start-->
      <?php require_once("header.php"); ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start--><input type="text" style="width: 30%; color: rgb(170, 170, 170);" class="form-control" placeholder="Find Stock by Item Name " id="searchbox" onkeyup="ser()"> 
			   <a class="btn btn-info btn pull-right"  onclick="PrintDiv();" ><i class="fa fa-print"></i> Print</a>
			  
              <div class="row">
                  <div class="col-lg-12">
				   <div id="divToPrint" >
                      <section class="panel">
                          <header class="panel-heading">
                            Stock list
                          </header>
                          <div class="panel-body">
                              <section id="no-more-tables">
                                  <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                      <tr>
                                          <th>Sr.No.</th>
                                          <th>Item Name</th>
										  <th>Item Code</th>
										  <th>Item Description</th>
										  <th>Item Price</th>
										  <th>Item Quantity</th>
										  <th>Stock Remains</th>
										  <th>Damage Stock</th>
										  <th>Add damage</th>
                                      </tr>
                                      </thead>
                                      <tbody id="view">
									  <?php $fetchstock=$auth_user->fetchstock($user_id);
										foreach($fetchstock as $stockdata)
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
												 <?php  } ?>
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
      <!-- Right Slidebar start -->
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
      <!-- Right Slidebar end -->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2018 &copy;Rekha Sarees
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="views/js/jquery.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="views/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="views/js/jquery.scrollTo.min.js"></script>
    <script src="views/js/respond.min.js" ></script>
    <script src="views/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="views/js/slidebars.min.js"></script>
    <script src="views/js/common-scripts.js"></script>
	  <script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=600,height=600');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>
	 <script>
	function damage(stid, strem){
		//alert(stid+"xxxxxxx"+strem);
			$('#light').show();
			$('#fade').show();
	 $.ajax({
			type:'POST',
			url:'damage.php',
			data: {stid:stid, strem:strem},
			success: function(result){
			//alert(result);
				$('#view9').html(result);
               document.getElementById('view9').focus();
				}
		        });
	      }
</script>
  </body>
</html>
