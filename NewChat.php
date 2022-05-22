<html>
<body>
    <?php require 'header.php';
        require_once "config.php";
    ?>
    <?php
    $roomName_error = null;
    $roomDesc_error = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $roomName = $_POST["roomName"];
        $roomDesc = $_POST["roomDesc"];
        if (empty($roomName)) {
            $roomName_error = "Name is Empty";
        }
        if (empty($roomDesc)) {
            $roomDesc_error = "Description is Empty";
        }
        if (empty($roomName_error) && empty($roomDesc_error)) {
            $testsql = "SELECT * FROM chatroomdb.chatrooms WHERE chatroom_name = ?";
            $teststmt = $mysqli->prepare($testsql);
            $teststmt->bind_param("s", $param_roomName);
            $param_roomName = $roomName;
            $teststmt->execute();
            $result = $teststmt->get_result();
            $exists = $result->fetch_assoc();
            $teststmt->close();
            if ($exists == null) {
                $sql = "INSERT INTO chatroomdb.chatrooms (chatroom_name, chatroom_description, chatroom_image) VALUES (?, ?, ?)";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sss", $param_roomName, $param_roomDesc, $param_image);
                $param_roomName = $roomName;
                $param_roomDesc = $roomDesc;
                if (is_uploaded_file($_FILES['roomImg']['tmp_name'])) {
                    $param_image = file_get_contents($_FILES['roomImg']['tmp_name']);
                } else {
                    $param_image = null;
                }

                $stmt->execute();
                $stmt->close();

                $id = $mysqli->insert_id;
                header("Location: ./Chatroom.php?roomId=" . $id);
                die();
            }else{
                $roomName_error = "roomName already exists, try another";
            }
        }
    }
    ?>

    <div class="container">
        <h1>Create new chatroom: </h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            New Chatroom Name:<br>
            <input type="text" name="roomName" class="form-control"> <?php echo (!empty($roomName_error)) ? $roomName_error : '';?> <br>
            Description: <br>
            <input type="text" name="roomDesc" class="form-control"> <?php echo (!empty($roomDesc_error)) ? $roomDesc_error : '';?> <br>
            Room picture: <br>
            <input type="file" name="roomImg" class="form-control"><br>
            <input type="submit"  class="form-control">
        </form>
    </div>
</body>

</html>