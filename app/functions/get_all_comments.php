<?php
// Read data from DB
$comment_array = array();
$sql = "SELECT id, username, text, post_date, thread_id FROM comments";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // これだと連想配列で取得できる
$comment_array = $stmt;
// var_dump($result);
// var_dump($comment_array);
