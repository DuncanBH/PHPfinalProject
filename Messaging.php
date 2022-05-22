<?php require_once "config.php";
?>

<?php //Posting new messages
echo "<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["message"])) {

        $id = $_GET["roomId"];

        $sql = "INSERT INTO chatroomdb.messages (chatroom_id, user_id,message_text) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iis", $param_chatroom_id, $param_user_id, $param_message_text);
        
        $param_chatroom_id = $id;
        $param_user_id = $_SESSION["userId"];
        $param_message_text = $_POST["message"];

        $stmt->execute();
        $stmt->close();
    }
}
?>


<?php //Check if user is signed in
    if (isset($_SESSION["username"])) { ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?roomId=" . $id); ?>" method="post">
            Message: <input type="text" name="message">
            <input type="submit">
        </form> <?php 
    } else {
    ?>Sign-in to post new messages<?php
    }
?>

<?php // Get messages from DB
$sql = "SELECT * FROM chatroomdb.messages m join chatroomdb.users u on (m.user_id=u.user_id) WHERE chatroom_id = $id";
$messages = $mysqli->query($sql);
?>

<!--Displaying messages-->
<div class="container">
    <h2 class="row"> Messages: </h2>
    <?php foreach ($messages as $message) : ?>
        <div class="row border border-secondary my-1 rounded">
            <!--check if image is null, show image else show placeholder-->
            <?php if ($message['user_image'] != null) {?>
            <img style="max-width: 10%" src="data:image/jpeg;base64,<?= base64_encode($message['user_image'])?>"  />
            <?php } else { ?>
            <img style="max-width: 10%" class="col-2" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="blank user">
            <?php } ?>

            <div class="col-10">
                <div class="row">
                    <h3> <?= $message['user_name'] ?> </h3>
                </div>
                <div class="row ms-1">
                    <p> <?= $message['message_text'] ?> </p>
                </div>

            </div>
        </div>
    <?php endforeach ?>
</div>
