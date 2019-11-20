<?php
helper('form');

?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Редактирование Категорий</h3>
            </div>
			<?php echo form_open('category/edit/'.$category[0]['id_cat']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name_cat_ru" class="control-label">Наименование Рус</label>
						<div class="form-group">
							<input type="text" name="name_cat_ru" value="<?php echo (service('request')->getVar('name_cat_ru') ? service('request')->getVar('name_cat_ru') : $category[0]['name_cat_ru']); ?>" class="form-control" id="name_cat_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_cat_ru" class="control-label">Описание Рус</label>
						<div class="form-group">
							<input type="text" name="desc_cat_ru" value="<?php echo (service('request')->getVar('desc_cat_ru') ? service('request')->getVar('desc_cat_ru') : $category[0]['desc_cat_ru']); ?>" class="form-control" id="desc_cat_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_cat_ua" class="control-label">Наименование Укр</label>
						<div class="form-group">
							<input type="text" name="name_cat_ua" value="<?php echo (service('request')->getVar('name_cat_ua') ? service('request')->getVar('name_cat_ua') : $category[0]['name_cat_ua']); ?>" class="form-control" id="name_cat_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_cat_ua" class="control-label">Описание Укр</label>
						<div class="form-group">
							<input type="text" name="desc_cat_ua" value="<?php echo (service('request')->getVar('desc_cat_ua') ? service('request')->getVar('desc_cat_ua') : $category[0]['desc_cat_ua']); ?>" class="form-control" id="desc_cat_ua" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Сохранить
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>