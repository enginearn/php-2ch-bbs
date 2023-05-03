<?php

include_once('app/model/connect.php');
include_once('app/functions/get_thread.php');
include_once('app/functions/get_all_comments.php');
// include_once('app/functions/post_comment.php');

?>

<?php foreach ($thread_array as $thread) : ?>
    <div class="threadWrapper">
        <div class="childWrapper">
            <div class="threadTitle">
                <span>【タイトル】</span>
                <!-- <h1><a href="app/pages/thread.php?id=<?php echo $thread['id']; ?>"><?php echo $thread['thread_title']; ?></a></h1> -->
                <h1><?php echo $thread['thread_title']; ?></h1>
            </div>
            <?php include('commentSection.php'); ?>
            <?php include('commentForm.php'); ?>
            <?php include_once('validation.php'); ?>
        </div>
    </div>
<?php endforeach; ?>
