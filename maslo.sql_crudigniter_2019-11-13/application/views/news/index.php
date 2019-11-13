<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">News Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('news/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id News</th>
						<th>Keywords News Ua</th>
						<th>Keywords News Ru</th>
						<th>Description News Ua</th>
						<th>Description News Ru</th>
						<th>Title News Ua</th>
						<th>Title News Ru</th>
						<th>Img News</th>
						<th>Text News Ua</th>
						<th>Text News Ru</th>
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
						<td><?php echo $n['img_news']; ?></td>
						<td><?php echo $n['text_news_ua']; ?></td>
						<td><?php echo $n['text_news_ru']; ?></td>
						<td>
                            <a href="<?php echo site_url('news/edit/'.$n['id_news']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('news/remove/'.$n['id_news']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
