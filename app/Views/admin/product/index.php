<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('product/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <?php
               // d($product);
                ?>
                <table class="table table-striped">
                    <tr>
						<th>Product Id</th>
						<th>Oem</th>
						<th>Img</th>
						<th>Product Name Ua</th>
						<th>Product Name Ru</th>
						<th>Product Key Ua</th>
						<th>Product Key Ru</th>
						<th>Price</th>
						<th>Date Add</th>
						<th>Warhouse</th>
						<th>Product Desc Ua</th>
						<th>Product Desc Ru</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($product as $p){ ?>
                    <tr>
						<td><?php echo $p['product_id']; ?></td>
						<td><?php echo $p['oem']; ?></td>
						<td><img src="<?php echo $p['img']; ?>" style="width: 50px;"></td>
						<td><?php echo $p['product_name_ua']; ?></td>
						<td><?php echo $p['product_name_ru']; ?></td>
						<td><?php echo $p['product_key_ua']; ?></td>
						<td><?php echo $p['product_key_ru']; ?></td>
						<td><?php echo $p['price']; ?></td>
						<td><?php echo $p['date_add']; ?></td>
						<td><?php echo $p['warhouse']; ?></td>
						<td><?php echo $p['product_desc_ua']; ?></td>
						<td><?php echo $p['product_desc_ru']; ?></td>
						<td>
                            <a href="<?php echo site_url('productadmin/edit/'.$p['product_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('productadmin/remove/'.$p['product_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
