<?php
helper('form');

use App\Models\UserModel;

if (session('name_user')) {
    $user = new UserModel();
    $user = $user->get_user(session('id_user'));
    $user = $user[0];
} else {
    $user = session('id_user');
}
?>
<div class="row body-cart">
    <div class="col-md-2 off"></div>
    <div class="col-md-8 clear-padd">
        <div class="row cart-big">
            <div class="col-md-1 th" >№</div>
            <div class="col-md-2 th" >Артикул</div>
            <div class="col-md-3 th"><?= lang('Language.nam'); ?></div>
            <div class="col-md-2 th"><?= lang('Language.colvo'); ?></div>
            <div class="col-md-2 th"><?= lang('Language.price'); ?></div>
            <div class="col-md-2 th"></div>
            <?php
            $i = 1;
            $summ = 0;
            foreach ($product as $item):
                echo "      <div class='col-md-1 td' style='width: 7.6%'>" . $i . "</div>
                        <div class='col-md-2 td'>" . $item['id_product'] . "</div>
                        <div class='col-md-3 td'>" . $item['product_name_' . $locale] . "</div>
                        <div class='col-md-2 td'>" . $item['count_product'] . "</div>
                        <div class='col-md-2 td'>" . $item['price'] * $item['count_product'] . "грн.</div>
                        <div class='col-md-2 td'><a href='#' onclick='delProduct(" . $item['id_cart'] . ",\"" . $item['user'] . "\"); return false;'>" . lang('Language.del') . "</a></div>";
                $i++;
                $summ += $item['price'] * $item['count_product'];
            endforeach;
            ?>
        </div>
        <div class="row cart-small">
            <table style="width: 100%;text-align: center">
                <th class="th">№</th>
                <th class="th">Артикул</th>
                <th class="th"><?= lang('Language.nam'); ?></th>
                <th class="th"><?= lang('Language.colvo'); ?></th>
                <th class="th"><?= lang('Language.price'); ?></th>
                <th class="th"></th>
                <?php
                $i = 1;
                $summ = 0;
                foreach ($product as $item):
                    echo "<tr>
                        <td class=' td' >" . $i . "</td>
                        <td class=' td' >" . $item['id_product'] . "</td>
                        <td class=' td' '>" . $item['product_name_' . $locale] . "</td>
                        <td class=' td' >" . $item['count_product'] . "</td>
                        <td class=' td' >" . $item['price'] * $item['count_product'] . "грн.</td>
                        <td class=' td' ><a href='#' onclick='delProduct(" . $item['id_cart'] . ",\"" . $item['user'] . "\"); return false;'>" . lang('Language.del') . "</a></td></tr>";
                    $i++;
                    $summ += $item['price'] * $item['count_product'];
                endforeach;
                ?>
            </table>


        </div>
        <div class="row">
            <div class="col-md-12"><?= lang('Language.allsumm') . '&nbsp;' . $summ; ?>&nbsp; грн.</div>
            <?php

            echo form_open("orders/confirm/" . session('id_user'));
            echo "<h5><input type='radio' checked style='margin-top:50px'  name='deliv' value='NP'>" . lang('Language.np') . "</h5>";
            echo "<h5 style='width:100%;margin-top:10px;text-align: center'>" . lang('Language.del_info') . "</h5>";
            ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="name_user" class="control-label"><?= lang('Language.ima'); ?></label>
                        <div class="form-group">
                            <input type="text" name="name_user"
                                   value="<?php echo($user['name_user'] ? $user['name_user'] : ''); ?>"
                                   class="form-control" id="name_user" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sname_user" class="control-label"><?= lang('Language.lname'); ?></label>
                        <div class="form-group">
                            <input type="text" name="sname_user"
                                   value="<?php echo($user['sname_user'] ? $user['sname_user'] : ''); ?>"
                                   class="form-control" id="sname_user" required/>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="user_phone_life" class="control-label">Телефон</label>
                        <div class="form-group">
                            <input type="text" name="user_phone_life"
                                   value="<?php echo($user['user_phone_life'] ? $user['user_phone_life'] : ''); ?>"
                                   class="form-control" id="user_phone_life" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="region" class="control-label">Область</label>
                        <!--                        <div class="form-group">--><?php //var_dump($oblast);die;?>
                        <select name="region" id="region" onchange="getrayon()" class="form-control">
                            <option>-- ОБЛАСТЬ --</option>
                            <?php

                            foreach ($oblast as $obl):
                                //var_dump($obl);die;
                                if ($obl['id_region'] == $user['region']) {
                                    $sel = 'selected';
                                } else {
                                    $sel = '';
                                }
                                ?>
                                <option value="<?= $obl['id_region'] ?>" <?= $sel; ?>><?= $obl['name']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="rayon" class="control-label">Район</label>
                        <div class="form-group" id="rayon">
                            <select name="rayon" class="form-control">
                                <option>-- РАЙОН --</option>
                                <?php
                                foreach ($allrayon as $rayon) {
                                    if ($rayon['id_rayon'] == $user['rayon']) {
                                        $sel = 'selected';
                                    } else {
                                        $sel = '';
                                    }
                                    echo '<option value="' . $rayon['id_rayon'] . '" ' . $sel . '>' . $rayon['rayon'] . '</option>';
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
                                if ($user['city']) {
                                    echo '<option value="' . $user['city'] . '" selected>' . $user['city'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="control-label"><?= lang('Language.addnp'); ?></label>
                        <div class="form-group" id="addr">
                            <input name="address" class="form-control" style="height: 38px;" value="" >
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12" >
                    <?php echo "<h5 style='width:100%;margin-top:50px;text-align: center'>" . lang('Language.ili') . "</h5>"; ?>
                    <?php echo "<h5 ><input type='radio' name='deliv' value='SAM'>" . lang('Language.del_info_sam') . "</h5>"; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="name_user_sam" class="control-label"><?= lang('Language.ima'); ?></label>
                        <div class="form-group">
                            <input type="text" name="name_user_sam"
                                   value="<?php echo($user['name_user'] ? $user['name_user'] : ''); ?>"
                                   class="form-control" id="name_user_sam" required/>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <label for="sname_user_sam" class="control-label"><?= lang('Language.lname'); ?></label>
                        <div class="form-group">
                            <input type="text" name="sname_user_sam"
                                   value="<?php echo($user['sname_user'] ? $user['sname_user'] : ''); ?>"
                                   class="form-control" id="sname_user_sam" required/>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success "> <?= lang('Language.ord') ?></button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="col-md-2"></div>
</div>