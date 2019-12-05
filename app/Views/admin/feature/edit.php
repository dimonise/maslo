<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Редактирование характеристики</h3>
            </div>
			<?php echo form_open('feature/edit/'.$feature[0]['id_name_har']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name_har_ua" class="control-label">Наименование Ua</label>
						<div class="form-group">
							<input type="text" name="name_har_ua" value="<?php echo (service('request')->getVar('name_har_ua') ? service('request')->getVar('name_har_ua') : $feature[0]['name_har_ua']); ?>" class="form-control" id="name_har_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_har_ru" class="control-label">Наименование Ru</label>
						<div class="form-group">
							<input type="text" name="name_har_ru" value="<?php echo (service('request')->getVar('name_har_ru') ? service('request')->getVar('name_har_ru') : $feature[0]['name_har_ru']); ?>" class="form-control" id="name_har_ru" />
						</div>
					</div>
				</div>
			</div>
            <hr>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <h6>Значения данной характеристики</h6>
                    </div>
                    <div class="col-md-6">
                        <span>UA</span>
                    </div>
                    <div class="col-md-6">
                        <h6>RU</h6>
                    </div>
                </div>
                <div class="row clearfix">
                <?php
                foreach($feature_val as $val){
                   echo '<div class="col-md-6">
                        <input type="text" name="val_har_ua" value="'.$val['val_feature_ua'].'" class="form-control" readonly />
                        <button type="button" class="close" style="position: absolute;top: 0;left:99%;color:#f50202" aria-label="Close" 
                                            onclick="del_val_edit('.$val['id'].')">
                                                            <span aria-hidden="true">&times;</span></button>
                    </div>';
                   echo '<div class="col-md-6">
                        <input type="text" name="val_har_ru" value="'.$val['val_feature_ru'].'" class="form-control" readonly />
                        
                                            
                    </div>';
                }
                ?>
                </div>
            </div>
            <div class="row clearfix" style="margin: 5px 0px !important;">
                <div class="col-md-6">
                    <input type="text" value="" name="val_ua" id="val_ua" placeholder="UA">
                    <input type="text" value="" name="val_ru" id="val_ru" placeholder="RU">
                    <input type="hidden" value="<?= $feature[0]['id_name_har'];?>" name="id" id="id" placeholder="RU">
                    <input type="button" value="Сохранить значение" id="add-val" class="btn btn-warning">
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