<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Feature Val Add</h3>
            </div>
            <?php echo form_open('feature_val/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id" class="control-label">ID</label>
						<div class="form-group">
							<input type="text" name="id" value="<?php echo $this->input->post('id'); ?>" class="form-control" id="id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_feature" class="control-label">Id Feature</label>
						<div class="form-group">
							<input type="text" name="id_feature" value="<?php echo $this->input->post('id_feature'); ?>" class="form-control" id="id_feature" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="val_feature_ua" class="control-label">Val Feature Ua</label>
						<div class="form-group">
							<input type="text" name="val_feature_ua" value="<?php echo $this->input->post('val_feature_ua'); ?>" class="form-control" id="val_feature_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="val_feature_ru" class="control-label">Val Feature Ru</label>
						<div class="form-group">
							<input type="text" name="val_feature_ru" value="<?php echo $this->input->post('val_feature_ru'); ?>" class="form-control" id="val_feature_ru" />
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