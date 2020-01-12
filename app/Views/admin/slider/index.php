<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Слайдер на главной</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('slider/add'); ?>" class="btn btn-success btn-sm">Добавить слайд</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" style="font-size:14px">
                    <tr>
						
						<th>Слайд</th>
						<th>Заголовок Ua</th>
						<th>Заголовок Ru</th>
						<th>Text Ua</th>
						<th>Text Ru</th>
						<th>Текст на кнопке Ua</th>
						<th>Текст на кнопке Ru</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($slider as $s){ ?>
                    <tr>
						
						<td><img src="<?= $s['slider'] ?>" width="30%"></td>
						<td><?php echo $s['title_ua']; ?></td>
						<td><?php echo $s['title_ru']; ?></td>
						<td><?php echo $s['text_ua']; ?></td>
						<td><?php echo $s['text_ru']; ?></td>
						<td><?php echo $s['button_ua']; ?></td>
						<td><?php echo $s['button_ru']; ?></td>
						<td>
                            <a href="<?php echo site_url('slider/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('slider/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>

