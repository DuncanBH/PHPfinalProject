<html>
<body>
    <?php require 'header.php'; 
        require_once "config.php";
    ?>

    <?php
        class ChatroomData {
            public $id;
            public $name;
            public $desc;
            public $img;

            public function __construct($id, $name, $desc, $img)
            {
                $this->id = $id;
                $this->name = $name;
                $this->desc = $desc;
                $this->img = $img;
            }
        }
        $sql = "SELECT * FROM chatroomdb.chatrooms";
        $reqReply = $mysqli->query($sql);

        $chatrooms = [];

        foreach($reqReply as $reply) {
            $chatroom = new ChatroomData($reply["chatroom_id"], $reply["chatroom_name"], $reply["chatroom_description"], $reply["chatroom_image"]);
            array_push($chatrooms, $chatroom);
        }
    ?>
    <div class="container"> 
        <div class="row">
            <h1 class="text-center">Welcome to the home page</h1>
        </div>
        <div class="row">
            <h2 class="text-center fw-light">Available chatrooms:</h2>
        </div>
    </div>

    <div class="container">
        <?php foreach ($chatrooms as $chatroom ) : ?>
            <div class="row my-2 border border-secondary rounded p-2">
                <!--check if image is null, show image else show placeholder-->
                <?php if ($chatroom->img != null) {?>
                <img class="img-fluid col-2" src="data:image/jpeg;base64,<?= base64_encode($chatroom->img)?>"  />
                <?php } else { ?>
                <img class="img-fluid col-2" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="blank user">
                <?php } ?>

                <div class="col-10"> 
                    <div class="row">
                        <h3> <?= $chatroom->name ?> </h3>
                    </div>
                    <div class="row">
                        <p> <?= $chatroom->desc ?> </p>
                    </div>
                    <div class="row">
                        <a href="./Chatroom.php?roomId=<?= $chatroom->id ?>" class="col-2 btn btn-success w-auto">Connect to chat</a>
                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
</body>
</html>