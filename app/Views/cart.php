<div class="row body-cart">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="row">
            <div class="col-1 th">№</div>
            <div class="col-2 th">Артикул</div>
            <div class="col-3 th"><?= lang('Language.nam');?></div>
            <div class="col-2 th"><?= lang('Language.colvo');?></div>
            <div class="col-2 th"><?= lang('Language.price');?></div>
            <div class="col-2 th"></div>
        <?php
        $i = 1;
        $summ = 0;
        foreach ($product as $item):
            echo "      <div class='col-1 td'>" . $i . "</div>
                        <div class='col-2 td'>" . $item['id_product'] . "</div>
                        <div class='col-3 td'>" . $item['product_name_' . $locale] . "</div>
                        <div class='col-2 td'>" . $item['count_product'] . "</div>
                        <div class='col-2 td'>" . $item['price'] * $item['count_product'] . "грн.</div>
                        <div class='col-2 td'><a href='#' onclick='delProduct(".$item['id_cart'].",\"".$item['user']."\"); return false;'>".lang('Language.del')."</a></div>";
            $i++;
            $summ += $item['price'] * $item['count_product'];
        endforeach;
        ?>
        </div>
        <div class="row">
            <div class="col-12"><?= lang('Language.allsumm').'&nbsp;'.$summ; ?>&nbsp; грн.</div>
        </div>
    </div>
    <div class="col-2"></div>
</div>