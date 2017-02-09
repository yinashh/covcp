<?php
// connect to database
// mysqli_connect(server, username, password, database)
// default username: root
// default password: null
$connection = mysqli_connect('localhost', 'root', '', 'loginapp');
if (!$connection) {
    die("Database connection failed");
}
// connect to AWS database
// server: traffic-vision-master.comcdsygcrhe.us-east-1.rds.amazonaws.com
// username: tvvancouver
// password: not sure ('' or covcp2017 maybe)