<?php
helper('form');
?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Редактирование заказа</h3>
            </div>
			<?php echo form_open('ordersadmin/edit/'.$order[0]['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_order" class="control-label">Номер заказа</label>
						<div class="form-group">
							<input type="text" name="id_order" value="<?php echo (service('request')->getVar('id_order') ? service('request')->getVar('id_order') : $order[0]['id_order']); ?>" class="form-control" id="id_order" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="name_user" class="control-label">Пользователь</label>
						<div class="form-group">
							<input type="text" name="name_user" value="<?php echo (service('request')->getVar('name_user') ? service('request')->getVar('name_user') : $order[0]['name_user']); ?>" class="form-control" id="name_user" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date" class="control-label">Дата заказа</label>
						<div class="form-group">
							<input type="text" name="date" value="<?php echo (service('request')->getVar('date') ? service('request')->getVar('date') : $order[0]['date']); ?>" class="has-datetimepicker form-control" id="date" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label">Адрес доставки и телефон</label>
						<div class="form-group">
							<input type="text" name="address" value="<?php echo (service('request')->getVar('address') ? service('request')->getVar('address') : $order[0]['address']); ?>" class="form-control" id="address" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="status_ru" class="control-label">Статус заказа </label>
						<div class="form-group">
                            <select name="status_ru" id="status_ru" class="form-control">
                                <option value="1" <?php echo ($order[0]['status_ru'] == 1 ? 'selected' : '') ?>>в обработке </option>
                                <option value="2" <?php echo ($order[0]['status_ru'] == 2 ? 'selected' : '') ?>>отправлен </option>
                                <option value="3" <?php echo ($order[0]['status_ru'] == 3 ? 'selected' : '') ?>>завершен </option>
                                <option value="4" <?php echo ($order[0]['status_ru'] == 4 ? 'selected' : '') ?>>отменен </option>
                            </select>
<!--							<input type="text" name="status_ru" value="--><?php //echo (service('request')->getVar('status_ru') ? service('request')->getVar('status_ru') : $order[0]['status_ru']); ?><!--" class="form-control" id="status_ru" />-->
						</div>
					</div>
					<div class="col-md-6">
						<label for="product" class="control-label">Товары в заказе</label>
						<div class="form-group">
							<textarea name="product" class="form-control" id="product"><?php echo (service('request')->getVar('product') ? service('request')->getVar('product') : $order[0]['product']); ?></textarea>
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