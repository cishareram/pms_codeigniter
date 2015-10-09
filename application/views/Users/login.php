<main id="margin">
    <div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
		
		<form class="form-horizontal" id="signupForm" method="POST" action="<?php echo $site_url ;?>" ">
		    
		    <div class="form-group">
			<label for="username" class="col-sm-2 col-sm-offset-2 control-label">Username</label>
			<div class="col-sm-6">
			    <input type="text" class="form-control" id="username"  name="username" placeholder="username">
			</div>
		    </div>
		    
		    <div class="form-group">
			<label for="password" class="col-sm-2 col-sm-offset-2 control-label">Password</label>
			<div class="col-sm-6">
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			</div>
		    </div>
		    <div class="form-group">
			<div class="col-sm-8 col-sm-offset-4">
			    <a href ="<?php echo site_url('users/verify_email'); ?>" > Forgot password ?</a>
			</div>
			
		    </div>
		    <div class="form-group">
			<div class="col-sm-8 col-sm-offset-4">
			    <button type="submit" class="btn btn-default" > Save </button>
			</div>
		    </div>
		</form>
	    </div>
	</div>
    </div>		
</main>