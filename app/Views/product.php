
<div class="row">
    <div class="col-1"></div>
    <div class="col-3">
        <?= $product[0]['img'] ? "<img src='".$product[0]['img']."'>" : "<img src='/img/no_photo.png'>"; ?>
    </div>
    <div class="col-7">
        <h4><?= $product[0]['product_name_' . $locale]; ?></h4>
        <h5 style="background-color: #ffa500;width: fit-content;padding: 0px 5px;">Артикул: <?= $product[0]['oem']; ?></h5>
        <?php

        foreach ($product as $har):
            ?>
            <div class="har"><?= $har['name_har_' . $locale]; ?></div>
            <div class="value"><?= $har['val_feature_' . $locale]; ?></div>
        <?php
        endforeach;
        ?>
        <div class="har"><?= lang('Language.warhouse'); ?></div>
        <div class="value"><?= $har['warhouse'] > 0 ? lang('Language.yes-warhouse') : lang('Language.no-warhouse'); ?></div>
        <div class="product-description"><?= $product[0]['product_desc_' . $locale]; ?></div>
        <div class="price"><?= $product[0]['price']; ?> грн.</div>
        <div class="count"><input type="number" name="kolvo" id="kolvo" min="1" value="1"></div>
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" id="csrf"/>
        <button type="button" class="incart" onclick="inCart(<?= $product[0]['product_id'] ?>)"><?= lang('Language.incart'); ?></button>
    </div>
    <div class="col-1"></div>

</div>