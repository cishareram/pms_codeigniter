<main id="margin">
    <div class="container-fluid">
	<div class="row">
	    <?php if($title != 'login') {?>
		<div class="col-md-2" id="margin">
		    <ul class="nav nav-list">
			<li class="nav-header"><h4>Category Menu</h4></li>
			<li class="active"><a href="<?php echo $site_url ;?>/index">Home</a></li>
			<li><a href="<?php echo $site_url ;?>/add">Add Category</a></li>
		    </ul>
		</div>
		<div class="col-md-8">
	    <?php }?>
		
		<div>
		    <h3> Product Category List </3>
		</div>
		<table class="table table-hover" id="margin">
		    <thead>
			<tr>
			    <th>
				<a href="<?php echo site_url('product_categories/index/'.$page.'/id/'.$order); ?>" >
				    ID
				</a>
			    </th>
			    
			    <th>
				<a href="<?php echo site_url('product_categories/index/'.$page.'/title/'.$order); ?>">
				    Title
				</a>
			    </th>
			    
			    <th>
				 <a href="<?php echo site_url('product_categories/index/'.$page.'/description/'.$order);  ?>">
				    Description
				</a>
			    </th>
			    
			    <th>
				<a href="<?php echo site_url('product_categories/index/'.$page.'/created_on/'.$order); ?>">
				    Created on
				</a>
			    </th>
			    
			    <th>
				<a href="<?php echo site_url('product_categories/index/'.$page.'/updated_on/'.$order);  ?>">
				    updated on
				</a>
			    </th>
			    
			    <th> 
				Is Enable
			    </th>
			    
			    <th> Action </th>
			</tr>
		    </thead>
		    <tbody>
			
			<?php if(!empty($results)) {?>
			
			    <?php  foreach($results as $result) {
				
				$gray_class = '';
				if( 1 != $result->is_enabled ) {
				    $gray_class = 'gray';
				}
			    ?>
			    
			    <tr>
				<td class = "<?php echo $gray_class; ?>" >
				    <?php echo $result->id; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" >
				    <?php echo $result->title; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" > 
				    <?php echo $result->description; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" >
				    <?php echo $result->created_on; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" >
				    <?php echo $result->updated_on; ?>
				</td>
				
				<td>
				    <a  class="is_enable" href="javascript:void(0);" data-url="<?php echo $site_url;?>/set_is_enable"  data-is_enabled="<?php echo $result->is_enabled;?>"  data-id="<?php echo $result->id; ?>" >
                                 	
					<?php  if($result->is_enabled) { ?>
					    
					    <img src = "<?php echo ASSETS_PATH;?>/images/enable.png"  height="24px" width="24px" title="Disable"/>
				      
					<?php }else { ?>
					    
					    <img src = "<?php echo ASSETS_PATH;?>/images/disable.png" height="24px" width="24px" title="Enable"/>
					
					<?php }?>
					
				    </a>
				</td>
				
				<td class = "<?php echo $gray_class; ?>">
				
				    <a href="<?php echo $site_url;?>/edit/<?php echo $result->id; ?> ">
					<span class="glyphicon glyphicon-pencil" title="Edit"></span>
				    </a>
				    
				    <a  class="delete" href="javascript:void(0);" data-url="<?php echo $site_url;?>/remove"  data-id="<?php echo $result->id; ?>" >
					<span class="glyphicon glyphicon-trash" title="Delete"></span>
				    </a>
				</td>
			    </tr>
			   
			   <?php }?>
			<?php } else { ?>
			    <tr>
				<td >
				    <?php  echo 'record not found'?>
				</td>
			    </tr>
			<?php } ?>
		    </tbody>
		</table>
		<div class="row">
		    <div class="col-md-8 col-md-offset-4">
			<?php  echo $this->pagination->create_links();?>
		    </div>
		</div>
	    </div>
	</div>
    </div>		
</main>