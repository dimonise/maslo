<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Заказы</h3>
                <!--            	<div class="box-tools">-->
                <!--                    <a href="-->
                <?php //echo site_url('order/add'); ?><!--" class="btn btn-success btn-sm">Add</a> -->
                <!--                </div>-->
            </div>
            <div class="box-body">
                <table class="table table-striped" style="font-size:14px">
                    <tr>

                        <th>Номер заказа</th>
                        <th>Пользователь</th>
                        <th>Дата</th>
                        <th>Адрес доставки</th>
                        <th>Статус заказа Ru</th>
                        <th>Товар в заказе</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($orders as $o) { ?>
                        <tr>

                            <td><?php echo $o['id_order']; ?></td>
                            <td><?php echo $o['name_user']; ?></td>
                            <td><?php echo $o['date']; ?></td>
                            <td><?php echo $o['address']; ?></td>
                            <td><?php

                                switch ($o['status_ru']) {
                                    case 1:
                                        echo 'в обработке';
                                        break;
                                    case 2:
                                        echo 'отправлен';
                                        break;
                                    case 3:
                                        echo 'завершен';
                                        break;
                                    case 4:
                                        echo 'отменен';
                                        break;
                                }

                                ?></td>
                            <td><?php echo $o['product']; ?></td>
                            <td>
                                <a href="<?php echo site_url('ordersadmin/edit/' . $o['id']); ?>"
                                   class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="<?php echo site_url('ordersadmin/remove/' . $o['id']); ?>"
                                   class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
