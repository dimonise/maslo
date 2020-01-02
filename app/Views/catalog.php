<?php

use App\Models\CatalogModel;

$catalog = new CatalogModel();
?>
<div class="row">
    <!-- filtr -->
    <div class="col-1"></div>
    <div class="col-2">
        <h5 class="head-paragraph"><?= lang('Language.filtr'); ?></h5>
        <?php
        if (@$startPrice) {
            $start = $startPrice;
            $finish = $finishPrice;
        } else {
            $start = 0;
            $finish = 1000;
        }
        ?>
        <script>
            $(function () {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 1000,
                    values: [0, 1000],
                    slide: function (event, ui) {
                        $("#amount").val(ui.values[0] + "грн - " + ui.values[1] + 'грн');
                        $("#startPrice").val(ui.values[0]);
                        $("#finishPrice").val(ui.values[1]);
                    }
                });
                $("#amount").val(<?= $start;?> +
                    "грн - " + <?= $finish;?> +'грн');
                $("#startPrice").val(<?= $start;?>);
                $("#finishPrice").val(<?= $finish;?>);
            });
        </script>
        <div class="filtr">
            <label for="amount"><?= lang('Language.cena'); ?>:</label>
            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            <div id="slider-range"></div>
            <form id="filtr" action="/catalog/search_filtr" method="post">
                <label for="inprice"><?= lang('Language.withprice'); ?></label>
                <input type="checkbox" value="1" name="price">
        </div>
        <div class="filtr">

            <input type="hidden" value="" id="startPrice" name="startPrice">
            <input type="hidden" value="" id="finishPrice" name="finishPrice">
            <?php //dd($val);
            foreach ($brend as $item) {
                echo "<br><label style='text-transform: uppercase;color:#f6931f'>" . $item['name_har_' . $locale] . "</label><br>";
                $value = $catalog->getBrendValue($item['id_name_har']);
                foreach ($value as $val) {
                    if (@$filtr):
                        if (in_array($val['id'], $filtr, false)) {
                            $check = 'checked';
                        } else {
                            $check = '';
                        }
                    endif;
                    echo "<span><input type='checkbox' value='" . $val['id'] . "' name='filtr[]' " . @$check . ">" . $val['val_feature_' . $locale] . "</span><br>";
                }
            }
            ?>
            <input type="submit" class="btn btn-info" value="<?= lang('Language.sech') ?>" id="search-filtr">
            </form>
        </div>
        <!--        <input type="button" class="btn btn-info" value="-->
        <? //= lang('Language.sech')?><!--" id="search-filtr">-->

    </div>

    <!-- body catalog -->
    <div class="col-9">
        <h5 class="head-paragraph-main"><?= lang('Language.last-prod'); ?></h5>
        <div class="row">
            <div class="col-6 grey">
                <span>СОРТИРОВКА: </span>
                <select name="sort" id="sort" onchange="sorts('<?= $locale; ?>');">
                    <option value="0"><?= lang('Language.sel_sort'); ?></option>
                    <option value="1"><?= lang('Language.sort_up'); ?></option>
                    <option value="2"><?= lang('Language.sort_down'); ?></option>
                </select>
            </div>
            <div class="col-3 grey right">
                <span><?= lang('Language.on-page'); ?></span>
                <select name="onpage" id="onpage" onchange="sorts('<?= $locale; ?>');">
                    <option value="9">9</option>
                    <option value="18">18</option>
                    <option value="36">36</option>
                </select>
            </div>
        </div>

        <div class="col-9">
            <div class="row sort-section">
                <?php
                if (count($last) > 0) {
                    foreach ($last as $product):

                        echo "<div class='col-4'>";
                        echo "<a href='/" . $locale . "/product/" . $product['product_id'] . "'>";
                        echo "<div class='prod'>";
                        echo "<img src='" . $product['img'] . "' width='100%'>";
                        echo $product['product_name_' . $locale] . ', ' . $product['price'] . 'грн';
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                    endforeach;
                    $pager = \Config\Services::pager();
                } else {
                    echo lang('Language.noproduct');
                }
                ?>

            </div>
        </div>
    </div>
</div><?
if (count($last) > 0) {
    echo $pager->links();
} ?>
</div>