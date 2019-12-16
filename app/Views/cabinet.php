<?php
helper('form');
?>
<script>
    $(function () {
        $("#tabs").tabs();
    });
</script>

<div class="col-12">
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1"><?= lang('Language.priv'); ?></a></li>
            <li><a href="#tabs-2"><?= lang('Language.orders'); ?></a></li>
            <li><a href="#tabs-3"><?= lang('Language.backform'); ?></a></li>
        </ul>
        <div id="tabs-1">
            <?php echo form_open('cabinet/edit/' . $user[0]['id_user']); ?>
            <div class="box-body">
                <div class="row clearfix">

                    <div class="col-md-6">
                        <label for="name_user" class="control-label"><?= lang('Language.ima'); ?></label>
                        <div class="form-group">
                            <input type="text" name="name_user"
                                   value="<?php echo(service('request')->getVar('name_user') ? service('request')->getVar('name_user') : $user[0]['name_user']); ?>"
                                   class="form-control" id="name_user"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sname_user" class="control-label"><?= lang('Language.lname'); ?></label>
                        <div class="form-group">
                            <input type="text" name="sname_user"
                                   value="<?php echo(service('request')->getVar('sname_user') ? service('request')->getVar('sname_user') : $user[0]['sname_user']); ?>"
                                   class="form-control" id="sname_user"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email_user" class="control-label">Email</label>
                        <div class="form-group">
                            <input type="text" name="email_user"
                                   value="<?php echo(service('request')->getVar('email_user') ? service('request')->getVar('email_user') : $user[0]['email_user']); ?>"
                                   class="form-control" id="email_user"/>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="control-label"><?= lang('Language.pass'); ?></label>
                        <div class="form-group">
                            <input type="text" name="password"
                                   value="<?php echo(service('request')->getVar('password') ? service('request')->getVar('password') : $user[0]['password']); ?>"
                                   class="form-control" id="password" placeholder="<?= lang('Language.passplace'); ?>"/>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="date_reg" class="control-label"><?= lang('Language.datereg'); ?></label>
                        <div class="form-group">
                            <input readonly type="text" name="date_reg"
                                   value="<?php echo(service('request')->getVar('date_reg') ? service('request')->getVar('date_reg') : $user[0]['date_reg']); ?>"
                                   class="has-datetimepicker form-control" id="date_reg"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="user_phone_life" class="control-label">Телефон</label>
                        <div class="form-group">
                            <input type="text" name="user_phone_life"
                                   value="<?php echo(service('request')->getVar('user_phone_life') ? service('request')->getVar('user_phone_life') : $user[0]['user_phone_life']); ?>"
                                   class="form-control" id="user_phone_life"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="region" class="control-label">Область</label>
                        <div class="form-group">
                            <select name="region" id="region" onchange="getrayon()" class="form-control">
                                <option>-- ОБЛАСТЬ --</option>
                                <?php
                                foreach ($oblast as $obl):
                                    if($obl['id_region'] == $user[0]['region']){
                                        $sel = 'selected';
                                    }
                                    else{
                                        $sel = '';
                                    }
                                    ?>
                                    <option value="<?= $obl['id_region']; ?>" <?= $sel;?>><?= $obl['name']; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="rayon" class="control-label">Район</label>
                        <div class="form-group" id="rayon">
                            <select name="rayon" class="form-control">
                                <option>-- РАЙОН --</option>
                                <?php
                                foreach ($allrayon as $rayon) {
                                    if($rayon['id_rayon'] == $user[0]['rayon']){
                                        $sel = 'selected';
                                    }
                                    else{
                                        $sel = '';
                                    }
                                    echo '<option value="' . $rayon['id_rayon'] . '" '.$sel.'>' . $rayon['rayon'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="control-label"><?= lang('Language.city'); ?></label>
                        <div class="form-group" id="city">
                            <select name="city" class="form-control">
                                <option style="text-transform: uppercase">-- <?= lang('Language.city'); ?> --</option>
                                <?php
                                if($user[0]['city']){
                                  echo  '<option value="'.$user[0]['city'].'" selected>'.$user[0]['city'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="control-label"><?= lang('Language.addr'); ?></label>
                        <div class="form-group" id="addr">
                            <textarea name="address" class="form-control" style="height: 38px;"><?= $user[0]['address']?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="active" class="control-label"><?= lang('Language.act'); ?></label>
                        <div class="form-group">
                            <?php
                            if ($user[0]['active'] == 1):
                                ?>
                                <input type="text" readonly
                                       value="<?php echo lang('Language.isactive'); ?>" class="form-control"
                                       id="active"/>
                            <?php
                            else:
                                ?>
                                <input type="text" readonly
                                       value="<?php echo lang('Language.noactive'); ?>" class="form-control"
                                       id="active"/>
                            <?php
                            endif;
                            ?>
                            <input type="hidden" name="active"
                                   value="<?php echo(service('request')->getVar('active') ? service('request')->getVar('active') : $user[0]['active']); ?>"
                                   class="form-control" id="active"/>
                        </div>
                    </div>

                    <!--                    <div class="col-md-6">-->
                    <!--                        <label for="money" class="control-label">Деньги на счету</label>-->
                    <!--                        <div class="form-group">-->
                    <!--                            <input type="text" name="money"-->
                    <!--                                   value="-->
                    <?php //echo(service('request')->getVar('money') ? service('request')->getVar('money') : $user[0]['money']); ?><!--"-->
                    <!--                                   class="form-control" id="money"/>-->
                    <!--                        </div>-->
                    <!--                    </div>-->


                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div id="tabs-2">
            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id
                nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie
                lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula
                suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur
                ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque
                convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare
                leo nisi vel felis. Mauris consectetur tortor et purus.</p>
        </div>
        <div id="tabs-3">
            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula
                accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent
                taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu
                urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem
                enim, pretium nec, feugiat nec, luctus a, lacus.</p>
            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla
                facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti.
                Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio.
                Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat
                porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas
                commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
        </div>
    </div>
</div>