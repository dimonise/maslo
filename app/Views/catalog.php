<?php
use App\Models\CatalogModel;
$catalog = new CatalogModel();
?>
<div class="row">
    <!-- filtr -->
    <div class="col-1"></div>
    <div class="col-2">
        <h5 class="head-paragraph"><?= lang('Language.filtr'); ?></h5>
        <script>
            $(function () {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 1000,
                    values: [0, 1000],
                    slide: function (event, ui) {
                        $("#amount").val(ui.values[0] + "грн - " + ui.values[1] + 'грн');
                    }
                });
                $("#amount").val($("#slider-range").slider("values", 0) +
                    "грн - " + $("#slider-range").slider("values", 1) + 'грн');
            });
        </script>
        <div class="filtr">
            <label for="amount"><?= lang('Language.cena'); ?>:</label>
            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            <div id="slider-range"></div>
        </div>
        <div class="filtr">
            <form id="filtr">
            <?php //dd($val);
                foreach($brend as $item){
                    echo "<br><label style='text-transform: uppercase;color:#f6931f'>".$item['name_har_'.$locale]."</label><br>";
                    $value = $catalog->getBrendValue($item['id_name_har']);
                    foreach($value as $val){
                        echo "<span><input type='checkbox' value='".$val['id']."' name='filtr[]'>".$val['val_feature_'.$locale]."</span><br>";
                    }
                }
            ?>
            </form>
        </div>
        <input type="button" class="btn btn-info" value="<?= lang('Language.sech')?>" id="search-filtr">

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
                    echo $product['product_name_' . $locale];
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