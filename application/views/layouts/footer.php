	<footer class="bg-primary" id="margin">
	    <div class="container">
		<div class="container-fluid">
		    <div class="row">
			<div class="col-md-8 col-md-offset-3">
			    <h2> Provided By CIS </h2>
			</div>
		    </div>
		</div>
	    </div>
	</footer>
	
	</div>
   	<script src="<?php echo JS_PATH ?>/jquery-1.11.3.min.js"></script>
	<script src="<?php echo JS_PATH ?>/jquery.validate.min.js"></script>
	<script src="<?php echo BOOTSTRAP_PATH ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo BOOTBOX_PATH ?>/bootbox.js"></script>
	<script src="<?php echo BOOTBAR_PATH ?>/bootbar.js"></script>
	<script type= "text/javascript">
	    
	    $(document).ready(function(){
	       
		$(".delete").click(function(){
		    var thisObj 	= $(this);
		    var urlMethod 	= thisObj.data('url');
		    var id 		= thisObj.data('id');
		    var url	 	= urlMethod +'/'+ id;
		    
		    bootbox.confirm("Are you sure want to delete?", function(result)
		    {
			if(result == true)
			{
			    $.ajax({
			       
				url	: url,
				type	: 'get',
				success	: function(data){
				    console.log(data);
				    
				    if (data == 1){
					thisObj.parents('tr').animate({backgroundColor: "#9900CC" }, "fast")
					.animate({ opacity: "hide" }, "slow");
					var message = 'record deleted successfully';
					success(message);
				    }
				    else
				    {
					var message = 'record not deleted';
					error(message);
				    }
				}
			    });
			}
		    });
		});
	    });
	    
	</script>
	<script type= "text/javascript">
	    $(document).ready(function(){
		$(document).on('click', '.is_enable', function(){
		    var thisObj = $(this);
		    
		    var url 		= thisObj.data('url');
		    var is_enabled 	= thisObj.data('is_enabled');
		    var id 		= thisObj.data('id');
		    var dataString	= 'is_enable='+ is_enabled +'&id='+ id;
		    $.ajax({
			url	: url,
			data	: dataString,
			type	: 'POST',
		       
			success: function(data){
			    console.log(data);
			    if (data == 1 )
			    {
				if( is_enabled == 1 )
				{
				    
				    thisObj.data('is_enabled', 0);
				    thisObj.parents('tr').find('td').addClass('gray');
				    thisObj.find('img').attr('src', '<?php echo ASSETS_PATH;?>/images/disable.png');
				    thisObj.find('img').attr('title', 'Enable');
				    var message = 'record disabled';
				    success(message);
				}
				else{
				    
				    thisObj.data('is_enabled', 1 );
				    thisObj.parents('tr').find('td').removeClass('gray');
				    thisObj.find('img').attr( 'src', '<?php echo ASSETS_PATH;?>/images/enable.png' );
				    thisObj.find('img').attr('title', 'Disable');
				    var message = 'record enabled';
				    success(message);
				}
			    }
			}
		    });
		});
	   });
	    
	</script>
	<script type= "text/javascript"> 
	    
	    $().ready(function() {
		$("#signupForm").validate({
			rules: {
				title: {
				    required :true,
				},
				description: {
				    required :true,
				},
				username: {
				    required: true,
				},
				password: {
				    required: true,
				},
				cpassword: {
				    required: true,
				    equalTo: "#password",
				    //minlength: 6,
				    //maxlength: 10
				},
				price: {
				    required: true,
				},
				product_category_id: {
				    required: true,
				},
				file:{
				    required: true,  
				},
				email: {
				    required: true,
				},
				topic: {
				    required: "#newsletter:checked",
				    minlength: 2,
				},
				agree: "required",
			},
			messages: {
				
				title: "Please enter  title",
				description: "Please enter description",
				username: {
				    required: "Please enter a username",
				    
				},
				password: {
				    required: "Please enter confirm password"
				},
				cpassword: {
				    required: "Please confirm password",
				    equalTo: "Please enter the same password as above",
				},
				price: {
				    required: "Please enter price"
				},
				product_category_id: {
				    required: "Please select product category",
				},
				file:{
				    required: "please select file",  
				},
				email:{
				    required: "please enter email id",  
				},
			},
			
			errorElement: "p",
			errorClass: "has-error help-block",
			validClass: "has-success",
			
			highlight: function(element, errorClass, validClass) {
			    $(element).parent("div.col-sm-6").addClass(errorClass);
			    $(element).siblings("p").addClass(errorClass);
			    },
			    
			
			unhighlight: function(element, errorClass, validClass) {
			    //$(element).parent('.form-group').addClass(validClass).removeClass(errorClass);
			    $(element).parent("div.col-sm-6").removeClass(errorClass).addClass(validClass);
			    //$(element).siblings("p").addClass(validClass);
			    $(element).siblings("p").removeClass(errorClass);
			},
			
		});
		
	    });
	    
	</script>
	<script>
	    $(document).ready(function(){
		<?php if($this->session->flashdata('success')){ ?>
		    var message = '<?php echo $this->session->flashdata('success'); ?>';
		    success(message);
		<?php } else{?>
		    <?php  if($this->session->flashdata('error')){?>
		    var message = '<?php echo $this->session->flashdata('error'); ?>';
		    error(message);
		    <?php }?>
		<?php }?>
	    });
	</script>
	<script>
	    function success(data)
	    {
		$.bootbar.success('<p align="center">'+data+'</p>', {
		    autoDismiss: true,      
		    autoLinkClass: true,     
		    barType: "success",  
		    dismissTimeout: 2000,    
		    dismissEffect: "slide",  
		    dismissSpeed: "fast",   
		    onDraw: null,           
		    onDismiss: null,          
		} );          
	    }
	    
	    function error(data)
	    {
		$.bootbar.danger('<p align="center">'+data+'</p>', {
		    autoDismiss: true,      
		    autoLinkClass: true,
		    barType: "danger",  
		    dismissTimeout: 2000,
		    dismissEffect: "slide",
		    dismissSpeed: "fast",
		    onDraw: null,       
		    onDismiss: null,
		} );
	    }
	</script>
    </body>
</html>