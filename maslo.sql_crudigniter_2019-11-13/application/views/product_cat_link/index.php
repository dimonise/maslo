<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product Cat Link Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('product_cat_link/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Link</th>
						<th>Id Prod</th>
						<th>Id Cat</th>
						<th>Id Sub Cat</th>
						<th>Id Sub Sub Cat</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($product_cat_link as $p){ ?>
                    <tr>
						<td><?php echo $p['id_link']; ?></td>
						<td><?php echo $p['id_prod']; ?></td>
						<td><?php echo $p['id_cat']; ?></td>
						<td><?php echo $p['id_sub_cat']; ?></td>
						<td><?php echo $p['id_sub_sub_cat']; ?></td>
						<td>
                            <a href="<?php echo site_url('product_cat_link/edit/'.$p['id_link']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('product_cat_link/remove/'.$p['id_link']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
