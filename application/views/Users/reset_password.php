<main id="margin">
    <div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
		
		<form class="form-horizontal" id="signupForm" method="POST" action="<?php echo $site_url ;?>" ">
		    <div class="form-group" >
			<label for="password" class="col-sm-2 col-sm-offset-2 control-label"> Reset Password </label>
			<div class="col-sm-6">
			    <input type="text" class="form-control" id="password"  name="password" placeholder="Password">
			</div>
		    </div>
		    
		    <div class="form-group" >
			<label for="cpassword" class="col-sm-2 col-sm-offset-2 control-label"> Confirm Password </label>
			<div class="col-sm-6">
			    <input type="text" class="form-control" id="cpassword"  name="cpassword" placeholder="confirm password">
			</div>
		    </div>
		
		    <div class="form-group">
			<div class="col-sm-8 col-sm-offset-4">
			    <button type="submit" class="btn btn-default" > Submit </button>
			</div>
		    </div>
		</form>
	    </div>
	</div>
    </div>		
</main>