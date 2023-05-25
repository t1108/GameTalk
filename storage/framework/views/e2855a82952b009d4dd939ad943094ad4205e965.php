<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Laravel</title>
    </head>
    <body>
        <?php print_r($_POST);
        ?>
        <div class="mail">メールアドレス</div>
        <div class="pass">パスワード</div>
        <div class="login">ログイン</div>
        <div class="pass_reset">パスワードを忘れた方は<span>こちら</span></div>
        <div class="non_member">ログインせずに利用する</div>
        <div class="new">新規登録</div>
    </body>
</html>

<?php /**PATH /Applications/MAMP/htdocs/made/resources/views/content/index.blade.php ENDPATH**/ ?>