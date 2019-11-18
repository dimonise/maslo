<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Добавить нового пользователя</h3>
            </div>
            <?php echo form_open('user/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="name_user" class="control-label">Имя</label>
						<div class="form-group">
							<input type="text" name="name_user" value="<?php echo service('request')->getVar('name_user'); ?>" class="form-control" id="name_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sname_user" class="control-label">Фамилия</label>
						<div class="form-group">
							<input type="text" name="sname_user" value="<?php echo service('request')->getVar('sname_user'); ?>" class="form-control" id="sname_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_user" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email_user" value="<?php echo service('request')->getVar('email_user'); ?>" class="form-control" id="email_user" />
						</div>
					</div>
                    <div class="col-md-6">
                        <label for="password" class="control-label">Пароль</label>
                        <div class="form-group">
                            <input type="password" name="password" value="<?php echo service('request')->getVar('password'); ?>" class="form-control" id="password" />
                        </div>
                    </div>
					<div class="col-md-6">
						<label for="user_phone_life" class="control-label">Телефон</label>
						<div class="form-group">
							<input type="text" name="user_phone_life" value="<?php echo service('request')->getVar('user_phone_life'); ?>" class="form-control" id="user_phone_life" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="active" class="control-label">Активный</label>
						<div class="form-group">
							<input type="text" name="active" value="<?php echo service('request')->getVar('active') ? service('request')->getVar('active') : 1; ?>" class="form-control" id="active" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="money" class="control-label">Money</label>
						<div class="form-group">
							<input type="text" name="money" value="<?php echo service('request')->getVar('money'); ?>" class="form-control" id="money" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Сохранить
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>