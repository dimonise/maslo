<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Sub Sub Cat Edit</h3>
            </div>
			<?php echo form_open('sub_sub_cat/edit/'.$sub_sub_cat['id_sub_sub']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_sub" class="control-label">Id Sub</label>
						<div class="form-group">
							<input type="text" name="id_sub" value="<?php echo ($this->input->post('id_sub') ? $this->input->post('id_sub') : $sub_sub_cat['id_sub']); ?>" class="form-control" id="id_sub" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_sub_sub_ua" class="control-label">Name Sub Sub Ua</label>
						<div class="form-group">
							<input type="text" name="name_sub_sub_ua" value="<?php echo ($this->input->post('name_sub_sub_ua') ? $this->input->post('name_sub_sub_ua') : $sub_sub_cat['name_sub_sub_ua']); ?>" class="form-control" id="name_sub_sub_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_sub_sub_ru" class="control-label">Name Sub Sub Ru</label>
						<div class="form-group">
							<input type="text" name="name_sub_sub_ru" value="<?php echo ($this->input->post('name_sub_sub_ru') ? $this->input->post('name_sub_sub_ru') : $sub_sub_cat['name_sub_sub_ru']); ?>" class="form-control" id="name_sub_sub_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="key_sub_sub_ua" class="control-label">Key Sub Sub Ua</label>
						<div class="form-group">
							<input type="text" name="key_sub_sub_ua" value="<?php echo ($this->input->post('key_sub_sub_ua') ? $this->input->post('key_sub_sub_ua') : $sub_sub_cat['key_sub_sub_ua']); ?>" class="form-control" id="key_sub_sub_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="key_sub_sub_ru" class="control-label">Key Sub Sub Ru</label>
						<div class="form-group">
							<input type="text" name="key_sub_sub_ru" value="<?php echo ($this->input->post('key_sub_sub_ru') ? $this->input->post('key_sub_sub_ru') : $sub_sub_cat['key_sub_sub_ru']); ?>" class="form-control" id="key_sub_sub_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_sub_sub_ua" class="control-label">Desc Sub Sub Ua</label>
						<div class="form-group">
							<input type="text" name="desc_sub_sub_ua" value="<?php echo ($this->input->post('desc_sub_sub_ua') ? $this->input->post('desc_sub_sub_ua') : $sub_sub_cat['desc_sub_sub_ua']); ?>" class="form-control" id="desc_sub_sub_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_sub_sub_ru" class="control-label">Desc Sub Sub Ru</label>
						<div class="form-group">
							<input type="text" name="desc_sub_sub_ru" value="<?php echo ($this->input->post('desc_sub_sub_ru') ? $this->input->post('desc_sub_sub_ru') : $sub_sub_cat['desc_sub_sub_ru']); ?>" class="form-control" id="desc_sub_sub_ru" />
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