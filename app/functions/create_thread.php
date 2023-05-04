<?php
// Path: PHP\2ch-bbs\app\pages\addThread.php
$error_messages = array();
if (isset($_POST['newThreadCreateBtn'])) {

    if (isset($_POST['newThreadCreateBtn']) && isset($_POST['username']) && empty($_POST['username'])) {
        $error_messages[] = '名前を入力してください';
    } elseif (isset($_POST['newThreadCreateBtn']) && isset($_POST['username']) && !empty($_POST['username'])) {
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        var_dump($username);
    } else {
        $username = '';
    }

    if (isset($_POST['newThreadCreateBtn']) && isset($_POST['commentTextArea']) && empty($_POST['commentTextArea'])) {
        $error_messages[] = 'コメントを入力してください';
    } elseif (isset($_POST['newThreadCreateBtn']) && isset($_POST['commentTextArea']) && !empty($_POST['commentTextArea'])) {
        $comment = htmlspecialchars($_POST['commentTextArea'], ENT_QUOTES, 'UTF-8');
        var_dump($comment);
    } else {
        $comment = '';
    }

    if (isset($_POST['newThreadCreateBtn']) && isset($_POST['title']) && empty($_POST['title'])) {
        $error_messages[] = 'スレッド名を入力してください';
    } elseif (isset($_POST['newThreadCreateBtn']) && isset($_POST['title']) && !empty($_POST['title'])) {
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    } else {
        $title = '';
    }

    if (empty($error_messages)) {
        $post_date = date('Y-m-d H:i:s');

        // Add thread to DB
        // start transaction
        $pdo->beginTransaction();

        try {
            $sql = "INSERT INTO `thread` (`thread_title`) VALUES (:title)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->execute();

            // Add comment to DB
            $sql = "INSERT INTO `comments` (`username`, `text`, `post_date`, `thread_id`)
                    VALUES (:username, :comment, :post_date, (SELECT id FROM thread WHERE thread_title = :title))";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':post_date', $post_date, PDO::PARAM_STR);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            // $stmt->debugDumpParams();
            $stmt->execute();
            $pdo->commit();
            header('Location: http://localhost:8080/2ch-bbs/index.php');
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo $e->getMessage();
        }
    }

    foreach ($error_messages as $error_message) {
        if ($error_message !== '') {
            echo '<hr class="error">';
            echo '<p class="error">' . $error_message . '</p>';
            echo '<hr class="error">';
        }
    }
}

// header('Location: http://localhost:8080/2ch-bbs/app/pages/thread.php?id=' . $pdo->lastInsertId());
