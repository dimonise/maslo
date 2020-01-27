<?php helper('form'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Редактирование</h3>
            </div>
<?= form_open('contactadmin/edit/' . $contact[0]['id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">

                        <label for="grafic_ua" class="col-md-4 control-label">График работы Ua</label>
                        <div class="form-group">
                            <textarea name="grafic_ua" id="grafic_ua">
                                   <?php echo(service('request')->getVar('grafic_ua') ? service('request')->getVar('grafic_ua') : $contact[0]['grafic_ua']); ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="grafic_ru" class="col-md-4 control-label">График работы Ru</label>
                        <div class="form-group">
                            <textarea name="grafic_ru" id="grafic_ru">
                                   <?php echo(service('request')->getVar('grafic_ru') ? service('request')->getVar('grafic_ru') : $contact[0]['grafic_ru']); ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="address_ua" class="col-md-4 control-label">Адрес Ua</label>
                        <div class="form-group">
                            <textarea name="address_ua" id="address_ua">
                                   <?php echo(service('request')->getVar('address_ua') ? service('request')->getVar('address_ua') : $contact[0]['address_ua']); ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="address_ru" class="col-md-4 control-label">Адрес  Ru</label>
                        <div class="form-group">
                            <textarea name="address_ru" id="address_ru">
                                   <?php echo(service('request')->getVar('address_ru') ? service('request')->getVar('address_ru') : $contact[0]['address_ru']); ?>
                            </textarea>
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
    CKEDITOR.replace('grafic_ua');
    CKEDITOR.replace('grafic_ru');
    CKEDITOR.replace('address_ru');
    CKEDITOR.replace('address_ua');

</script>