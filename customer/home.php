<?php require_once("lock.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="Katareinfo, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="../views/img/favicon.html">

    <title><?php echo TITLE ; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet">
    <link href="../views/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="../views/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../views/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="../views/css/owl.carousel.css" type="text/css">

      <!--right slidebar-->
      <link href="../views/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="../views/css/style.css" rel="stylesheet">
    <link href="../views/css/style-responsive.css" rel="stylesheet" />  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <section id="container" >
      <!--header start-->
<?php require_once("header.php"); ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->

              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-3">
                      <!--new earning start-->
					
                      <div class=" state-overview">
                                  <section class="panel">
                                      <div class="symbol terques">
                                        <!--  <i class="fa fa-users"></i>-->
						<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http%3A%2F%2F10.97.176.63/y2k6/billbook/qr/index.php?<?php echo $user_id; ?>" />				  
                                      </div>
                                      <div class="value">
                                          <h1>
										  
										  <?php $fetchcust = $auth_user->fetchcustC($user_id);
												 echo "sssScan!!";	?></h1>	
                                          <p></p>
                                      </div>
                                  </section>
                              </div>
						  
                      <!--new earning end-->

                      <!--total earning start-->
					<!--	<a href="srhinv.php">
						<div class=" state-overview">
                                  <section class="panel">
                                      <div class="symbol blue">
                                          <i class="fa fa-tags"></i>
                                      </div>
                                      <div class="value">
                                          <h1><?php  $fetchinvd = $auth_user->fetchinvd($user_id); 
										 echo count($fetchinvd); ?></h1>
                                          <p>View Invoice</p>
                                      </div>
                                  </section>
                              </div>
							  </a>
						<a href="audit.php">
						<div class=" state-overview">
                                  <section class="panel">
                                      <div class="symbol blue">
                                          <i class="fa fa-money"></i>
                                      </div>
                                      <div class="value">
                                          <h1><?php $aurow=$auth_user->auditlist($user_id); 
										  echo count($aurow); ?></h1>
                                          <p>Audit Report</p>
                                      </div>
                                  </section>
                              </div>
							  </a>
						<a href="viewvoucher.php">
						<div class=" state-overview">
                                  <section class="panel">
                                      <div class="symbol red">
                                          <i class="fa fa fa-book"></i>
                                      </div>
                                      <div class="value">
                                          <h1><?php $vlist=$auth_user->voucherlist($user_id);
										  echo count($vlist); ?></h1>
                                          <p>View vaucher </p>
                                      </div>
                                  </section>
                              </div>
							  </a>	-->  
                      <!--total earning end-->
                  </div>
				              <!--      <div class="col-lg-9">
									<a href="viewsupp.php">
                      <div class="col-lg-4 state-overview">
                                  <section class="panel">
                                      <div class="symbol red">
                                          <i class="fa fa-users"></i>
                                      </div>
                                      <div class="value">
                                          <h1><?php $fetchsupp = $auth_user->fetchsupp($user_id);
												echo count($fetchsupp);	?></h1>	
                                          <p>View Supplier</p>
                                      </div>
                                  </section>
                              </div>
						</a>-->
						<!--<a href="stock.php">
                      <div class=" col-lg-4  state-overview">
                                  <section class="panel">
                                      <div class="symbol yellow">
                                          <i class="fa fa-bar-chart-o"></i>
                                      </div>
                                      <div class="value">
                                          <h1><?php $fetchstock=$auth_user->fetchstock($user_id);
												echo count($fetchstock); ?></h1>	
                                          <p>View stock</p>
                                      </div>
                                  </section>
                              </div>
						</a>-->
						<!--<a href="slipview.php">
                      <div class=" col-lg-4  state-overview">
                                  <section class="panel">
                                      <div class="symbol terques">
                                          <i class="fa fa-users"></i>
                                      </div>
                                      <div class="value">
                                         <h1><?php $fetchslip = $auth_user->fetchslipd($user_id);
												echo count($fetchslip);	?></h1>	
                                          <p>View Slip</p>
                                      </div>
                                  </section>
                              </div>
						</a>-->
                      <!--custom chart start-->
                     <!--   <div class="border-head">
                          <h3>Visiters Graph</h3>
                      </div>
                      <div class="custom-bar-chart">
                        <ul class="y-axis">
                              <li><span>100</span></li>
                              <li><span>80</span></li>
                              <li><span>60</span></li>
                              <li><span>40</span></li>
                              <li><span>20</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="20%" data-toggle="tooltip" data-placement="top">20%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="39%" data-toggle="tooltip" data-placement="top">39%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="75%" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">AUG</div>
                              <div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">SEP</div>
                              <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">OCT</div>
                              <div class="value tooltips" data-original-title="42%" data-toggle="tooltip" data-placement="top">42%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">NOV</div>
                              <div class="value tooltips" data-original-title="60%" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">DEC</div>
                              <div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
                          </div>
                      </div>-->
                      <!--custom chart end-->
                  </div>
              </div>
              
              
              

          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->
      <!--footer end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../views/js/jquery.js"></script>
    <script src="../views/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../views/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../views/js/jquery.scrollTo.min.js"></script>
    <script src="../views/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../views/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="../views/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="../views/js/owl.carousel.js" ></script>
    <script src="../views/js/jquery.customSelect.min.js" ></script>
    <script src="../views/js/respond.min.js" ></script>
    <!--right slidebar-->
    <script src="../views/js/slidebars.min.js"></script>
    <!--common script for all pages-->
    <script src="../views/js/common-scripts.js"></script>
    <!--script for this page-->
    <script src="../views/js/sparkline-chart.js"></script>
    <script src="../views/js/easy-pie-chart.js"></script>
    <script src="../views/js/count.js"></script>
  <script>
      //owl carousel
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
  </script>
  </body>
</html>
