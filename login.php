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
            header("Location: login.html ");
        } else if ($username == $db_username && $password == $db_password) {
            header("Location: index.html");
        } else {
            header("Location: login.html");
        }
        
    } else {
        echo "<div class='form-group'>Please fill in all fields!</div>";
    }
}
?>