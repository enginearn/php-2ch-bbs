<?php

$error_messages = array();

session_start();

if (isset($_POST['submitBtn'])) {

    if (empty($_POST['username'])) {
        $error_messages[] = '名前を入力してください';
    } elseif (!empty($_POST['username'])) {
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $_SESSION['username'] = $username;
    } else {
        $username = '';
    }

    if (empty($_POST['commentTextArea'])) {
        $error_messages[] = 'コメントを入力してください';
    } elseif (!empty($_POST['commentTextArea'])) {
        $comment = htmlspecialchars($_POST['commentTextArea'], ENT_QUOTES, 'UTF-8');
    } else {
        $comment = '';
    }

    // post data to DB
    if (empty($error_messages)) {
        $post_date = date("Y-m-d H:i:s");
        $thread_id = $_POST['thread_id'];

        // start transaction
        $pdo->beginTransaction();

        try {
            $sql = "INSERT INTO `comments` (`username`, `text`, `post_date`, `thread_id`)
                    VALUES (:username, :comment, :post_date, :thread_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":comment", $comment, PDO::PARAM_STR);
            $stmt->bindParam(":post_date", $post_date, PDO::PARAM_STR);
            $stmt->bindParam(":thread_id", $thread_id, PDO::PARAM_INT);
            // $stmt->debugDumpParams();
            $stmt->execute();
            $pdo->commit();
            // header('Location: http://localhost:8080/2ch-bbs/app/pages/thread.php?id=' . $thread_id);
            // header('Location: http://localhost:8080/2ch-bbs/index.php');
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo $e->getMessage();
        }
    }
}
