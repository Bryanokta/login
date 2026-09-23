<?php

session_start();

include "../config/database.php";

if (isset($_SESSION['username'])) {
    header("Location: ../dashboard/index.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {
    $inputUsername = trim($_POST['username'] ?? '');
    $inputPassword = trim($_POST['password'] ?? '');

    if (empty($inputUsername) || empty($inputPassword)) {
        $error = "Username and password are required.";
    } else {
        $hashedPassword = md5($inputPassword);
        $loginQuery = "SELECT username, name FROM users WHERE username = ? AND password = ?";
        
        $loginStmt = mysqli_prepare($conn, $loginQuery);
        mysqli_stmt_bind_param($loginStmt, "ss", $inputUsername, $hashedPassword);
        mysqli_stmt_execute($loginStmt);
        
        $queryResult = mysqli_stmt_get_result($loginStmt);

        if ($userData = mysqli_fetch_assoc($queryResult)) {
            $_SESSION['username'] = $userData['username'];
            $_SESSION['name'] = $userData['name'];

            header("Location: ../dashboard/index.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }

        mysqli_stmt_close($loginStmt);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="login-page">

    <div class="login-box">

        <div class="login-header">

            <h1>Please Login</h1>

        </div>

        <?php if ($error != "") { ?>

            <div class="error">

                <?php echo $error; ?>

            </div>

        <?php } ?>

        <form method="POST">

            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                >

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                >

            </div>

            <button type="submit" name="login">
                Login
            </button>

        </form>

    </div>

    <script src="../assets/js/login.js"></script>

</body>

</html>