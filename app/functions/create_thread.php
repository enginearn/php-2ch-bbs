<?php
$error_messages = array();

if (isset($_POST['newThreadCreateBtn']) && isset($_POST['username']) && empty($_POST['username'])) {
    $error_messages[] = '名前を入力してください';
} elseif (isset($_POST['newThreadCreateBtn']) && isset($_POST['commentTextArea']) && empty($_POST['commentTextArea'])) {
    $error_messages[] = 'コメントを入力してください';
} elseif (isset($_POST['newThreadCreateBtn']) && isset($_POST['title']) && empty($_POST['title'])) {
    $error_messages[] = 'タイトルを入力してください';
} else {
    $error_messages[] = '';
}

foreach ($error_messages as $error_message) {
    if ($error_message !== '') {
        echo '<hr class="error">';
        echo '<p class="error">' . $error_message . '</p>';
        echo '<hr class="error">';
    }
}

if (empty($error_messages)) {
    $postdate = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `thread` (`title`) VALUES (:title);";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->execute();
}

echo '<hr class="error">';
echo '<p class="error">スレッドを立ち上げました</p>';
echo '<hr class="error">';

// header('Location: ../../index.php');
?>

