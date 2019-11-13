<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Product Feature Val Edit</h3>
            </div>
			<?php echo form_open('product_feature_val/edit/'.$product_feature_val['idd']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_product" class="control-label">Id Product</label>
						<div class="form-group">
							<input type="text" name="id_product" value="<?php echo ($this->input->post('id_product') ? $this->input->post('id_product') : $product_feature_val['id_product']); ?>" class="form-control" id="id_product" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_feature" class="control-label">Id Feature</label>
						<div class="form-group">
							<input type="text" name="id_feature" value="<?php echo ($this->input->post('id_feature') ? $this->input->post('id_feature') : $product_feature_val['id_feature']); ?>" class="form-control" id="id_feature" />
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