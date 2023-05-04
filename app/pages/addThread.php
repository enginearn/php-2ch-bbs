<?php
include_once('../model/connect.php');
include('../functions/create_thread.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2ちゃんねる掲示板</title>
    <link rel="stylesheet" type="" href="../static/css/style.css">
</head>

<body>
    <?php include('../view/header.php'); ?>
    <div class="newTheadCreation">
        <h2>新規スレッド作成</h2>
    </div>
    <form class="formWrapper" method="POST">
        <div>
            <label>スレッド名:</label>
            <input type="text" name="title">
            <label>名前:</label>
            <input type="text" name="username">
        </div>
        <div>
            <textarea class="commentTextArea" name="commentTextArea"></textarea>
        </div>
        <input type="submit" value="スレッドを立ち上げる" name="newThreadCreateBtn">
    </form>
</body>

</html>
