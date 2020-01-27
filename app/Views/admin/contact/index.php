<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Контакты</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped" style="font-size:14px">
                    <tr>
                        
                        <th>График работы Ua</th>
                        <th>График работы Ru</th>
                        <th>Адрес Ua</th>
                        <th>Адрес Ru</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($contact as $s) { ?>
                        <tr>
                            <td><?php echo $s['grafic_ua']; ?></td>
                            <td><?php echo $s['grafic_ru']; ?></td>
                            <td><?php echo $s['address_ua']; ?></td>
                            <td><?php echo $s['address_ru']; ?></td>
                            
                            <td>
                                <a href="<?php echo site_url('contactadmin/edit/1'); ?>"
                                   class="btn btn-info btn-xs">Edit</a>

                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
