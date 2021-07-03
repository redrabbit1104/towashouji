<?php

session_start();

require 'validation3.php';

header('X-FRAME-OPTIONS:DENY');

if (!empty($_SESSION)) {
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
}

function sp_chars($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$page_flag = 0;
$error_messages = validation($_POST);

if (!empty($_POST["btn_confirm"]) && empty($error_messages)) {
    $page_flag = 1;
}

if (!empty($_POST["btn_submit"])) {
    $page_flag = 2;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>csrf</title>
</head>

<body>
    <?php if ($page_flag === 0) : ?>
        <?php
        if (!isset($_SESSION['csrfToken'])) {
            $csrfToken = bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $csrfToken;
        }
        $token = $_SESSION['csrfToken'];
        ?>

        <?php if (!empty($error_messages) && !empty($_POST['btn_confirm'])) : ?>
            <?php echo '<ul>'; ?>
            <?php
            foreach ($error_messages as $message) {
                echo '<li>' . $message . '</li>';
            }
            ?>
            <?php echo '</ul>'; ?>
        <?php endif; ?>

        入力画面
        <form method="POST" action="csrf.php">
            名前
            <input type="text" name="your_name" value="<?php if (!empty($_POST['your_name'])) {
                                                            echo sp_chars($_POST['your_name']);
                                                        } ?>">
            <br>
            免許
            <input type="radio" name="licence" value="0" <?php if (!empty($_POST['licence']) && $_POST['licence'] === '0') {
                                                                echo 'checked';
                                                            } ?>>あり
            <input type="radio" name="licence" value="1" <?php if (!empty($_POST['licence']) && $_POST['licence'] === '1') {
                                                                echo 'checked';
                                                            } ?>>なし
            <br>
            メールアドレス
            <input type="text" name="email" value="<?php if (!empty($_POST['email'])) {
                                                        echo sp_chars($_POST['email']);
                                                    } ?>">
            <br>
            ホームページ
            <input type="text" name="url" value="<?php if (!empty($_POST['url'])) {
                                                        echo sp_chars($_POST['email']);
                                                    } ?>">
            <input type="submit" name="btn_confirm" value="confirm">
            <input type="hidden" name="csrf" value="<?php echo $token; ?>">


        </form>
    <?php endif; ?>

    <?php if ($page_flag === 1) : ?>
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>


            確認画面
            <form method="POST" action="csrf.php">
                名前
                <?php echo sp_chars($_POST["your_name"]); ?>
                <br>
                免許
                <?php if ($_POST['licence'] === '0') {
                    echo 'あり';
                }
                if ($_POST['licence'] === '1') {
                    echo 'なし';
                } ?>
                メールアドレス
                <?php echo sp_chars($_POST["email"]); ?>
                ホームページ
                <?php echo sp_chars($_POST["url"]); ?>

                <input type="submit" name="btn_submit" value="submit">
                <input type="hidden" name="your_name" value="<?php echo sp_chars($_POST['your_name']); ?>">
                <input type="hidden" name="licence" value="<?php echo sp_chars($_POST['licence']); ?>">
                <input type="hidden" name="email" value="<?php echo sp_chars($_POST['email']); ?>">
                <input type="hidden" name="url" value="<?php echo sp_chars($_POST['url']); ?>">
                <input type="hidden" name="csrf" value="<?php echo sp_chars($_POST['csrf']); ?>">
            </form>
        <?php endif; ?>

    <?php endif; ?>

    <?php if ($page_flag === 2) : ?>
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>

        <?php require 'insert2.php';
           insertPost($_POST); ?>
            送信完了。
            <?php unset($_SESSION['csrfToken']); ?>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>