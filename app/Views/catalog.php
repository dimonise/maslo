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
        </div>
        <div class="filtr">
            <form id="filtr" action="/catalog/search_filtr" method="post">
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
            </div>
            <div class="col-3 grey right">
                <span><?= lang('Language.on-page'); ?></span>
            </div>
        </div>

        <div class="col-9">
            <div class="row">
                <?php

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
                ?>

            </div>
        </div>
    </div>
</div><?= $pager->links() ?>
</div>