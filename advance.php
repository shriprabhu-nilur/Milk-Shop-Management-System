<?php include('lock.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{ 
$c_bal=$_POST['cbal'];
$iid=$_POST['iid'];
?>
<script type="text/javascript" src="views/js/jquery.min.js"></script>
<script type="text/javascript" src="views/js/jquery.validate.min.js"></script>
<!-- end validation js -->
<!-- contact validation -->
<script type="text/javascript">
$(document).ready(function(){
	 $("#advaneForm").validate({
                rules:{
                 adv: "required",
				  pmode: "required"
                },
                messages: {
				 adv: "Please Enter Advance Amount",
				 pmode: "Please Select Payment Mode"
                },
                submitHandler: function(form) {
		    	advance();
                }
            });
        });
   
</script>
<script type="text/javascript">
function advance(){ 
		var form = $("#advaneForm");
	$.ajax({
            type: 'POST',
            url: 'save_advance.php',
            data: form.serialize(),
            success: function(data){ 			
		if(data == "Success")
		{ 
			$('#advaneForm')[0].reset();
			$('#sucess').text("Advance Added successfully");
			$('.toast-top-right').show();
			$('.toast-top-right').focus();
			$('.toast-top-right').fadeOut(5000);
			location.replace('srhinv.php'); 
		}
		else
		{ 
			$('#error').text("Please Fill All Mandatory Fields");
			$('.toast-top-center').show();
			$('.toast-top-center').focus();
			$('.toast-top-center').fadeOut(5000);
			$('#si').attr('onclick', 'saveinv()');
			$('#advaneForm')[0].reset();
		}           	   
		}                                    	  
         });           
	}
</script>
    	<script>
 function paymode(mode)
{
	if(mode==2){
		$('#chno').attr('type', 'text');
	}else{
		$('#chno').attr('type', 'hidden');
	}
} 
  	</script>
<section class="panel">
                          <header class="panel-heading">
                              Add Advance
                          </header>
                          <div class="panel-body">
                              <form action='javascript:;' name="advaneForm" id="advaneForm" method="POST" onsubmit="javascript:;" >
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Balance amount</label>
                                      <input type="text" readonly="readonly" name="balance" class="form-control" value="<?php echo $c_bal;?>" id="balance" placeholder="">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Advance amount</label>
                                      <input type="text" value="" class="form-control" id="adv" name="adv" placeholder="Advance">
                                  </div>
								   <div class="form-group">
                                      <label for="exampleInputPassword1">Payment Mode</label>
                                      <select id="pmode" name="pmode" class="form-control small" onchange="paymode(this.value)">
									 <option value="">Payment Mode</option>
									 <option value="1">Cash</option>
									 <option value="2">Cheque</option>
									 <option value="3">NFT</option>
									 </select>
                                  </div>
								  <div class="form-group">
                                     <input style="width:100%;" class="form-control small" type="hidden" id="chno" name="chno" value="" placeholder=" cheque No">
									 <input style="width:100%;" class="form-control small" type="hidden" id="iid" name="iid" value="<?php echo $iid;?>" >
                                  </div>
                                  <button type="submit" class="btn btn-info">Add</button>
                              </form>

                          </div>
                      </section>
					  <?php } ?>