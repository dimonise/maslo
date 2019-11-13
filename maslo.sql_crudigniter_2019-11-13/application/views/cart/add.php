<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Cart Add</h3>
            </div>
            <?php echo form_open('cart/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_product" class="control-label">Id Product</label>
						<div class="form-group">
							<input type="text" name="id_product" value="<?php echo $this->input->post('id_product'); ?>" class="form-control" id="id_product" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="count_product" class="control-label">Count Product</label>
						<div class="form-group">
							<input type="text" name="count_product" value="<?php echo $this->input->post('count_product'); ?>" class="form-control" id="count_product" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="price" class="control-label">Price</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo $this->input->post('price'); ?>" class="form-control" id="price" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="img" class="control-label">Img</label>
						<div class="form-group">
							<input type="text" name="img" value="<?php echo $this->input->post('img'); ?>" class="form-control" id="img" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user" class="control-label">User</label>
						<div class="form-group">
							<input type="text" name="user" value="<?php echo $this->input->post('user'); ?>" class="form-control" id="user" />
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