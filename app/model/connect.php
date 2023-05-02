<?php
$dbname = '2ch-bbs';
$table = 'comments';
$user = 'root';
$pass = 'root';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=2ch-bbs', $user, $pass);
    // foreach($pdo->query('SELECT * from comments') as $row) {
    //     print_r($row);
    // }
    // $pdo = null;
} catch (PDOException $e) {
    print "エラー!: " . $e->getMessage() . "<br/>";
    die();
}
