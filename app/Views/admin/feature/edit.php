<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Feature Edit</h3>
            </div>
			<?php echo form_open('feature/edit/'.$feature['id_name_har']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name_har_ua" class="control-label">Name Har Ua</label>
						<div class="form-group">
							<input type="text" name="name_har_ua" value="<?php echo ($this->input->post('name_har_ua') ? $this->input->post('name_har_ua') : $feature['name_har_ua']); ?>" class="form-control" id="name_har_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_har_ru" class="control-label">Name Har Ru</label>
						<div class="form-group">
							<input type="text" name="name_har_ru" value="<?php echo ($this->input->post('name_har_ru') ? $this->input->post('name_har_ru') : $feature['name_har_ru']); ?>" class="form-control" id="name_har_ru" />
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