<?php helper('form'); ?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Slider Edit</h3>
            </div>
			<?php 
                       
                        echo form_open_multipart('slider/edit/'.$slider[0]['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-12">
						<div class="form-group">

                            <img src="<?= $slider[0]['slider'] ?>" width="30%"><br>
                            <input type="file" name="upload">
                        </div>
					</div>
					<div class="col-md-6">
						<label for="title_ua" class="control-label">Title Ua</label>
						<div class="form-group">
							<input type="text" name="title_ua" value="<?php echo (service('request')->getVar('title_ua') ? service('request')->getVar('title_ua') : $slider[0]['title_ua']); ?>" class="form-control" id="title_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title_ru" class="control-label">Title Ru</label>
						<div class="form-group">
							<input type="text" name="title_ru" value="<?php echo (service('request')->getVar('title_ru') ? service('request')->getVar('title_ru') : $slider[0]['title_ru']); ?>" class="form-control" id="title_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="button_ua" class="control-label">Button Ua</label>
						<div class="form-group">
							<input type="text" name="button_ua" value="<?php echo (service('request')->getVar('button_ua') ? service('request')->getVar('button_ua') : $slider[0]['button_ua']); ?>" class="form-control" id="button_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="button_ru" class="control-label">Button Ru</label>
						<div class="form-group">
							<input type="text" name="button_ru" value="<?php echo (service('request')->getVar('button_ru') ? service('request')->getVar('button_ru') : $slider[0]['button_ru']); ?>" class="form-control" id="button_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="text_ua" class="control-label">Text Ua</label>
						<div class="form-group">
							<textarea name="text_ua" class="form-control" id="text_ua"><?php echo (service('request')->getVar('text_ua') ? service('request')->getVar('text_ua') : $slider[0]['text_ua']); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="text_ru" class="control-label">Text Ru</label>
						<div class="form-group">
							<textarea name="text_ru" class="form-control" id="text_ru"><?php echo (service('request')->getVar('text_ru') ? service('request')->getVar('text_ru') : $slider[0]['text_ru']); ?></textarea>
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
