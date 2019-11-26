<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Product Edit</h3>
            </div>
            <?php echo form_open('product/edit/' . $product[0]['product_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="oem" class="control-label">Категория</label>
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
                        <select name="category">
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
                            <label for="oem" class="control-label">Подкатегория 2 уровень</label>
                            <select name="category">
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
                        <label for="oem" class="control-label">Oem</label>
                        <div class="form-group">
                            <input type="text" name="oem"
                                   value="<?php echo(service('request')->getVar('oem') ? service('request')->getVar('oem') : $product[0]['oem']); ?>"
                                   class="form-control" id="oem"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_name_ua" class="control-label">Product Name Ua</label>
                        <div class="form-group">
                            <input type="text" name="product_name_ua"
                                   value="<?php echo(service('request')->getVar('product_name_ua') ? service('request')->getVar('product_name_ua') : $product[0]['product_name_ua']); ?>"
                                   class="form-control" id="product_name_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_name_ru" class="control-label">Product Name Ru</label>
                        <div class="form-group">
                            <input type="text" name="product_name_ru"
                                   value="<?php echo(service('request')->getVar('product_name_ru') ? service('request')->getVar('product_name_ru') : $product[0]['product_name_ru']); ?>"
                                   class="form-control" id="product_name_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_key_ua" class="control-label">Product Key Ua</label>
                        <div class="form-group">
                            <input type="text" name="product_key_ua"
                                   value="<?php echo(service('request')->getVar('product_key_ua') ? service('request')->getVar('product_key_ua') : $product[0]['product_key_ua']); ?>"
                                   class="form-control" id="product_key_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_key_ru" class="control-label">Product Key Ru</label>
                        <div class="form-group">
                            <input type="text" name="product_key_ru"
                                   value="<?php echo(service('request')->getVar('product_key_ru') ? service('request')->getVar('product_key_ru') : $product[0]['product_key_ru']); ?>"
                                   class="form-control" id="product_key_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="control-label">Price</label>
                        <div class="form-group">
                            <input type="text" name="price"
                                   value="<?php echo(service('request')->getVar('price') ? service('request')->getVar('price') : $product[0]['price']); ?>"
                                   class="form-control" id="price"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="date_add" class="control-label">Date Add</label>
                        <div class="form-group">
                            <input type="text" name="date_add"
                                   value="<?php echo(service('request')->getVar('date_add') ? service('request')->getVar('date_add') : $product[0]['date_add']); ?>"
                                   class="has-datetimepicker form-control" id="date_add"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="warhouse" class="control-label">Warhouse</label>
                        <div class="form-group">
                            <input type="text" name="warhouse"
                                   value="<?php echo(service('request')->getVar('warhouse') ? service('request')->getVar('warhouse') : $product[0]['warhouse']); ?>"
                                   class="form-control" id="warhouse"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_desc_ua" class="control-label">Product Desc Ua</label>
                        <div class="form-group">
                            <textarea name="product_desc_ua" class="form-control"
                                      id="product_desc_ua"><?php echo(service('request')->getVar('product_desc_ua') ? service('request')->getVar('product_desc_ua') : $product[0]['product_desc_ua']); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="product_desc_ru" class="control-label">Product Desc Ru</label>
                        <div class="form-group">
                            <textarea name="product_desc_ru" class="form-control"
                                      id="product_desc_ru"><?php echo(service('request')->getVar('product_desc_ru') ? service('request')->getVar('product_desc_ru') : $product[0]['product_desc_ru']); ?></textarea>
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