<?php helper('form'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Добавить слайд</h3>
            </div>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h5>Инструкция по созданию слайда</h5>
                            <img src="/img/instr.png" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_open_multipart('slider/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="img">Изображение слайда</label>
                            <input type="file" name="upload">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="title_ua" class="control-label">Заголовок Ua</label>
                        <div class="form-group">
                            <input type="text" name="title_ua" value="<?php echo service('request')->getVar('title_ua'); ?>" class="form-control" id="title_ua" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="title_ru" class="control-label">Заголовок Ru</label>
                        <div class="form-group">
                            <input type="text" name="title_ru" value="<?php echo service('request')->getVar('title_ru'); ?>" class="form-control" id="title_ru" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="text_ua" class="control-label">Text Ua</label>
                        <div class="form-group">
                            <textarea name="text_ua" class="form-control" id="text_ua"><?php echo service('request')->getVar('text_ua'); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="text_ru" class="control-label">Text Ru</label>
                        <div class="form-group">
                            <textarea name="text_ru" class="form-control" id="text_ru"><?php echo service('request')->getVar('text_ru'); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="button_ua" class="control-label">Текст на кнопке Ua</label>
                        <div class="form-group">
                            <input type="text" name="button_ua" value="<?php echo service('request')->getVar('button_ua'); ?>" class="form-control" id="button_ua" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="button_ru" class="control-label">Текст на кнопке Ru</label>
                        <div class="form-group">
                            <input type="text" name="button_ru" value="<?php echo service('request')->getVar('button_ru'); ?>" class="form-control" id="button_ru" />
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