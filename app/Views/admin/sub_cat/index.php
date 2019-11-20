<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sub Cat Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('sub_cat/add'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>Id Sub</th>
                        <th>Id Cat</th>
                        <th>Sub Name Ua</th>
                        <th>Sub Name Ru</th>
                        <th>Sub Key Ua</th>
                        <th>Sub Key Ru</th>
                        <th>Sub Desc Ua</th>
                        <th>Sub Desc Ru</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($sub_cat as $s){ ?>
                        <tr>
                            <td><?php echo $s['id_sub']; ?></td>
                            <td><?php echo $s['id_cat']; ?></td>
                            <td><?php echo $s['sub_name_ua']; ?></td>
                            <td><?php echo $s['sub_name_ru']; ?></td>
                            <td><?php echo $s['sub_key_ua']; ?></td>
                            <td><?php echo $s['sub_key_ru']; ?></td>
                            <td><?php echo $s['sub_desc_ua']; ?></td>
                            <td><?php echo $s['sub_desc_ru']; ?></td>
                            <td>
                                <a href="<?php echo site_url('sub_cat/edit/'.$s['id_sub']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="<?php echo site_url('sub_cat/remove/'.$s['id_sub']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
