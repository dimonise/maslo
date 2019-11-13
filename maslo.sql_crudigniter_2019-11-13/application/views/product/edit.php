<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Product Edit</h3>
            </div>
			<?php echo form_open('product/edit/'.$product['product_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="oem" class="control-label">Oem</label>
						<div class="form-group">
							<input type="text" name="oem" value="<?php echo ($this->input->post('oem') ? $this->input->post('oem') : $product['oem']); ?>" class="form-control" id="oem" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="product_name_ua" class="control-label">Product Name Ua</label>
						<div class="form-group">
							<input type="text" name="product_name_ua" value="<?php echo ($this->input->post('product_name_ua') ? $this->input->post('product_name_ua') : $product['product_name_ua']); ?>" class="form-control" id="product_name_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="product_name_ru" class="control-label">Product Name Ru</label>
						<div class="form-group">
							<input type="text" name="product_name_ru" value="<?php echo ($this->input->post('product_name_ru') ? $this->input->post('product_name_ru') : $product['product_name_ru']); ?>" class="form-control" id="product_name_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="product_key_ua" class="control-label">Product Key Ua</label>
						<div class="form-group">
							<input type="text" name="product_key_ua" value="<?php echo ($this->input->post('product_key_ua') ? $this->input->post('product_key_ua') : $product['product_key_ua']); ?>" class="form-control" id="product_key_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="product_key_ru" class="control-label">Product Key Ru</label>
						<div class="form-group">
							<input type="text" name="product_key_ru" value="<?php echo ($this->input->post('product_key_ru') ? $this->input->post('product_key_ru') : $product['product_key_ru']); ?>" class="form-control" id="product_key_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="price" class="control-label">Price</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $product['price']); ?>" class="form-control" id="price" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_add" class="control-label">Date Add</label>
						<div class="form-group">
							<input type="text" name="date_add" value="<?php echo ($this->input->post('date_add') ? $this->input->post('date_add') : $product['date_add']); ?>" class="has-datetimepicker form-control" id="date_add" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="warhouse" class="control-label">Warhouse</label>
						<div class="form-group">
							<input type="text" name="warhouse" value="<?php echo ($this->input->post('warhouse') ? $this->input->post('warhouse') : $product['warhouse']); ?>" class="form-control" id="warhouse" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="product_desc_ua" class="control-label">Product Desc Ua</label>
						<div class="form-group">
							<textarea name="product_desc_ua" class="form-control" id="product_desc_ua"><?php echo ($this->input->post('product_desc_ua') ? $this->input->post('product_desc_ua') : $product['product_desc_ua']); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="product_desc_ru" class="control-label">Product Desc Ru</label>
						<div class="form-group">
							<textarea name="product_desc_ru" class="form-control" id="product_desc_ru"><?php echo ($this->input->post('product_desc_ru') ? $this->input->post('product_desc_ru') : $product['product_desc_ru']); ?></textarea>
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