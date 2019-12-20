<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Пользователи</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Добавить нового пользователя</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" style="font-size:14px">
                    <tr>
                        <th>ID</th>
						<th>Имя</th>
						<th>Фамилия</th>
						<th>Email</th>
						<th>Дата регистрации</th>
						<th></th>
                    </tr>
                    <?php foreach($users as $u){ ?>
                    <tr>
                        <td><?php echo $u['id_user']; ?></td>
						<td><?php echo $u['name_user']; ?></td>
						<td><?php echo $u['sname_user']; ?></td>
						<td><?php echo $u['email_user']; ?></td>

						<td><?php echo $u['date_reg']; ?></td>

						<td>
                            <a href="<?php echo site_url('user/edit/'.$u['id_user']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('user/remove/'.$u['id_user']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>
