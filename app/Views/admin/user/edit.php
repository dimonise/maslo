<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Edit</h3>
            </div>
			<?php echo form_open('user/edit/'.$user[0]['id_user']); ?>
			<div class="box-body">
				<div class="row clearfix">

					<div class="col-md-6">
						<label for="name_user" class="control-label">Имя</label>
						<div class="form-group">
							<input type="text" name="name_user" value="<?php echo (service('request')->getVar('name_user') ? service('request')->getVar('name_user') : $user[0]['name_user']); ?>" class="form-control" id="name_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sname_user" class="control-label">Фамилия</label>
						<div class="form-group">
							<input type="text" name="sname_user" value="<?php echo (service('request')->getVar('sname_user') ? service('request')->getVar('sname_user') : $user[0]['sname_user']); ?>" class="form-control" id="sname_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_user" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email_user" value="<?php echo (service('request')->getVar('email_user') ? service('request')->getVar('email_user') : $user[0]['email_user']); ?>" class="form-control" id="email_user" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="date_reg" class="control-label">Дата регистрации</label>
						<div class="form-group">
                                                    <input type="text" readonly name="date_reg" value="<?php echo $user[0]['date_reg']; ?>" class=" form-control" id="date_reg" />
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="user_phone_life" class="control-label">User Phone Life</label>
						<div class="form-group">
							<input type="text" name="user_phone_life" value="<?php echo (service('request')->getVar('user_phone_life') ? service('request')->getVar('user_phone_life') : $user[0]['user_phone_life']); ?>" class="form-control" id="user_phone_life" />
						</div>
					</div>-->

					<div class="col-md-6">
						<label for="active" class="control-label">Активный</label>
						<div class="form-group">
							<input type="text" name="active" value="<?php echo (service('request')->getVar('active') ? service('request')->getVar('active') : $user[0]['active']); ?>" class="form-control" id="active" />
						</div>
					</div>

<!--					<div class="col-md-6">
						<label for="money" class="control-label">Деньги на счету</label>
						<div class="form-group">
							<input type="text" name="money" value="<?php echo (service('request')->getVar('money') ? service('request')->getVar('money') : $user[0]['money']); ?>" class="form-control" id="money" />
						</div>
					</div>-->


				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>