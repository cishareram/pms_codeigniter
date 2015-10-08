<main id="margin">
    <div class="container-fluid">
	<div class="row">
	    <?php if($title != 'login') {?>
		<div class="col-md-2" id="margin">
		    <ul class="nav nav-list">
			<li class="nav-header"><h4>Products Menu</h4></li>
			<li class="active"><a href="<?php echo $products_url ;?>">Home</a></li>
			<li><a href="<?php echo $products_url ;?>/add">Add Products</a></li>
		    </ul>
		</div>
		<div class="col-md-10">
	    <?php }?>
		
		<div>
		    <h3> Products List </3>
		</div>
		<table class="table table-hover" id="margin">
		    <thead>
			<tr>
			    <th>
				<a href="<?php echo site_url('products/index/'.$page.'/id/'.$order); ?>" >
				    Id
				</a>
			    </th>
			    
			    <th>
				<a href="<?php echo site_url('products/index/'.$page.'/product_category_id/'.$order); ?>" >
				    Category Id
				</a>
			    </th>
			    
			    <th>
				<a href="<?php echo site_url('products/index/'.$page.'/title/'.$order); ?>">
				    Title
				</a>
			    </th>
			    
			    <th> 
				Image
			    </th>
			    
			    <th>
				 <a href="<?php echo site_url('products/index/'.$page.'/description/'.$order);  ?>">
				    Description
				</a>
			    </th>
			    
			    <th>
				<a href="<?php echo site_url('products/index/'.$page.'/price/'.$order);  ?>">
				    Price
				</a>
			    </th>
			    
			    <th>
				<a href="<?php echo site_url('products/index/'.$page.'/created_on/'.$order); ?>">
				    Created on
				</a>
			    </th>
			    
			    <th>
				<a href="<?php echo site_url('products/index/'.$page.'/updated_on/'.$order);  ?>">
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
				    <?php echo $result->product_category_id; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" >
				    <?php echo $result->title; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" >
				    <?php $file_exists =''; ?>
				    <?php $file_exists = $result->product_image;?>
				   
				   <?php if( file_exists( UPLOAD_ROOT_PATH.$file_exists )) { ?>
					<img src ="<?php echo UPLOAD_PATH.$file_exists; ?>" class="img-thumbnail" height="100px" width="100px"/ >
				    <?php }else {  ?>
					<img src = "<?php echo UPLOAD_PATH.'default.jpeg' ?>" class="img-thumbnail" height="100px" width="100px" />
				    <?php }?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" > 
				    <?php echo $result->description; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" >
				    <?php echo $result->price; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" >
				    <?php echo $result->created_on; ?>
				</td>
				
				<td class = "<?php echo $gray_class; ?>" >
				    <?php echo $result->updated_on; ?>
				</td>
				
				<td>
				    <a  class="is_enable" href="javascript:void(0);" data-url="<?php echo $products_url;?>/set_is_enable"  data-is_enabled="<?php echo $result->is_enabled;?>"  data-id="<?php echo $result->id; ?>" >
                                 	
					<?php  if($result->is_enabled) { ?>
					    
					    <img src = "<?php echo ASSETS_PATH;?>/images/enable.png"  title="Disable"/>
				      
					<?php }else { ?>
					    
					    <img src = "<?php echo ASSETS_PATH;?>/images/disable.png"  title="Enable"/>
					<?php }?>
					
				    </a>
				</td>
				
				<td class = "<?php echo $gray_class; ?>">
				
				    <a href="<?php echo $products_url;?>/edit/<?php echo $result->id; ?> ">
					<span class="glyphicon glyphicon-pencil" title="Edit"></span>
				    </a>
				    
				    <a  class="delete" href="javascript:void(0);" data-url="<?php echo $products_url;?>/remove"  data-id="<?php echo $result->id; ?>" >
					<span class="glyphicon glyphicon-trash" title="Delete"></span>
				    </a>
				</td>
			    </tr>
			   
			   <?php }?>
			<?php } else { ?>
			    <?php $this->session->set_flashdata('error','no more record found');  ?>
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