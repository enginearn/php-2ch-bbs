<!-- バリデーション -->
<?php if (isset($_POST['submitBtn']) && isset($_POST['username']) && empty($_POST['username'])) : ?>
    <hr class="error">
    <p class="error">名前を入力してください</p>
    <hr class="error">
<?php endif; ?>
<?php if (isset($_POST['submitBtn']) && isset($_POST['commentTextArea']) && empty($_POST['commentTextArea'])) : ?>
    <hr class="error">
    <p class="error">コメントを入力してください</p>
    <hr class="error">
<?php endif; ?>
