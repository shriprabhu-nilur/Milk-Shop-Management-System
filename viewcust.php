<?php 
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
        <link rel="shortcut icon" href="img/favicon.html">

        <title><?php echo TITLE; ?></title>

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
      <script src="views/js/html5shiv.js"></script>
      <script src="views/js/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="views/jss/jquery.js"></script>
<script type="text/javascript" src="views/jss/jquery.watermarkinput.js"></script>
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
url: "search.php",
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

jQuery(function($){
   $("#searchbox").Watermark("Find Customers by All mandatory field");
   });
</script>
    </head>

    <body>

        <section id="container" class="">
            <?php include("header.php"); ?>
                <!--main content start-->
                <section id="main-content">
                    <section class="wrapper site-min-height">
                        <!-- page start-->
                        <ul class="directory-list">
							<input  type="text"  class="input-sm form-control" placeholder="Find Customers by Name and mobile" id="searchbox"  onkeyup="ser()" >
                        </ul>
						
                        <div class="directory-info-row">
                            <div class="row" id="view">
                               <?php
	$fetchcust = $auth_user->fetchcust($user_id);
	foreach ($fetchcust as $fetchcustdiv){
	$cname=$fetchcustdiv['cname'];
	$cid=$fetchcustdiv['cid'];
	$caddr=$fetchcustdiv['caddr'];
	$cemail=$fetchcustdiv['cdairy'];
	$ccont=$fetchcustdiv['ccont'];
	$cotp=$fetchcustdiv['cotp'];
								?>
                                    <div  class="col-md-4 col-sm-4">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img  class="thumb media-object" src="img/photos/user1.jpg" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4><?php echo $cname; ?> <span class="text-muted small"></span></h4>
                                                        <address>
                                      <strong style="font-size: 12px;"><?php echo $cemail; ?></strong><br>
                                    <?php echo $caddr; ?><br/>
                                      <abbr title="Phone">P:</abbr> <?php echo $ccont; ?>
									</address>
                                                        <ul class="social-links">
                                                            <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="invoice?source_ref=<?php echo $cotp; ?>" data-original-title="Invoice"><i class="fa fa-book"></i></a></li>
                                                            <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-comment"></i></a></li>
                                                          <li><a title="" href="purchase_list?user_id=<?php echo $cid; ?>" data-placement="top" data-toggle="tooltip" class="tooltips"  data-original-title="list"><i class="fa fa-edit"></i></a></li>
                                                           <!--   <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype"><i class="fa fa-skype"></i></a></li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                        <!-- page end-->
                    </section>
                </section>
                <!--main content end-->
                <!-- Right Slidebar start -->
                <!-- Right Slidebar end -->
                <!--footer start-->
                <?php include("footer.php");?>
                <!--footer end-->
				  <div id="toast-container" style="display:none; " class="toast-top-right" aria-live="polite" role="alert"><div class="toast toast-success"><div class="toast-progress" style="width: 99.9218%;"></div><button type="button" class="toast-close-button" role="button">×</button><div class="toast-title">Toastr Notification</div><div id="sucess" class="toast-message"> </div></div></div>
	  <div  id="toast-container"style="display:none; " class="toast-top-center" aria-live="polite" role="alert"><div class="toast toast-error"><button type="button" class="toast-close-button" role="button">×</button><div class="toast-title">Error Notification</div><div id="error" class="toast-message"></div></div></div>
	    <!-- ****************** popup *********************** -->		
	 <link href="POPUP/lightbox.css" rel="stylesheet" type="text/css">
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
		<!-- ****************** popup  close*********************** -->
        </section>
		<script>
	function editcust(uid){
		//alert(uid);
			$('#light').show();
			$('#fade').show();
	 $.ajax({
			type:'POST',
			url:'purchase_list.php',
			data: {uid:uid},
			success: function(result){
			//alert(result);
				$('#view9').html(result);
                document.getElementById('view9').focus();
				}
		        });
	      }
</script>
        </section>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="views/js/jquery.js"></script>
        <script src="views/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="views/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="views/js/jquery.scrollTo.min.js"></script>
        <script src="views/js/slidebars.min.js"></script>
        <script src="views/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="views/js/respond.min.js"></script>
        <script src="views/js/common-scripts.js"></script>
    </body>
    </html>