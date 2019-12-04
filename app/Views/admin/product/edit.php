<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Редактирование товара</h3>
            </div>
            <?php echo form_open_multipart('productadmin/edit/' . $product[0]['product_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="cat" class="control-label">Категория</label>
                        <?php
                        //dd($cat);
                        ?>
                        <select name="category">
                            <?php

                            foreach ($menu as $val) {

                                if ($val['parent'] == 0):
                                    $sel = '';
                                    if ($val['id'] == $cat[0][0]['id']):
                                        $sel = 'selected';
                                    endif;
                                    echo '<option value="' . $val['id'] . '" ' . $sel . '>' . $val['name_ru'] . '</option>';
                                endif;
                            }
                            ?>
                        </select><br>
                        <label for="oem" class="control-label">Подкатегория</label>
                        <select name="sub_cat">
                            <?php
                            foreach ($menu as $val) {
                                $sel = '';
                                if ($val['id'] == $cat[1][0]['id']):
                                    $sel = 'selected';
                                endif;
                                echo '<option value="' . $val['id'] . '" ' . $sel . '>' . $val['name_ru'] . '</option>';
                            }
                            ?>
                        </select><br>
                        <?php
                        if (isset($cat[2])) {
                            ?>
                            <label for="sub_sub_cat" class="control-label">Подкатегория 2 уровень</label>
                            <select name="sub_sub_cat">
                                <?php
                                foreach ($menu as $val) {
                                    $sel = '';
                                    if ($val['id'] == $cat[2][0]['id']):
                                        $sel = 'selected';
                                    endif;
                                    echo '<option value="' . $val['id'] . '" ' . $sel . '>' . $val['name_ru'] . '</option>';
                                }
                                ?>
                            </select>
                            <?php
                        }
                        ?>
                        <!--                        <div class="form-group">-->
                        <!--                            <input type="text" name="oem" value="-->
                        <?php //echo (service('request')->getVar('oem') ? service('request')->getVar('oem') : $product[0]['oem']); ?><!--" class="form-control" id="oem" />-->
                        <!--                        </div>-->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                            <img src="<?= $product[0]['img'] ?>" width="60%"><br>
                            <input type="file" name="upload">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="oem" class="control-label">Артикул</label>
                        <div class="form-group">
                            <input type="text" name="oem"
                                   value="<?php echo(service('request')->getVar('oem') ? service('request')->getVar('oem') : $product[0]['oem']); ?>"
                                   class="form-control" id="oem"/>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <label for="product_name_ua" class="control-label">Наименование Ua</label>
                        <div class="form-group">
                            <input type="text" name="product_name_ua"
                                   value="<?php echo(service('request')->getVar('product_name_ua') ? service('request')->getVar('product_name_ua') : $product[0]['product_name_ua']); ?>"
                                   class="form-control" id="product_name_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_name_ru" class="control-label">Наименование Ru</label>
                        <div class="form-group">
                            <input type="text" name="product_name_ru"
                                   value="<?php echo(service('request')->getVar('product_name_ru') ? service('request')->getVar('product_name_ru') : $product[0]['product_name_ru']); ?>"
                                   class="form-control" id="product_name_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_key_ua" class="control-label">Ключевые слова Ua</label>
                        <div class="form-group">
                            <input type="text" name="product_key_ua"
                                   value="<?php echo(service('request')->getVar('product_key_ua') ? service('request')->getVar('product_key_ua') : $product[0]['product_key_ua']); ?>"
                                   class="form-control" id="product_key_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_key_ru" class="control-label">Ключевые слова Ru</label>
                        <div class="form-group">
                            <input type="text" name="product_key_ru"
                                   value="<?php echo(service('request')->getVar('product_key_ru') ? service('request')->getVar('product_key_ru') : $product[0]['product_key_ru']); ?>"
                                   class="form-control" id="product_key_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="control-label">Цена</label>
                        <div class="form-group">
                            <input type="text" name="price"
                                   value="<?php echo(service('request')->getVar('price') ? service('request')->getVar('price') : $product[0]['price']); ?>"
                                   class="form-control" id="price"/>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="warhouse" class="control-label">На складе, шт.</label>
                        <div class="form-group">
                            <input type="text" name="warhouse"
                                   value="<?php echo(service('request')->getVar('warhouse') ? service('request')->getVar('warhouse') : $product[0]['warhouse']); ?>"
                                   class="form-control" id="warhouse"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_desc_ua" class="control-label">Описание Ua</label>
                        <div class="form-group">
                            <textarea name="product_desc_ua" class="form-control"
                                      id="product_desc_ua"><?php echo(service('request')->getVar('product_desc_ua') ? service('request')->getVar('product_desc_ua') : $product[0]['product_desc_ua']); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_desc_ru" class="control-label">Описание Ru</label>
                        <div class="form-group">
                            <textarea name="product_desc_ru" class="form-control"
                                      id="product_desc_ru"><?php echo(service('request')->getVar('product_desc_ru') ? service('request')->getVar('product_desc_ru') : $product[0]['product_desc_ru']); ?></textarea>
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
                        <div class="form-group">
                            <table class="table table-striped">
                                <?php
                                foreach ($product as $item) {

                                    echo "<tr>";
                                    echo "<td>" . $item['name_har_ru'] . "</td><td>
                                    <select name='spec[{$item['id_name_har']}][]'>";

                                    foreach ($spec as $s):
                                        $sel = '';
                                        if ($s['val_feature_ru'] == $item['val_feature_ru']):
                                            $sel = 'selected';
                                        endif;
                                        if ($s['id_name_har'] == $item['id_name_har']):
                                            echo "<option value='" . $s['id'] . "' " . $sel . ">" . $s['val_feature_ru'] . "</option>";
                                        endif;
                                    endforeach;

                                    echo "</select>
                                            <button type='button' class='close' aria-label='Close' style='color: #f50202;'
                                            onclick='del_har_edit(".$item['product_id'].",".$item['id_name_har'].")'>
                                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                            </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>

                        <div class="form-group">
                            <select name="add-spec-name" id="add-spec-name" onchange="sel_spec();">
                                <option >Выбрать наименование х-ки</option>
                                <?php
                                foreach ($spec_sel as $item) {
                                    echo "<option value='{$item['id_name_har']}'>{$item['name_har_ru']}</option>";
                                }
                                ?>
                            </select>
                            <select name="add-spec0" id="add-spec-val" >
                                <option >Выбрать характеристику</option>
                            </select>
                            <input type="button" class="add-spec btn btn-warning" value="Сохранить характеристику">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="date_add" class="control-label">Характеристики UA</label>
                        <div class="form-group">
                            <table class="table table-striped">
                                <input type="hidden" id="pid" name="pid" value="<?= $product[0]['product_id']; ?>">
                                <?php
                                foreach ($product as $item) {

                                    echo "<tr>";
                                    echo "<td>" . $item['name_har_ua'] . "</td><td>
                                    <select name='spec_new'>";
                                    foreach ($spec as $s):
                                        $sel = '';
                                        if ($s['val_feature_ua'] == $item['val_feature_ua']):
                                            $sel = 'selected';
                                        endif;
                                        if ($s['id_name_har'] == $item['id_name_har']):
                                            echo "<option value='" . $s['id_feature'] . "' " . $sel . " disabled>" . $s['val_feature_ua'] . "</option>";
                                        endif;
                                    endforeach;
                                    echo "</select></td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                        <div class="form-group">

                            <p>Характеристики на украинском будут добавлены автоматически в зависимости от выбранных справа</p>

                    </div>
                    <div class="col-md-6">
                        <label for="date_add" class="control-label">Дата добавления</label>
                        <div class="form-group">
                            <?= $product[0]['date_add']; ?>

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
