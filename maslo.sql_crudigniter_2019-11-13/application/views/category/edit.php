<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Category Edit</h3>
            </div>
			<?php echo form_open('category/edit/'.$category['id_cat']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name_cat_ru" class="control-label">Name Cat Ru</label>
						<div class="form-group">
							<input type="text" name="name_cat_ru" value="<?php echo ($this->input->post('name_cat_ru') ? $this->input->post('name_cat_ru') : $category['name_cat_ru']); ?>" class="form-control" id="name_cat_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_cat_ru" class="control-label">Desc Cat Ru</label>
						<div class="form-group">
							<input type="text" name="desc_cat_ru" value="<?php echo ($this->input->post('desc_cat_ru') ? $this->input->post('desc_cat_ru') : $category['desc_cat_ru']); ?>" class="form-control" id="desc_cat_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_cat_ua" class="control-label">Name Cat Ua</label>
						<div class="form-group">
							<input type="text" name="name_cat_ua" value="<?php echo ($this->input->post('name_cat_ua') ? $this->input->post('name_cat_ua') : $category['name_cat_ua']); ?>" class="form-control" id="name_cat_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_cat_ua" class="control-label">Desc Cat Ua</label>
						<div class="form-group">
							<input type="text" name="desc_cat_ua" value="<?php echo ($this->input->post('desc_cat_ua') ? $this->input->post('desc_cat_ua') : $category['desc_cat_ua']); ?>" class="form-control" id="desc_cat_ua" />
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