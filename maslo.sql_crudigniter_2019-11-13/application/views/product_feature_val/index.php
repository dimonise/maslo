<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product Feature Val Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('product_feature_val/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idd</th>
						<th>Id Product</th>
						<th>Id Feature</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($product_feature_val as $p){ ?>
                    <tr>
						<td><?php echo $p['idd']; ?></td>
						<td><?php echo $p['id_product']; ?></td>
						<td><?php echo $p['id_feature']; ?></td>
						<td>
                            <a href="<?php echo site_url('product_feature_val/edit/'.$p['idd']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('product_feature_val/remove/'.$p['idd']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
