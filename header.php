      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="home.php" class="logo"><span>BillBook</span></a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img style="width:25px;" alt="" src="../images/klogo.png">
                            <span class="username"><?php echo $userRow['user_name']; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <!--<li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>-->
                            <li><a href="logout.php?logout=true"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="home.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Customers</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="cust.php">Add customers</a></li>
                          <li><a  href="viewcust.php">View customers</a></li>
                          
                      </ul>
                  </li>
				   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>vaucher</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="voucher.php">Add vaucher</a></li>
                          <li><a  href="viewvoucher.php">View vaucher</a></li>
                          
                      </ul>
                 </li>
				   <li>
                      <a href="audit.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Audit</span>
                      </a>
                  </li>
				   <li>
                      <a href="srhinv.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Invoice Details</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Suppliers</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="supplier.php">Add Supplier</a></li>
                          <li><a  href="viewsupp.php">View Supplier</a></li>
                          
                      </ul>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Stock</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="stock.php">View Stock</a></li>
                          
                      </ul>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>GST Vouchers Reports</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="gtaxpur.php">GST Purchase Vouchers</a></li>
						  <li><a  href="gsrp.php">GST Sales Vouchers</a></li>
                      </ul>
                  </li>
				 <!-- <li>
                      <a href="laser.php">
                          <i class="fa fa-laptop"></i>
                          <span>ledger Account</span>
                      </a>
                  </li>-->
                  <!--multi level menu end-->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>