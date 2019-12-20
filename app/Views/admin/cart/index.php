<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cart Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cart/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" style="font-size:14px">
                    <tr>
						<th>Id</th>
						<th>Артикул</th>
						<th>Количество</th>
						<th>Стоимость за единицу</th>
						<th>Изображение</th>
						<th>Покупатель</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($cart as $c){ ?>
                    <tr>
						<td><?php echo $c['id_cart']; ?></td>
						<td><?php echo $c['id_product']; ?></td>
						<td><?php echo $c['count_product']; ?></td>
						<td><?php echo $c['price']; ?></td>
						<td><img src="<?php echo $c['img']; ?>" style="width:10%"></td>
						<td><?php echo $c['user']; ?></td>
						<td>
                            <a href="<?php echo site_url('cart/edit/'.$c['id_cart']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('cart/remove/'.$c['id_cart']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?= $pager->links() ?>
                </div>                
            </div>
        </div>
    </div>
</div>
