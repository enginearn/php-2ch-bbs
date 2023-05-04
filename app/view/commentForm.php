<?php
$position = 0;
if (isset($_POST["submitBtn"])) {
    $position = $_POST["position"];
}
?>
<form class="formWrapper" method="POST">
    <div>
        <input type="submit" name="submitBtn" value="書き込む">
        <label for="name">名前:</label>
        <input type="text" name="username" id="username" value="<?php if($thread["id"] == $comment["thread_id"]) echo $_SESSION["username"]; ?>">
        <input type="hidden" name="thread_id" value="<?php echo $thread["id"]; ?>">
    </div>
    <div>
        <textarea class="commentTextArea" name="commentTextArea"></textarea>
    </div>
    <input type="hidden" name="position" value="0">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(() => {
        $("input[type=submit]").click(() => {
            let position = $(window).scrollTop();
            $("input:hidden[name=position]").val(position);
        })
        $(window).scrollTop(<?php echo $position; ?>);
    })
</script>
