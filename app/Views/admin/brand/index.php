<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Производители</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped" style="font-size:14px">
                    <tr>                       
                        <th>Название</th>
                        <th>изображение</th>                 
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($brand as $s) { ?>
                        <tr>
                            <td><?php echo $s['name']; ?></td>
                            <td><img src="/img/brand/<?php echo $s['img']; ?>"></td>                            
                            <td>
                                <a href="<?php echo site_url('brandadmin/edit/1'); ?>"
                                   class="btn btn-info btn-xs">Edit</a>

                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
