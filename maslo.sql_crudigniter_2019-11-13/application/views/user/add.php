<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Add</h3>
            </div>
            <?php echo form_open('user/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="password" class="control-label">Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_user" class="control-label">Name User</label>
						<div class="form-group">
							<input type="text" name="name_user" value="<?php echo $this->input->post('name_user'); ?>" class="form-control" id="name_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sname_user" class="control-label">Sname User</label>
						<div class="form-group">
							<input type="text" name="sname_user" value="<?php echo $this->input->post('sname_user'); ?>" class="form-control" id="sname_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_user" class="control-label">Email User</label>
						<div class="form-group">
							<input type="text" name="email_user" value="<?php echo $this->input->post('email_user'); ?>" class="form-control" id="email_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="type_user" class="control-label">Type User</label>
						<div class="form-group">
							<input type="text" name="type_user" value="<?php echo $this->input->post('type_user'); ?>" class="form-control" id="type_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_reg" class="control-label">Date Reg</label>
						<div class="form-group">
							<input type="text" name="date_reg" value="<?php echo $this->input->post('date_reg'); ?>" class="has-datetimepicker form-control" id="date_reg" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_phone_life" class="control-label">User Phone Life</label>
						<div class="form-group">
							<input type="text" name="user_phone_life" value="<?php echo $this->input->post('user_phone_life'); ?>" class="form-control" id="user_phone_life" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_phone_mtc" class="control-label">User Phone Mtc</label>
						<div class="form-group">
							<input type="text" name="user_phone_mtc" value="<?php echo $this->input->post('user_phone_mtc'); ?>" class="form-control" id="user_phone_mtc" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_phone_ks" class="control-label">User Phone Ks</label>
						<div class="form-group">
							<input type="text" name="user_phone_ks" value="<?php echo $this->input->post('user_phone_ks'); ?>" class="form-control" id="user_phone_ks" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_phone_t" class="control-label">User Phone T</label>
						<div class="form-group">
							<input type="text" name="user_phone_t" value="<?php echo $this->input->post('user_phone_t'); ?>" class="form-control" id="user_phone_t" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="active" class="control-label">Active</label>
						<div class="form-group">
							<input type="text" name="active" value="<?php echo $this->input->post('active'); ?>" class="form-control" id="active" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="activation_code" class="control-label">Activation Code</label>
						<div class="form-group">
							<input type="text" name="activation_code" value="<?php echo $this->input->post('activation_code'); ?>" class="form-control" id="activation_code" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_soc_id" class="control-label">User Soc Id</label>
						<div class="form-group">
							<input type="text" name="user_soc_id" value="<?php echo $this->input->post('user_soc_id'); ?>" class="form-control" id="user_soc_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="money" class="control-label">Money</label>
						<div class="form-group">
							<input type="text" name="money" value="<?php echo $this->input->post('money'); ?>" class="form-control" id="money" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="factory" class="control-label">Factory</label>
						<div class="form-group">
							<input type="text" name="factory" value="<?php echo $this->input->post('factory'); ?>" class="form-control" id="factory" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="edrpo" class="control-label">Edrpo</label>
						<div class="form-group">
							<input type="text" name="edrpo" value="<?php echo $this->input->post('edrpo'); ?>" class="form-control" id="edrpo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="pay_activ" class="control-label">Pay Activ</label>
						<div class="form-group">
							<input type="text" name="pay_activ" value="<?php echo $this->input->post('pay_activ'); ?>" class="form-control" id="pay_activ" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_pay" class="control-label">Data Pay</label>
						<div class="form-group">
							<input type="text" name="data_pay" value="<?php echo $this->input->post('data_pay'); ?>" class="form-control" id="data_pay" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="char_fac" class="control-label">Char Fac</label>
						<div class="form-group">
							<textarea name="char_fac" class="form-control" id="char_fac"><?php echo $this->input->post('char_fac'); ?></textarea>
						</div>
					</div>
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