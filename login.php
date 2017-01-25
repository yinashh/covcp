<?php
// if login button is clicked
if (isset($_POST['submit'])) {
    
    // save username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // check if a valid username and password were entered
    if ($username && $password) {
    
        // connect to database
        // mysqli_connect(server, username, password, database)
        // default username: root
        // default password: null
        $connection = mysqli_connect('localhost', 'root', '', 'loginapp');
        if (!$connection) {
            die("Database connection failed");
        }

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
  <title>Traffic Vision</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./style.css">
  <meta charset=UTF-8>
  <meta name="viewport" content="width=device-width, 
          initial-scale=1.0
          maximum-scale=1.0
          user-scalable=no">
</head>

<body>
  <header>
    <img class="header-logo col-6 offset-3" src="./logo.png" />
  </header>
  
  <main class="container-fluid">
    <div class="row main-body">
      <div class="col-md-6 offset-md-3">
        <div class="login-container">
          <form action="login.php" method="post">
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="username" id="username"/>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="password" id="password"/>
            </div>
            <button type="submit" name="submit" class="btn login-button">Log In</button>
            
          </form>
        </div>
      </div>
    </div>
  </main>
  
</body>
</html>
