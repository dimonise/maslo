<div class="container">
    <section class="registration-2">
        <div class="social-reg">
            <h4><?= lang('Language.reg');?></h4>
            <p><?= lang('Language.soc');?></p>
            <script src="//ulogin.ru/js/ulogin.js"></script>
            <div id="uLogin"
                 data-ulogin="display=panel;theme=classic;fields=first_name,last_name;providers=facebook;hidden=;redirect_uri=http%3A%2F%2Fmaslo.loc%2F<?= $locale;?>%2Fauth%2Fcreat_user_soc;mobilebuttons=0;"></div>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <p><?= lang('Language.or');?></p>
            <form  class="inlogin" method="post">


                <input class="reg-form" type="text" name="fname" placeholder="<?= lang('Language.fname')?>"><br>
                <input class="reg-form" type="email" name="email" placeholder="Email"><br>

                <input class="reg-form" type="password" name="password" placeholder="<?= lang('Language.pass')?>"><br>

                <input class="reg-form" type="password" name="repassword" placeholder="<?= lang('Language.repass')?>"><br>
                <label><?= lang('Language.termss');?></label>
                <input type="checkbox" value="ok" name="ruler" checked><br>
                <label><?= lang('Language.polit');?></label>
                <input type="checkbox" value="ok" name="ruler1" checked><br>
                <input class="reg-form" id="sub" type="button" value="<?= lang('Language.reg');?>"><br>

            </form>
        </div>
    </section>
    <section class="registration-1">
        <p><?= lang('Language.after');?> <a href="/">mastylo.com.ua</a></p>
    </section>
</div>
<script>
    $('#sub').click(function () {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "/<?= $locale?>/auth/creat_user",
            data: $('.inlogin').serialize(),
            success: function (data) {
                if (data.error == 1) {
                    if(data.msg.fname) {
                        alert(data.msg.fname);
                    }
                    if(data.msg.email) {
                        alert(data.msg.email);
                    }
                    if(data.msg.password) {
                        alert(data.msg.password);
                    }
                    if(data.msg.repassword) {
                        alert(data.msg.repassword);
                    }
                }
                if(data.error == 0){
                    location.href = '/<?=$locale?>/success';
                }
                if(data.error == 2){
                    location.href = '/<?=$locale?>/no_success';
                }
            }
        })
    })
</script>