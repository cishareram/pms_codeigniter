<main id="margin">
    <div class="container-fluid">
	<div class="row">
	    <div class="col-md-2" id="margin">
		<ul class="nav nav-list">
		    <li class="nav-header"><h4>Category Menu</h4></li>
		    <li class="active"><a href="<?php echo $site_url ;?>/index">Home</a></li>
		    <li><a href="<?php echo $site_url ;?>/add">Add Category</a></li>
		</ul>
	    </div>
	    <div class="col-md-10">
		<div>
		    <h3> Product Category Add </3>
		</div>
		<div id="margin"></div>
		<form class="form-horizontal" id="signupForm" method="POST" action="<?php echo $site_url ;?>/add" >
		    
		    <div class="form-group">
			<label for="title" class="col-sm-2 control-label"> Title </label>
			<div class="col-sm-6">
			    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
			</div>
		    </div>
		    
		    
		    <div class="form-group">
			<label for="description" class="col-sm-2 control-label"> Description </label>
			<div class="col-sm-6">
			    <textarea rows="5" class="form-control" id="description" name="description" placeholder="Description" ></textarea>
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