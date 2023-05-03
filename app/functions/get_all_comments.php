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
