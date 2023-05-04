<?php

// Read data from DB
$thread_array = array();
$sql = "SELECT id, thread_title FROM thread";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$thread_array = $stmt;
