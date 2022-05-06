<html>

<body>
    <?php require 'header.php';
    require_once "config.php";
    ?>

    <?php
    echo "<br>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["message"])) {
            $sql = "INSERT INTO chatroomdb.messages (chatroom_id, user_id,message_text) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("iis", $param_chatroom_id, $param_user_id, $param_message_text);
            $param_chatroom_id = 1;
            $param_user_id = 1;
            $param_message_text = $_POST["message"];

            $stmt->execute();
            $stmt->close();
        }
    }
    ?>

    <h1>Welcome to the home page</h1>

    <?php
    // class MessageData {
    //     public $id;
    //     public $chatroomid;
    //     public $user_id;
    //     public $message_text;

    //     public function __construct($id, $name, $desc, $img)
    //     {
    //         $this->id = $id;
    //         $this->name = $name;
    //         $this->desc = $desc;
    //         $this->img = $img;
    //     }
    // }

    // $values = array(
    //     new ChatroomData(0, "Very cool chatroom", "Cool chat", "no img"),
    //     new ChatroomData(1, "Chat room for weirdos", "Less cool chat", "no img"),
    //     new ChatroomData(2, "The Screaming Room", "AAAAAAAAAAAAAAAA", "no img"),
    //     new ChatroomData(3, "FR chat", "Francais seulement", "no img")
    // );

    $sql = "SELECT * FROM chatroomdb.messages m join chatroomdb.users u on (m.user_id=u.user_id) WHERE chatroom_id = 1";
    $messages = $mysqli->query($sql);
    ?>

    Messages:
    <div class="container">
        <?php foreach ($messages as $message) : ?>
            <div class="row">
                <!--<img class="col-2" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="blank user">-->
                <!--needs to be in php quotes<'<img src="data:image/jpeg;base64,'.base64_encode($message['image']).'"/>';-->
                <div class="col-10 container-fluid">
                    <div class="row">
                        <h3> <?= $message['user_name'] ?> </h3>
                    </div>
                    <div class="row">
                        <p> <?= $message['message_text'] ?> </p>
                    </div>

                </div>
            </div>
        <?php endforeach ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Message: <input type="text" name="message">
            <input type="submit">
        </form>
    </div>



</body>

</html>