<html>
<body>
    <?php require 'header.php'?>
    <h1>Welcome to the home page</h1>

    <?php
        $id = $_GET["roomId"];
        echo "ID: " . $id;
    ?>
</body>
</html>