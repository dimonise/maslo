<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Редактирование новости</h3>
                <h5 style="color:red">Все поля обязательны к заполнению</h5>
            </div>

			<?php echo form_open_multipart('newsadmin/edit/'.$news[0]['id_news']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="keywords_news_ua" class="control-label">Ключевые слова Ua</label>
						<div class="form-group">
							<input type="text" required  name="keywords_news_ua" value="<?php echo (service('request')->getVar('keywords_news_ua') ? service('request')->getVar('keywords_news_ua') : $news[0]['keywords_news_ua']); ?>" class="form-control" id="keywords_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="keywords_news_ru" class="control-label">Ключевые слова Ru</label>
						<div class="form-group">
							<input type="text" required  name="keywords_news_ru" value="<?php echo (service('request')->getVar('keywords_news_ru') ? service('request')->getVar('keywords_news_ru') : $news[0]['keywords_news_ru']); ?>" class="form-control" id="keywords_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description_news_ua" class="control-label">Описание Ua</label>
						<div class="form-group">
							<input type="text" required  name="description_news_ua" value="<?php echo (service('request')->getVar('description_news_ua') ? service('request')->getVar('description_news_ua') : $news[0]['description_news_ua']); ?>" class="form-control" id="description_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description_news_ru" class="control-label">Описание Ru</label>
						<div class="form-group">
							<input type="text" required  name="description_news_ru" value="<?php echo (service('request')->getVar('description_news_ru') ? service('request')->getVar('description_news_ru') : $news[0]['description_news_ru']); ?>" class="form-control" id="description_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title_news_ua" class="control-label">Заголовок Ua</label>
						<div class="form-group">
							<input type="text" required  name="title_news_ua" value="<?php echo (service('request')->getVar('title_news_ua') ? service('request')->getVar('title_news_ua') : $news[0]['title_news_ua']); ?>" class="form-control" id="title_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title_news_ru" class="control-label">Заголовок Ru</label>
						<div class="form-group">
							<input type="text" required  name="title_news_ru" value="<?php echo (service('request')->getVar('title_news_ru') ? service('request')->getVar('title_news_ru') : $news[0]['title_news_ru']); ?>" class="form-control" id="title_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="img_news" class="control-label">Изображение</label>
						<div class="form-group">
                            <img src="<?= $news[0]['img_news'] ?>" width="10%"><br>
                            <input type="file" name="upload">

						</div>
					</div>
					<div class="col-md-6">
						<label for="data" class="control-label">Дата публикации</label>
						<div class="form-group">
							<input type="text" required   readonly value="<?php echo $news[0]['data']; ?>" class="form-control" id="data" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="text_news_ua" class="control-label">Текст новости UA</label>
						<div class="form-group">
							<textarea name="text_news_ua" class="form-control" id="text_news_ua"><?php echo (service('request')->getVar('text_news_ua') ? service('request')->getVar('text_news_ua') : $news[0]['text_news_ua']); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="text_news_ru" class="control-label">Текст новости Ru</label>
						<div class="form-group">
							<textarea name="text_news_ru" class="form-control" id="text_news_ru"><?php echo (service('request')->getVar('text_news_ru') ? service('request')->getVar('text_news_ru') : $news[0]['text_news_ru']); ?></textarea>
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
<script>
    CKEDITOR.replace( 'text_news_ua', {
        extraPlugins: 'easyimage',
        removePlugins: 'image',
    } );
    CKEDITOR.replace( 'text_news_ru', {
        extraPlugins: 'easyimage',
        removePlugins: 'image',
    } );
</script>