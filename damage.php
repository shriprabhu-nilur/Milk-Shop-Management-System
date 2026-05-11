<?php require_once('lock.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{ 
 $strem=$_POST['strem'];
 $stid=$_POST['stid'];
?>
<script type="text/javascript">
function dame(stid,strem){ 
//alert("aaa");
		var dam = $('#dam').val();
		if(dam!=""){
	$.ajax({
            type: 'POST',
            url: 'add_damage.php',
           data: {stid:stid, dam:dam, strem:strem},
            success: function(data){
//alert(data);				
		if(data == "Success")
		{ 
			$('#advaneForm')[0].reset();
			$('#sucess').text("Damage Quantity Added Successfully");
			$('.toast-top-right').show();
			$('.toast-top-right').focus();
			$('.toast-top-right').fadeOut(5000);
			location.replace('stock.php'); 
		}
		else
		{ 
			$('#error').text("Please Fill All Mandatory Fields");
			$('.toast-top-center').show();
			$('.toast-top-center').focus();
			$('.toast-top-center').fadeOut(5000);
			$('#advaneForm')[0].reset();
			location.replace('stock.php'); 
		}           	   
		}                                    	  
         });
		}else{
			$('#error').text("Please Fill All Mandatory Fields");
			$('.toast-top-center').show();
			$('.toast-top-center').focus();
			$('.toast-top-center').fadeOut(5000);
			$('#advaneForm')[0].reset();
			location.replace('stock.php'); 
		}		 
	}
</script>
<section class="panel">
                          <header class="panel-heading">
                              Add Damage
                          </header>
                          <div class="panel-body">
                     <form action="javascript:;" name="advaneForm" id="advaneForm" method="POST" >
                                  <div class="form-group">
                                      <label >Stock Remains</label>
                                      <input type="text" readonly="readonly" name="st_sell" class="form-control" value="<?php echo $strem;?>" id="st_sell" placeholder="">
                                  </div>
                                  <div class="form-group">
                                      <label >Damage Quantity</label>
                                      <input type="text" value="" class="form-control" id="dam" name="dam" placeholder="Damage Quantity">
                                  </div>
                                  
                                  <a  class="btn btn-info"  onclick="dame('<?php echo $stid;?>','<?php echo $strem;?>')" >add Damage </a>
                              </form>
</div>
                      </section>
					  <?php } ?>