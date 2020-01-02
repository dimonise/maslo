<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список новостей</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('newsadmin/add'); ?>" class="btn btn-success btn-sm">Добавить новость</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" style="font-size:14px">
                    <tr>
						<th>Id </th>
						<th>Ключевые слова Ua</th>
						<th>Ключевые слова Ru</th>
						<th>Описание Ua</th>
						<th>Описание Ru</th>
						<th>Заголовок Ua</th>
						<th>Заголовок Ru</th>
						<th>Изображение</th>
						<th>Дата</th>
						<th>Текст новости Ua</th>
						<th>Текст новости Ru</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($news as $n){ ?>
                    <tr>
						<td><?php echo $n['id_news']; ?></td>
						<td><?php echo $n['keywords_news_ua']; ?></td>
						<td><?php echo $n['keywords_news_ru']; ?></td>
						<td><?php echo $n['description_news_ua']; ?></td>
						<td><?php echo $n['description_news_ru']; ?></td>
						<td><?php echo $n['title_news_ua']; ?></td>
						<td><?php echo $n['title_news_ru']; ?></td>
						<td><img src="<?php echo $n['img_news']; ?>" style="width: 50%;"></td>
						<td><?php echo $n['data']; ?></td>
						<td style="width: 20%;"><?php echo mb_strimwidth($n['text_news_ua'],0,50,'...', 'UTF-8'); ?></td>
						<td style="width: 20%;"><?php echo mb_strimwidth($n['text_news_ru'],0,50,'...', 'UTF-8'); ?></td>
						<td>
                            <a href="<?php echo site_url('newsadmin/edit/'.$n['id_news']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('newsadmin/remove/'.$n['id_news']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
