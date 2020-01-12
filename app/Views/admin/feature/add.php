<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Новая характеристика товара</h3>
            </div>
            <?php echo form_open('feature/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="name_har_ua" class="control-label">Наименование Ua</label>
                        <div class="form-group">
                            <input type="text" name="name_har_ua"
                                   value="<?php echo service('request')->getVar('name_har_ua'); ?>" class="form-control"
                                   id="name_har_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="name_har_ru" class="control-label">Наименование Ru</label>
                        <div class="form-group">
                            <input type="text" name="name_har_ru"
                                   value="<?php echo service('request')->getVar('name_har_ru'); ?>" class="form-control"
                                   id="name_har_ru"/>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-6">
                <label for="name_har_ua" class="control-label">Привязка к категории (для фильтров)</label>
                <div class="form-group">
                    <select name="link_cat" class="form-control">
                    <?php
                    echo "<option value='0'>Общая категория (будет отображаться во всех категориях товара)</option>";
                    foreach($cats as $item){
                        if($item['id'] == $feature[0]['groupa']){
                            $sel = 'selected';
                        }
                        else{
                            $sel = '';
                        }
                        echo "<option value='$item[id]' $sel>$item[name_ru]</option>";
                    }
                    ?>
                    </select>
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
                <div class="row clearfix val-new" style="margin: 10px 0px !important;">
                    <div class="col-md-6">
                        <input type="text" name="val_har_ua[]" value="" class="form-control" id=""/>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="val_har_ru[]" value="" class="form-control" id=""/>
                    </div>

                </div>
                <div class="row clearfix" style="margin: 10px 0px !important;">
                    <div class="col-md-12" >
                        <input type="button" value="Добавить значение" id="add-val-field" class="btn btn-info">
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