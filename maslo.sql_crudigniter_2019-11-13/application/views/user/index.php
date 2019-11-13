<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id User</th>
						<th>Password</th>
						<th>Name User</th>
						<th>Sname User</th>
						<th>Email User</th>
						<th>Type User</th>
						<th>Date Reg</th>
						<th>User Phone Life</th>
						<th>User Phone Mtc</th>
						<th>User Phone Ks</th>
						<th>User Phone T</th>
						<th>Active</th>
						<th>Activation Code</th>
						<th>User Soc Id</th>
						<th>Money</th>
						<th>Factory</th>
						<th>Edrpo</th>
						<th>Pay Activ</th>
						<th>Data Pay</th>
						<th>Char Fac</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($users as $u){ ?>
                    <tr>
						<td><?php echo $u['id_user']; ?></td>
						<td><?php echo $u['password']; ?></td>
						<td><?php echo $u['name_user']; ?></td>
						<td><?php echo $u['sname_user']; ?></td>
						<td><?php echo $u['email_user']; ?></td>
						<td><?php echo $u['type_user']; ?></td>
						<td><?php echo $u['date_reg']; ?></td>
						<td><?php echo $u['user_phone_life']; ?></td>
						<td><?php echo $u['user_phone_mtc']; ?></td>
						<td><?php echo $u['user_phone_ks']; ?></td>
						<td><?php echo $u['user_phone_t']; ?></td>
						<td><?php echo $u['active']; ?></td>
						<td><?php echo $u['activation_code']; ?></td>
						<td><?php echo $u['user_soc_id']; ?></td>
						<td><?php echo $u['money']; ?></td>
						<td><?php echo $u['factory']; ?></td>
						<td><?php echo $u['edrpo']; ?></td>
						<td><?php echo $u['pay_activ']; ?></td>
						<td><?php echo $u['data_pay']; ?></td>
						<td><?php echo $u['char_fac']; ?></td>
						<td>
                            <a href="<?php echo site_url('user/edit/'.$u['id_user']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('user/remove/'.$u['id_user']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
