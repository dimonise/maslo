<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Category Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('category/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Cat</th>
						<th>Name Cat Ru</th>
						<th>Desc Cat Ru</th>
						<th>Name Cat Ua</th>
						<th>Desc Cat Ua</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($category as $c){ ?>
                    <tr>
						<td><?php echo $c['id_cat']; ?></td>
						<td><?php echo $c['name_cat_ru']; ?></td>
						<td><?php echo $c['desc_cat_ru']; ?></td>
						<td><?php echo $c['name_cat_ua']; ?></td>
						<td><?php echo $c['desc_cat_ua']; ?></td>
						<td>
                            <a href="<?php echo site_url('category/edit/'.$c['id_cat']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('category/remove/'.$c['id_cat']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
