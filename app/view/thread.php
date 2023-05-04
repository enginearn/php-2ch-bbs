<?php

include_once('app/model/connect.php');
include('app/functions/post_comment.php');
include('app/functions/get_thread.php');
include('app/functions/create_thread.php');

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
