<html>
<body>
<?php require 'header.php'?>
<?php
    require_once "config.php";
    $username_error = null;
    $password_error = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["userName"];
        $password = $_POST["userPass"];
        if (empty($username)) {
            $username_error = "Username is Empty";
        }
        if (empty($password)) {
            $password_error = "Password is Empty";
        }
        if (empty($username_error) && empty($password_error)) {
            $testsql = "SELECT * FROM chatroomdb.users WHERE user_name = ? AND user_password = ?";
            $teststmt = $mysqli->prepare($testsql);
            $teststmt->bind_param("ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = hash('sha256', $password);

            $teststmt->execute();

            $result = $teststmt->get_result();
            $exists = $result->fetch_assoc();
            
            $teststmt->close();
            if ($exists != null) {
                $_SESSION["userId"] = $exists["user_id"];
                $_SESSION["username"] = $username; 
                $_SESSION['userImg'] = $exists["user_image"];

                ?>
                <!--Redirect in JS-->
                <script type="text/javascript">
                window.location.href = './Home.php';
                </script>
                <?php
            } else {
                $username_error = "Incorrect information, try again";
            }
        }
    }
    ?>

    <div class="container">
        <h1>Log in</h1>

        <form action="login.php" method="post">
            Username: <br> 
            <input type="text" name="userName"  class="form-control"> <?php echo (!empty($username_error)) ? $username_error : '';?> <br>
            Password: <br> 
            <input type="text" name="userPass"  class="form-control"> <?php echo (!empty($password_error)) ? $password_error : '';?> <br>
            
            <input type="submit"  class="form-control">
        </form>
    </div>
</body>
</html>