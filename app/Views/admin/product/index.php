<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('productadmin/add'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body">
                <?php
               // d($product);
                ?>
                <table class="table table-striped" style="font-size:14px">
                    <tr>
						<th>Id</th>
						<th>Артикул</th>
<!--						<th>Img</th>-->
						<th>Наименование Ua</th>
						<th>Наименование Ru</th>
                        <th>Описание Ua</th>
                        <th>Описание Ru</th>
						<th>Ключевые слова Ua</th>
						<th>Ключевые слова Ru</th>
						<th>Цена</th>
						<th>На складе</th>
                        <th>Дата добавления</th>
						<th></th>
                    </tr>
                    <?php foreach($product as $p){ ?>
                    <tr>
						<td><?php echo $p['product_id']; ?></td>
						<td><?php echo $p['oem']; ?></td>
						<!--<td><img src="<?php //echo $p['img']; ?>" style="width: 50px;"></td>-->
						<td><?php echo $p['product_name_ua']; ?></td>
						<td><?php echo $p['product_name_ru']; ?></td>
                        <td><?php echo mb_strimwidth($p['product_desc_ua'],0,50,'...', 'UTF-8'); ?></td>
                        <td><?php echo mb_strimwidth($p['product_desc_ru'],0,50,'...', 'UTF-8'); ?></td>
						<td><?php echo $p['product_key_ua']; ?></td>
						<td><?php echo $p['product_key_ru']; ?></td>
						<td><?php echo $p['price']; ?></td>
						<td><?php echo $p['warhouse']; ?></td>
                        <td><?php echo $p['date_add']; ?></td>
						<td>
                            <a href="<?php echo site_url('productadmin/edit/'.$p['product_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('productadmin/remove/'.$p['product_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

                <?= $pager->links() ?>

            </div>
        </div>
    </div>
</div>
