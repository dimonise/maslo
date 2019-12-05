<div class="row">
    <!-- filtr -->
    <div class="col-3">
        <h5 class="head-paragraph"><?= lang('Language.filtr'); ?></h5>
        <script>
            $( function() {
                $( "#slider-range" ).slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [ 0, 300 ],
                    slide: function( event, ui ) {
                        $( "#amount" ).val( ui.values[ 0 ] + "грн - " + ui.values[ 1 ]+'грн' );
                    }
                });
                $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
                    "грн - " + $( "#slider-range" ).slider( "values", 1 )+'грн' );
            } );
        </script>
        <p>
            <label for="amount">Price range:</label>
            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
        </p>

        <div id="slider-range"></div>
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
                    echo "<div class=''>";
                    echo "<img src='" . $product['img'] . "' width='100%'>";
                    echo $product['product_name_' . $locale];
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>
</div>