<html>
<body>
    <?php require 'header.php'; 
    require_once "config.php";
    ?>

    <?php
        $id = $_GET["roomId"];
        //echo "ID: " . $id;
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
        $sql = "SELECT * FROM chatroomdb.chatrooms WHERE chatroom_id=" . $id;
        $result = $mysqli->query($sql);
        
        $chatroom;
        foreach($result as $reply) {
            $chatroom = new ChatroomData($reply["chatroom_id"], $reply["chatroom_name"], $reply["chatroom_description"], null);
        }
    ?>

    <div class="container"> 
        <div class="row">
            <h1 class="text-center">Welcome to: "<?= $chatroom->name ?>"</h1>
        </div>
        <div class="row">
            <h2 class="text-center fw-light"><?= $chatroom->desc ?></h2>
        </div>
    </div>
</body>
</html>