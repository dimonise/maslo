<?php helper('form'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Редактирование</h3>
            </div>
<?= form_open('staticadmin/edit/' . $static[0]['id_stat']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">

                        <label for="keywords_stat_ua" class="col-md-4 control-label">Keywords Stat Ua</label>
                        <div class="form-group">
                            <input type="text" name="keywords_stat_ua"
                                   value="<?php echo(service('request')->getVar('keywords_stat_ua') ? service('request')->getVar('keywords_stat_ua') : $static[0]['keywords_stat_ua']); ?>"
                                   class="form-control" id="keywords_stat_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="keywords_stat_ru" class="col-md-4 control-label">Keywords  Ru</label>
                        <div class="form-group">
                            <input type="text" name="keywords_stat_ru"
                                   value="<?php echo(service('request')->getVar('keywords_stat_ru') ? service('request')->getVar('keywords_stat_ru') : $static[0]['keywords_stat_ru']); ?>"
                                   class="form-control" id="keywords_stat_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="description_stat_ua" class="col-md-4 control-label">Description  Ua</label>
                        <div class="form-group">
                            <input type="text" name="description_stat_ua"
                                   value="<?php echo(service('request')->getVar('description_stat_ua') ? service('request')->getVar('description_stat_ua') : $static[0]['description_stat_ua']); ?>"
                                   class="form-control" id="description_stat_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="description_stat_ru" class="col-md-4 control-label">Description  Ru</label>
                        <div class="form-group">
                            <input type="text" name="description_stat_ru"
                                   value="<?php echo(service('request')->getVar('description_stat_ru') ? service('request')->getVar('description_stat_ru') : $static[0]['description_stat_ru']); ?>"
                                   class="form-control" id="description_stat_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="title_stat_ua" class="col-md-4 control-label"><span class="text-danger">*</span>Название страницы Ua</label>
                        <div class="form-group">
                            <input type="text" name="title_stat_ua"
                                   value="<?php echo(service('request')->getVar('title_stat_ua') ? service('request')->getVar('title_stat_ua') : $static[0]['title_stat_ua']); ?>"
                                   class="form-control" id="title_stat_ua"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="title_stat_ru" class="col-md-4 control-label"><span class="text-danger">*</span>Название страницы Ru</label>
                        <div class="form-group">
                            <input type="text" name="title_stat_ru"
                                   value="<?php echo(service('request')->getVar('title_stat_ru') ? service('request')->getVar('title_stat_ru') : $static[0]['title_stat_ru']); ?>"
                                   class="form-control" id="title_stat_ru"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="text_stat_ua" class="col-md-4 control-label"><span class="text-danger">*</span>Содержимое страницы Ua</label>
                        <div class="form-group">
                            <textarea name="text_stat_ua" id="text_stat_ua" class="form-control"
                                      id="text_stat_ua"><?php echo(service('request')->getVar('text_stat_ua') ? service('request')->getVar('text_stat_ua') : $static[0]['text_stat_ua']); ?></textarea>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="text_stat_ru" class="col-md-4 control-label"><span class="text-danger">*</span>Содержимое страницы Ru</label>
                        <div class="form-group">
                            <textarea name="text_stat_ru" id="text_stat_ru" class="form-control"
                                      id="text_stat_ru"><?php echo(service('request')->getVar('text_stat_ru') ? service('request')->getVar('text_stat_ru') : $static[0]['text_stat_ru']); ?></textarea>

                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-8">
                        <div class="form-group">

                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
<?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('text_stat_ua');
    CKEDITOR.replace('text_stat_ru');

</script>