<?php
helper('form');

?>
<?php echo form_open('menu/edit/' . $menu[0]['id'], array("class" => "form-horizontal")); ?>

    <div class="form-group">
        <label for="parent" class="col-md-4 control-label">Меню категорий</label>
        <div class="col-md-8">
            <?php
            if ($menu[0]['parent'] != 0):
                ?>
                <select name="parent" class="form-control">
                    <option value="">Родительское меню</option>
                    <?php
                    foreach ($all_menu as $menus) {
                        $selected = ($menus['id'] == $menu[0]['parent']) ? ' selected="selected"' : "";

                        echo '<option value="' . $menus['id'] . '" ' . $selected . '>' . $menus['name_ru'] . '</option>';
                    }
                    ?>
                </select>
            <?php
            else:
                echo "<input type='hidden' name='parent' value='0'>";
            endif;
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="name_ru" class="col-md-4 control-label">Name Ru</label>
        <div class="col-md-8">
            <input type="text" name="name_ru"
                   value="<?php echo(service('request')->getVar('name_ru') ? service('request')->getVar('name_ru') : $menu[0]['name_ru']); ?>"
                   class="form-control" id="name_ru"/>
        </div>
    </div>
    <div class="form-group">
        <label for="name_ua" class="col-md-4 control-label">Name Ua</label>
        <div class="col-md-8">
            <input type="text" name="name_ua"
                   value="<?php echo(service('request')->getVar('name_ua') ? service('request')->getVar('name_ua') : $menu[0]['name_ua']); ?>"
                   class="form-control" id="name_ua"/>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>

<?php echo form_close(); ?>