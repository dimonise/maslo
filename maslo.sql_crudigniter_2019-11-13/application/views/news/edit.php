<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">News Edit</h3>
            </div>
			<?php echo form_open('news/edit/'.$news['id_news']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="keywords_news_ua" class="control-label">Keywords News Ua</label>
						<div class="form-group">
							<input type="text" name="keywords_news_ua" value="<?php echo ($this->input->post('keywords_news_ua') ? $this->input->post('keywords_news_ua') : $news['keywords_news_ua']); ?>" class="form-control" id="keywords_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="keywords_news_ru" class="control-label">Keywords News Ru</label>
						<div class="form-group">
							<input type="text" name="keywords_news_ru" value="<?php echo ($this->input->post('keywords_news_ru') ? $this->input->post('keywords_news_ru') : $news['keywords_news_ru']); ?>" class="form-control" id="keywords_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description_news_ua" class="control-label">Description News Ua</label>
						<div class="form-group">
							<input type="text" name="description_news_ua" value="<?php echo ($this->input->post('description_news_ua') ? $this->input->post('description_news_ua') : $news['description_news_ua']); ?>" class="form-control" id="description_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description_news_ru" class="control-label">Description News Ru</label>
						<div class="form-group">
							<input type="text" name="description_news_ru" value="<?php echo ($this->input->post('description_news_ru') ? $this->input->post('description_news_ru') : $news['description_news_ru']); ?>" class="form-control" id="description_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title_news_ua" class="control-label">Title News Ua</label>
						<div class="form-group">
							<input type="text" name="title_news_ua" value="<?php echo ($this->input->post('title_news_ua') ? $this->input->post('title_news_ua') : $news['title_news_ua']); ?>" class="form-control" id="title_news_ua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title_news_ru" class="control-label">Title News Ru</label>
						<div class="form-group">
							<input type="text" name="title_news_ru" value="<?php echo ($this->input->post('title_news_ru') ? $this->input->post('title_news_ru') : $news['title_news_ru']); ?>" class="form-control" id="title_news_ru" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="img_news" class="control-label">Img News</label>
						<div class="form-group">
							<input type="text" name="img_news" value="<?php echo ($this->input->post('img_news') ? $this->input->post('img_news') : $news['img_news']); ?>" class="form-control" id="img_news" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="text_news_ua" class="control-label">Text News Ua</label>
						<div class="form-group">
							<textarea name="text_news_ua" class="form-control" id="text_news_ua"><?php echo ($this->input->post('text_news_ua') ? $this->input->post('text_news_ua') : $news['text_news_ua']); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="text_news_ru" class="control-label">Text News Ru</label>
						<div class="form-group">
							<textarea name="text_news_ru" class="form-control" id="text_news_ru"><?php echo ($this->input->post('text_news_ru') ? $this->input->post('text_news_ru') : $news['text_news_ru']); ?></textarea>
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