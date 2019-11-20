<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Cart Edit</h3>
            </div>
			<?php echo form_open('cart/edit/'.$cart[0]['id_cart']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_product" class="control-label">Id Product</label>
						<div class="form-group">
							<input type="text" name="id_product" value="<?php echo (service('request')->getVar('id_product') ? service('request')->getVar('id_product') : $cart[0]['id_product']); ?>" class="form-control" id="id_product" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="count_product" class="control-label">Count Product</label>
						<div class="form-group">
							<input type="text" name="count_product" value="<?php echo (service('request')->getVar('count_product') ? service('request')->getVar('count_product') : $cart[0]['count_product']); ?>" class="form-control" id="count_product" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="price" class="control-label">Price</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo (service('request')->getVar('price') ? service('request')->getVar('price') : $cart[0]['price']); ?>" class="form-control" id="price" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="img" class="control-label">Img</label>
						<div class="form-group">
							<input type="text" name="img" value="<?php echo (service('request')->getVar('img') ? service('request')->getVar('img') : $cart[0]['img']); ?>" class="form-control" id="img" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user" class="control-label">User</label>
						<div class="form-group">
							<input type="text" name="user" value="<?php echo (service('request')->getVar('user') ? service('request')->getVar('user') : $cart[0]['user']); ?>" class="form-control" id="user" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>