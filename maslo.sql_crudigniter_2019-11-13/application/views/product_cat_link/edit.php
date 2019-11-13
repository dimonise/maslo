<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Product Cat Link Edit</h3>
            </div>
			<?php echo form_open('product_cat_link/edit/'.$product_cat_link['id_link']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_prod" class="control-label">Id Prod</label>
						<div class="form-group">
							<input type="text" name="id_prod" value="<?php echo ($this->input->post('id_prod') ? $this->input->post('id_prod') : $product_cat_link['id_prod']); ?>" class="form-control" id="id_prod" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_cat" class="control-label">Id Cat</label>
						<div class="form-group">
							<input type="text" name="id_cat" value="<?php echo ($this->input->post('id_cat') ? $this->input->post('id_cat') : $product_cat_link['id_cat']); ?>" class="form-control" id="id_cat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_sub_cat" class="control-label">Id Sub Cat</label>
						<div class="form-group">
							<input type="text" name="id_sub_cat" value="<?php echo ($this->input->post('id_sub_cat') ? $this->input->post('id_sub_cat') : $product_cat_link['id_sub_cat']); ?>" class="form-control" id="id_sub_cat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_sub_sub_cat" class="control-label">Id Sub Sub Cat</label>
						<div class="form-group">
							<input type="text" name="id_sub_sub_cat" value="<?php echo ($this->input->post('id_sub_sub_cat') ? $this->input->post('id_sub_sub_cat') : $product_cat_link['id_sub_sub_cat']); ?>" class="form-control" id="id_sub_sub_cat" />
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