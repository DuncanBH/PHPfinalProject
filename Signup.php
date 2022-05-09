<html>

<body>
    


    <?php
    require_once "config.php";
    $username_error = null;
    $password_error = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["userName"];
        $password = $_POST["userPass"];
        $password2 = $_POST["userPass2"];
        if (empty($username)) {
            $username_error = "Username is Empty<br>";
        }
        if (empty($password)) {
            $password_error = "Password is Empty<br>";
        } elseif (($password) != ($password2)) {
            $password_error = "Password does not match<br>";
        }
        if (empty($username_error) && empty($password_error)) {
            $testsql = "SELECT * FROM chatroomdb.users WHERE user_name = ?";
            $teststmt = $mysqli->prepare($testsql);
            $teststmt->bind_param("s", $param_username);
            $param_username = $username;
            $teststmt->execute();
            $result = $teststmt->get_result();
            $exists = $result->fetch_assoc();
            $teststmt->close();
            if ($exists == null) {
                $sql = "INSERT INTO chatroomdb.users (user_name, user_password) VALUES (?, ?)";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ss", $param_username, $param_password);
                $param_username = $username;
                $param_password = $password;

                $stmt->execute();
                $stmt->close();

                $_SESSION["username"] = $username; 
                
            }else{
                $username_error = "Username already exists, try another<br>";
            }
        }
    }
    ?>

<?php
    require 'header.php';
    
    ?>
    <h1>Sign up</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Username: <input type="text" name="userName"><br>
        <?php echo (!empty($username_error)) ? $username_error : '';?>
        Password: <input type="text" name="userPass"><br>
        <?php echo (!empty($password_error)) ? $password_error : '';?>
        Confirm Password: <input type="text" name="userPass2"><br>
        <input type="submit">
    </form>
</body>

</html>