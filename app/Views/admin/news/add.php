<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">News Add</h3>
            </div>
            <?php echo form_open_multipart('newsadmin/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="keywords_news_ua" class="control-label">Ключевые слова Ua</label>
						<div class="form-group">
							<input type="text" name="keywords_news_ua" value="<?php echo service('request')->getVar('keywords_news_ua'); ?>" class="form-control" id="keywords_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="keywords_news_ru" class="control-label">Ключевые слова Ru</label>
						<div class="form-group">
							<input type="text" name="keywords_news_ru" value="<?php echo service('request')->getVar('keywords_news_ru'); ?>" class="form-control" id="keywords_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description_news_ua" class="control-label">Описание Ua</label>
						<div class="form-group">
							<input type="text" name="description_news_ua" value="<?php echo service('request')->getVar('description_news_ua'); ?>" class="form-control" id="description_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description_news_ru" class="control-label">Описание Ru</label>
						<div class="form-group">
							<input type="text" name="description_news_ru" value="<?php echo service('request')->getVar('description_news_ru'); ?>" class="form-control" id="description_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title_news_ua" class="control-label">Заголовок Ua</label>
						<div class="form-group">
							<input type="text" name="title_news_ua" value="<?php echo service('request')->getVar('title_news_ua'); ?>" class="form-control" id="title_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title_news_ru" class="control-label">Заголовок Ru</label>
						<div class="form-group">
							<input type="text" name="title_news_ru" value="<?php echo service('request')->getVar('title_news_ru'); ?>" class="form-control" id="title_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="text_news_ua" class="control-label">Текст новости Ua</label>
						<div class="form-group">
							<textarea name="text_news_ua" class="form-control" id="text_news_ua"><?php echo service('request')->getVar('text_news_ua'); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="text_news_ru" class="control-label">Текст новости News Ru</label>
						<div class="form-group">
							<textarea name="text_news_ru" class="form-control" id="text_news_ru"><?php echo service('request')->getVar('text_news_ru'); ?></textarea>
						</div>
					</div>
                    <div class="col-md-6">
                        <label for="img_news" class="control-label">Изображение</label>
                        <div class="form-group">
                            <input type="file" name="upload">
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