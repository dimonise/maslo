<div class="container">
    <section class="registration-2">
        <div class="social-reg">
            <h4><?= lang('Language.login');?></h4>
            <p><?= lang('Language.soc');?></p>
            <script src="//ulogin.ru/js/ulogin.js"></script>
            <div id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name;providers=facebook;hidden=;redirect_uri=https%3A%2F%2Fmaslo.loc%2F<?= $locale; ?>%2Fauth%2Fcreat_user_soc;mobilebuttons=0;"></div>

            <p><?= lang('Language.or');?></p>
            <form action="/auth/login" class="inlogin" method="post">
                <input class="reg-form form-control" type="text" name="email" placeholder="Email"><br>
                <input class="reg-form form-control" type="password" name="password" placeholder="Пароль"><br>
                <input type="hidden" value="<?= $locale; ?>" name="lang">
                <input class="reg-form btn btn-info" type="submit" value="<?= lang('Language.login');?>"><br>
                <a href="/<?= $locale;?>/forgot" class="fog-form"><?= lang('Language.forgot');?></a>
            </form>
        </div>
    </section>
    <section class="registration-1">
        <h4><?= lang('Language.noacc');?></h4>
        <p><?= lang('Language.noacc1');?> <a href="/".<?= $locale;?>>Maslo.loc</a></p>
        <a href="auth/registration" class="fog-form"><?= lang('Language.noacc2');?></a>
    </section>
</div>