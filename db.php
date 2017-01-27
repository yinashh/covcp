<?php
// connect to database
// mysqli_connect(server, username, password, database)
// default username: root
// default password: null
$connection = mysqli_connect('localhost', 'root', '', 'loginapp');
if (!$connection) {
    die("Database connection failed");
}

?>