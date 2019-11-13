<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Product Img Add</h3>
            </div>
            <?php echo form_open('product_img/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="prod_id" class="control-label">Prod Id</label>
						<div class="form-group">
							<input type="text" name="prod_id" value="<?php echo $this->input->post('prod_id'); ?>" class="form-control" id="prod_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="img" class="control-label">Img</label>
						<div class="form-group">
							<input type="text" name="img" value="<?php echo $this->input->post('img'); ?>" class="form-control" id="img" />
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