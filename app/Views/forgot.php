<div class="container">
    <section class="registration-2">
        <div class="social-reg">

            <h4><?= lang('Language.fog')?></h4>
            <p><?=  lang('Language.fog_txt')?></p>
            <div class="border-top-vostan">
                <form action="/auth/forgot" method="post">
                <input class="reg-form" type="text" value=""  name="email" placeholder="e-mail" required>
                    <input type="hidden" value="<?=$locale?>" name="lang">
                <div class="border-top-bottom"></div>
            </div>
            <input class="reg-form" type="submit" value="<?=lang('Language.more_forgot')?>">
            </form>
        </div>
    </div>	
</div>
