</div>

<footer class="navbar-static-bottom">
    <div class="row">
        <div class="col-md-3 foot-menu-xs">
            <a href="/<?= $locale; ?>"><?= lang('Language.home'); ?></a><br>
            <a href="/<?= $locale; ?>/catalog"><?= lang('Language.cat'); ?></a><br>
            <a href="/<?= $locale; ?>/news"><?= lang('Language.article'); ?></a><br>
            <a href="/<?= $locale; ?>/delivery"><?= lang('Language.delivery'); ?></a><br>
            <a href="/<?= $locale; ?>/contact"><?= lang('Language.contact'); ?></a>
            <br><br>
        </div>

        <div class="col-md-3 foot-text-xs">
            <?= lang('Language.footer-text') ?><br><br>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <div style="float:left"><img src="/img/clock-grey.png"></div>
            <div style="margin-left: 50px;"><?= lang('Language.grafik-head') ?></div>
            <br>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3 foot-menu-big">
            <a href="/<?= $locale; ?>"><?= lang('Language.home'); ?></a><br>
            <a href="/<?= $locale; ?>/catalog"><?= lang('Language.cat'); ?></a><br>
            <a href="/<?= $locale; ?>/news"><?= lang('Language.article'); ?></a><br>
            <a href="/<?= $locale; ?>/delivery"><?= lang('Language.delivery'); ?></a><br>
            <a href="/<?= $locale; ?>/contact"><?= lang('Language.contact'); ?></a><br>
            <a href="/<?= $locale; ?>/oferta"><?= lang('Language.oferta'); ?></a><br>
            <a href="/<?= $locale; ?>/terms"><?= lang('Language.terms'); ?></a>
        </div>
        <div class="col-md-3 foot-text-big">
            <?= lang('Language.footer-text') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <div style="float:left"><img src="/img/point-grey.png"></div>
            <div style="margin-left: 50px;"><?= lang('Language.grafik') ?></div>
            <br>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <form method="post" id="backphone" name="backphone">
                <input type="text" name="fname" style="float:left;width:29%" placeholder="<?= lang('Language.fname') ?>"
                       onkeyup="return proverkaChar(this);" onchange="return proverkaChar(this);" required>
                <hr noshade style="height: 40px; width: 1px;float:left;position: relative;top:-15px">

                <input type="tel" name="phone" style="width:45%" placeholder="<?= lang('Language.phone-num') ?>"
                       onkeyup="return proverka(this);"
                       onchange="return proverka(this);" required>
                <input type="button" value="<?= lang('Language.phone') ?>" class="btn btn-success">
            </form>
            <br>
        </div>
        <div class="copyright">
            <hr class="line">
            <div>&copy;D&P  <?php echo (date('Y')); ?> All rights reserved</div>
        </div>
    </div>

    <script type="text/javascript">

        function proverka(numer) {
            numer.value = numer.value.replace(/[^\d]/g, '');
        }
        ;

        function proverkaChar(chars) {
            chars.value = chars.value.replace(/[^A-Za-zА-Яа-я\u0600-\u06FF ]/, '');
        }
        ;
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/script.js"></script>

</footer>
</body>
</html>
