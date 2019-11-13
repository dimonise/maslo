<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Feature Val Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('feature_val/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Id Feature</th>
						<th>Val Feature Ua</th>
						<th>Val Feature Ru</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($feature_val as $f){ ?>
                    <tr>
						<td><?php echo $f['id']; ?></td>
						<td><?php echo $f['id_feature']; ?></td>
						<td><?php echo $f['val_feature_ua']; ?></td>
						<td><?php echo $f['val_feature_ru']; ?></td>
						<td>
                            <a href="<?php echo site_url('feature_val/edit/'.$f['']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('feature_val/remove/'.$f['']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
