<?php helper('form'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Редактирование</h3>
            </div>
<?= form_open_multipart('brandadmin/edit/' . $brand[0]['id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="grafic_ua" class="col-md-4 control-label">Название производителя</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo(service('request')->getVar('name') ? service('request')->getVar('name') : $brand[0]['name']); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="grafic_ru" class="col-md-4 control-label">Изображение</label>
                        <div class="form-group">
                            <img src="/img/brand/<?php echo(service('request')->getVar('img') ? service('request')->getVar('img') : $brand[0]['img']); ?>">
                            <input type="file" name="upload">
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
