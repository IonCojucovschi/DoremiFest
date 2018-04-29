<?php

include("dbConn.php");

if (isset($_GET["id"])) {
    $uuid = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM `participanti` WHERE `uuid` = '$uuid'");
    if (mysqli_num_rows($result) != 0) {
        if (mysqli_query($conn, "UPDATE `participanti` SET `valid` = 1 WHERE `uuid` = '$uuid'")) {
            echo "Validat!";
        }
    } else {
        echo "Utilizator inexistent!";
    }
        
}

?>