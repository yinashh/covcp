<?php include "db.php";
// if login button is clicked
if (isset($_POST['login'])) {
    
    // save username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // check if a valid username and password were entered
    if ($username && $password) {

        // clean incoming info
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        
        // query for user info
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($connection, $query);
        if (!$select_user_query) {
            die('Query FAILED' . mysqli_error($connection));
        }
        // extract user info
        while ($row = mysqli_fetch_array($select_user_query)) {
            $db_id = $row['id'];
            $db_username = $row['username'];
            $db_password = $row['password'];
        }
        // validate username and password and redirect to appropriate pages
        if ($username !== $db_username && $password !== $db_password) {
            header("Location: login.php ");
        } else if ($username == $db_username && $password == $db_password) {
            header("Location: index.html");
        } else {
            header("Location: login.php");
        }
        
    } else {
        echo "<div class='form-group'>Please fill in all fields!</div>";
    }
}
?>


<!DOCTYPE html>

<html lang="en">
    
    <head>
        <link rel="stylesheet" type="text/css" href="external/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <title>Traffic Vision</title>
    </head>
    
    <body>
        <header>
            <div class="row">
                <img class="header-logo" src="resources/img/logo.png" alt="Traffic Vision Logo">
            </div>        
        </header>
        
        <div class="login-page">
            <div class="form">
                <form class="register-form">
                    <input type="text" placeholder="name"/>
                    <input type="password" placeholder="password"/>
                    <input type="text" placeholder="email address"/>
                    <button>create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form" action="login.php" method="post">
                    <input type="text" name="username" placeholder="username"/>
                    <input type="password" name="password" placeholder="password"/>
                    <button name="login">login</button>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
        </div>
        
        <!--
        <div class="login-container">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="username" id="username"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="password" id="password"/>
                </div>
                <button type="submit" class="btn login-btn">Log In</button>
            </form>
        </div>
        -->
    </body>
</html>