<!DOCTYPE html>
<html>
<head>
    <title>Администратор</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
echo "<div style='width:100%; text-align:center'>";
if (!isset($err)) {
    $err = "";
}
echo $err;
echo form_open('/admin/log_in');
echo form_label('Логин', 'login'), '<br>';
echo form_input('login', ''), '<br>';
echo form_label('Пароль', 'passwrd'), '<br>';
echo form_password('passwrd', ''), '<br>';
echo form_submit('mysubmit', 'ВХОД');
echo form_close();
echo "</div>";

?>
</body>
</html>
