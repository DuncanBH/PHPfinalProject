<html>

<body>
    <?php
    require 'header.php';
    require_once "config.php";
    ?>
    <h1>Sign up</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Username: <input type="text" name="userName"><br>
        Password: <input type="text" name="userPass"><br>
        Confirm Password: <input type="text" name="userPass2"><br>
        <input type="submit">
    </form>


    <?php
    echo "<br>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["userName"])) {
            $username_error = "Username is Empty";
        }
        echo "<br>";
        if (empty($_POST["userPass"])) {
            $password_error = "Password is Empty";
        } elseif (($_POST["userPass"]) != ($_POST["userPass2"])) {
            $password_error = "Password does not match";
        }
        if (empty($username_error) && empty($password_error)) {
            $sql = "INSERT INTO chatroomdb.users (user_name, user_password) VALUES (?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $param_username,$param_password);
            $param_username = $_POST["userName"];
            $param_password = $_POST["userPass"];

            $stmt->execute();
            $stmt->close();
        }
    }
    ?>
</body>

</html>