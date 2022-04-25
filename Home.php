<html>
<body>
    <?php require 'header.php'?>
    <h1>Welcome to the home page</h1>

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

        $values = array(
            new ChatroomData(0, "Very cool chatroom", "Cool chat", "no img"),
            new ChatroomData(1, "Chat room for weirdos", "Less cool chat", "no img"),
            new ChatroomData(2, "The Screaming Room", "AAAAAAAAAAAAAAAA", "no img"),
            new ChatroomData(3, "FR chat", "Francais seulement", "no img")
        );
    ?>

    Available chatrooms:
    <div class="container">
        <?php foreach ($values as $chatroom ) : ?>
            <div class="row">
                <img class="col-2" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="blank user">
                <div class="col-10 container-fluid"> 
                    <div class="row">
                        <h3> <?= $chatroom->name ?> </h3>
                    </div>
                    <div class="row">
                        <p> <?= $chatroom->desc ?> </p>
                    </div>
                    <div class="row">
                        <button type="button" class="col-2 btn btn-success">Connect to chat</button>
                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
</body>
</html>