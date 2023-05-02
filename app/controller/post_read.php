<?php

// Read data from DB
$comment_array = array();
$sql = "SELECT id, username, text, post_date FROM comments";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$comment_array = $result;
// var_dump($result);
// var_dump($comment_array);

// post data to DB
if (isset($_POST['submitBtn']) && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['commentTextArea']) && !empty($_POST['commentTextArea'])) {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8'); // htmlspecialchars()は特殊文字をHTMLエンティティに変換する関数
    $comment = htmlspecialchars($_POST['commentTextArea'], ENT_QUOTES, 'UTF-8');
    $post_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `comments` (`username`, `text`, `post_date`) VALUES (:username, :comment, :post_date)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':post_date', $post_date, PDO::PARAM_STR);
    $stmt->execute();
    header('Location: ./index.php');
}
