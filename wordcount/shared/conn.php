<?php
    $dbhost = "localhost"; // the host address for DB
    $dbuser = "root"; // username to log in the server
    $dbpass = ""; // password to log in the server
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

    if(! $conn)
    {
        die("Fail to connect with the server, the error code is: ".mysqli_connect_error());
    }

?>