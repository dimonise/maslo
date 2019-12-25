<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Order Add</h3>
            </div>
            <?php echo form_open('order/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_order" class="control-label">Id Order</label>
						<div class="form-group">
							<input type="text" name="id_order" value="<?php echo $this->input->post('id_order'); ?>" class="form-control" id="id_order" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_user" class="control-label">Id User</label>
						<div class="form-group">
							<input type="text" name="id_user" value="<?php echo $this->input->post('id_user'); ?>" class="form-control" id="id_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_user" class="control-label">Name User</label>
						<div class="form-group">
							<input type="text" name="name_user" value="<?php echo $this->input->post('name_user'); ?>" class="form-control" id="name_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date" class="control-label">Date</label>
						<div class="form-group">
							<input type="text" name="date" value="<?php echo $this->input->post('date'); ?>" class="has-datetimepicker form-control" id="date" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label">Address</label>
						<div class="form-group">
							<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status_ua" class="control-label">Status Ua</label>
						<div class="form-group">
							<input type="text" name="status_ua" value="<?php echo $this->input->post('status_ua'); ?>" class="form-control" id="status_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status_ru" class="control-label">Status Ru</label>
						<div class="form-group">
							<input type="text" name="status_ru" value="<?php echo $this->input->post('status_ru'); ?>" class="form-control" id="status_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="product" class="control-label">Product</label>
						<div class="form-group">
							<textarea name="product" class="form-control" id="product"><?php echo $this->input->post('product'); ?></textarea>
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