<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Новый товар</h3>
                <h5 style="color:red">Все поля обязательны к заполнению</h5>
            </div>
            <?php echo form_open_multipart('productadmin/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="cat" class="control-label">Категория</label>
                        <?php
                        //dd($cat);
                        ?>
                        <select name="category" id="category" onchange="to_sub_cat()">

                            <option>Выбрать категорию</option>
                            <?php
                            foreach ($menu as $val) {
                                if ($val['parent'] == 0):
                                    echo '<option value="' . $val['id'] . '">' . $val['name_ru'] . '</option>';
                                endif;
                            }
                            ?>
                        </select><br>
                        <label for="oem" class="control-label">Подкатегория</label>
                        <select name="sub_cat" id="sub_cat" onchange="to_sub_sub_cat()">

                        </select><br>

                        <label for="sub_sub_cat" class="control-label">Подкатегория 2 уровень</label>
                        <select name="sub_sub_cat" id="sub_sub_cat">

                        </select>

                        <br>
                        <input type="checkbox" value="1" name="rekomm" > <label>Добавить в рекомендованные</label>
                        <br>
                        <input type="checkbox" value="1" name="akcii" > <label>Добавить в акционные</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="img">Изображение</label>
                            <input type="file" name="upload">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="oem" class="control-label">Артикул</label>
                        <div class="form-group">
                            <input type="text" name="oem" value="<?php echo service('request')->getVar('oem'); ?>"
                                   class="form-control" id="oem"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_name_ua" class="control-label">Наименование Ua</label>
                        <div class="form-group">
                            <input type="text" name="product_name_ua"
                                   value="<?php echo service('request')->getVar('product_name_ua'); ?>"
                                   class="form-control" id="product_name_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_name_ru" class="control-label">Наименование Ru</label>
                        <div class="form-group">
                            <input type="text" name="product_name_ru"
                                   value="<?php echo service('request')->getVar('product_name_ru'); ?>"
                                   class="form-control" id="product_name_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_key_ua" class="control-label">Ключевые слова Ua</label>
                        <div class="form-group">
                            <input type="text" name="product_key_ua"
                                   value="<?php echo service('request')->getVar('product_key_ua'); ?>"
                                   class="form-control" id="product_key_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_key_ru" class="control-label">Ключевые слова Ru</label>
                        <div class="form-group">
                            <input type="text" name="product_key_ru"
                                   value="<?php echo service('request')->getVar('product_key_ru'); ?>"
                                   class="form-control" id="product_key_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="control-label">Цена</label>
                        <div class="form-group">
                            <input type="text" name="price" value="<?php echo service('request')->getVar('price'); ?>"
                                   class="form-control" id="price"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="warhouse" class="control-label">На складе, шт.</label>
                        <div class="form-group">
                            <input type="text" name="warhouse"
                                   value="<?php echo service('request')->getVar('warhouse'); ?>" class="form-control"
                                   id="warhouse"/>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <label for="product_desc_ua" class="control-label">Описание Ua</label>
                        <div class="form-group">
                            <textarea name="product_desc_ua" class="form-control"
                                      id="product_desc_ua"><?php echo service('request')->getVar('product_desc_ua'); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_desc_ru" class="control-label">Описание Ru</label>
                        <div class="form-group">
                            <textarea name="product_desc_ru" class="form-control"
                                      id="product_desc_ru"><?php echo service('request')->getVar('product_desc_ru'); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label style="width: 100%;background-color: #dbdd88;font-weight: 700;text-align: center">Характеристики
                                товара (будут использоваться в фильтрах)</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="date_add" class="control-label">Характеристики RU</label>

                        <div class="form-group specifications">
                            <select name="add-spec-name[]" id="add-spec-name" class="cats" onchange="sel_spec();">
                                <option>Выбрать наименование х-ки</option>
                                <?php
                                foreach ($spec_sel as $item) {
                                    echo "<option value='{$item['id_name_har']}'>{$item['name_har_ru']}</option>";
                                }
                                ?>
                            </select>
                            <select name="add-spec[]" id="add-spec-val">
                                <option>Выбрать характеристику</option>
                            </select><br>

                        </div>
                        <div class="button">
                            <input type="button" value="+ Еще характеристика" id="add-har" class="btn btn-info">
                        </div>
                        <br>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">

                            <p>Характеристики на украинском будут добавлены автоматически в зависимости от выбранных
                                справа</p>

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