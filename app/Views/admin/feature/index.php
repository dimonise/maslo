<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Характеристики товаров</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('feature/add'); ?>" class="btn btn-success btn-sm">Добавить новую</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id</th>
						<th>Наименование Ua</th>
						<th>Наименование Ru</th>
						<th></th>
                    </tr>
                    <?php foreach($feature as $f){ ?>
                    <tr>
						<td><?php echo $f['id_name_har']; ?></td>
						<td><?php echo $f['name_har_ua']; ?></td>
						<td><?php echo $f['name_har_ru']; ?></td>
						<td>
                            <a href="<?php echo site_url('feature/edit/'.$f['id_name_har']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('feature/remove/'.$f['id_name_har']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
