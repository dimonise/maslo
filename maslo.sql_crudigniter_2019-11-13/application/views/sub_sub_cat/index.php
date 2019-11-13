<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sub Sub Cat Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('sub_sub_cat/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Sub Sub</th>
						<th>Id Sub</th>
						<th>Name Sub Sub Ua</th>
						<th>Name Sub Sub Ru</th>
						<th>Key Sub Sub Ua</th>
						<th>Key Sub Sub Ru</th>
						<th>Desc Sub Sub Ua</th>
						<th>Desc Sub Sub Ru</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($sub_sub_cat as $s){ ?>
                    <tr>
						<td><?php echo $s['id_sub_sub']; ?></td>
						<td><?php echo $s['id_sub']; ?></td>
						<td><?php echo $s['name_sub_sub_ua']; ?></td>
						<td><?php echo $s['name_sub_sub_ru']; ?></td>
						<td><?php echo $s['key_sub_sub_ua']; ?></td>
						<td><?php echo $s['key_sub_sub_ru']; ?></td>
						<td><?php echo $s['desc_sub_sub_ua']; ?></td>
						<td><?php echo $s['desc_sub_sub_ru']; ?></td>
						<td>
                            <a href="<?php echo site_url('sub_sub_cat/edit/'.$s['id_sub_sub']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('sub_sub_cat/remove/'.$s['id_sub_sub']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
