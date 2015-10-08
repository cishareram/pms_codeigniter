<main id="margin">
    <div class="container-fluid">
	<div class="row">
	    <div class="col-md-2" id="margin">
		<ul class="nav nav-list">
		    <li class="nav-header"><h4>Products Menu</h4></li>
		    <li class="active"><a href="<?php echo $products_url ;?>/index">Home</a></li>
		    <li><a href="<?php echo $products_url ;?>/add">Add Products</a></li>
		</ul>
	    </div>
	    <div class="col-md-10">
		<div>
		    <h3> Product Edit </3>
		</div>
		<div id="margin"></div>
		
		<form class="form-horizontal" id="signupForm" method="POST" action="<?php echo $products_url ;?>/edit/<?php echo $result->id;?>" >
		    
		    <div class="form-group">
			<label for="id" class="col-sm-2 control-label"> Id </label>
			<div class="col-sm-6">
			    <input type="text" class="form-control" id="id" name="id" value="<?php echo $result->id;?>" readonly="readonly">
			</div>
		    </div>
		    
		    
		    <div class="form-group">
			<label for="title" class="col-sm-2 control-label"> Category Id : </label>
			<div class="col-sm-6">
			    <select class="form-control" name = "product_category_id" id = "product_category_id">
				<option value="">--Select--</option>
				
				<?php if(!empty($records)) { ?>
				
				    <?php foreach( $records as $record ) { ?>
					
					<option value ="<?php echo $record->id; ?>"> <?php echo $record->title; ?></option>
				    <?php } ?>
				<?php } ?>
			    </select>
			</div>
		    </div>
		    
		    
		    <div class="form-group">
			<label for="title" class="col-sm-2 control-label"> Title </label>
			<div class="col-sm-6">
			    <input type="text" class="form-control" id="title" name="title"  value="<?php echo $result->title;?>" >
			</div>
		    </div>
		    
		    <div class="form-group">
			<label for="description" class="col-sm-2 control-label"> Description </label>
			<div class="col-sm-6">
			    <textarea rows="5" class="form-control" id="description" name="description"  ><?php echo $result->description; ?></textarea>
			</div>
		    </div>
		    
		    <div class="form-group">
			
			<label for="price" class="col-sm-2 control-label"> Price </label>
			<div class="col-sm-6">
			    <input type="text" class="form-control" id="price" name="price"  value="<?php echo $result->price;?>" >
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