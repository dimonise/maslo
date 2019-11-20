<?php
helper('form');

?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Sub Cat Add</h3>
            </div>
            <?php echo form_open('sub_cat/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="id_cat" class="control-label">Category</label>
                        <div class="form-group">
                            <select name="id_cat" class="form-control">
                                <option value="">select category</option>
                                <?php
                                foreach($all_category as $category)
                                {
                                    $selected = ($category['id_cat'] == service('request')->getVar('id_cat')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$category['id_cat'].'" '.$selected.'>'.$category['name_cat_ru'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sub_name_ua" class="control-label">Sub Name Ua</label>
                        <div class="form-group">
                            <input type="text" name="sub_name_ua" value="<?php echo service('request')->getVar('sub_name_ua'); ?>" class="form-control" id="sub_name_ua" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sub_name_ru" class="control-label">Sub Name Ru</label>
                        <div class="form-group">
                            <input type="text" name="sub_name_ru" value="<?php echo service('request')->getVar('sub_name_ru'); ?>" class="form-control" id="sub_name_ru" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sub_key_ua" class="control-label">Sub Key Ua</label>
                        <div class="form-group">
                            <input type="text" name="sub_key_ua" value="<?php echo service('request')->getVar('sub_key_ua'); ?>" class="form-control" id="sub_key_ua" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sub_key_ru" class="control-label">Sub Key Ru</label>
                        <div class="form-group">
                            <input type="text" name="sub_key_ru" value="<?php echo service('request')->getVar('sub_key_ru'); ?>" class="form-control" id="sub_key_ru" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sub_desc_ua" class="control-label">Sub Desc Ua</label>
                        <div class="form-group">
                            <input type="text" name="sub_desc_ua" value="<?php echo service('request')->getVar('sub_desc_ua'); ?>" class="form-control" id="sub_desc_ua" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sub_desc_ru" class="control-label">Sub Desc Ru</label>
                        <div class="form-group">
                            <input type="text" name="sub_desc_ru" value="<?php echo service('request')->getVar('sub_desc_ru'); ?>" class="form-control" id="sub_desc_ru" />
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