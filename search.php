<?php
include('lock.php');
if($_POST)
{
$q=$_POST['searchword'];
$searchcust=$auth_user->searchcust($q,$user_id);
foreach ($searchcust as $fetchcustdiv){
	$cname=$fetchcustdiv['cname'];
	$cid=$fetchcustdiv['cid'];
	$caddr=$fetchcustdiv['caddr'];
	$cemail=$fetchcustdiv['cemail'];
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
                                                          <li><a title="" onclick="editcust('<?php echo $u_id; ?>')" data-placement="top" data-toggle="tooltip" class="tooltips"  data-original-title="Edit"><i class="fa fa-edit"></i></a></li>
                                                           <!--   <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype"><i class="fa fa-skype"></i></a></li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php } } ?>
