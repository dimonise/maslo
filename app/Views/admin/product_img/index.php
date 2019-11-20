<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product Img Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('product_img/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Img Id</th>
						<th>Prod Id</th>
						<th>Img</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($product_img as $p){ ?>
                    <tr>
						<td><?php echo $p['img_id']; ?></td>
						<td><?php echo $p['prod_id']; ?></td>
						<td><?php echo $p['img']; ?></td>
						<td>
                            <a href="<?php echo site_url('product_img/edit/'.$p['img_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('product_img/remove/'.$p['img_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
