<?php
    $mysqli = new mysqli("localhost","root","","pemweb-webblog");

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    } 

    function select($query){
        global $mysqli;
        if ($result = $mysqli->query($query)) {
            $row = $result -> fetch_all(MYSQLI_ASSOC);
            return $row;
        }
        return 0;
    }
?>