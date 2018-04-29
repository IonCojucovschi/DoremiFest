<?php
    
$servername = "fdb19.awardspace.net";
$username = "2660219_doremifest";
$password = "zxcvbnm123456Q";
$dbname = "2660219_doremifest";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

function createTable($conn) {
    $res = mysqli_query($conn, "
    CREATE TABLE IF NOT EXISTS `participanti` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `uuid` varchar(23) NOT NULL DEFAULT '',
      `nume_participant` varchar(50) NOT NULL DEFAULT '',
      `nume_profesor` varchar(50) NOT NULL DEFAULT '',
      `email` varchar(80) NOT NULL DEFAULT '',
      `telefon` varchar(30) NOT NULL DEFAULT '',
      `tara` varchar(30) DEFAULT NULL,
      `detalii` text NOT NULL,
      `anul_participarii` date NOT NULL,
      `valid` tinyint(1) NOT NULL DEFAULT '0'
    ) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
    ") or die(mysqli_error($conn));
    return $res;
}

if (isset($_GET['create']) && $_GET['create'] == 1) {
    if (createTable($conn)) {
        echo "Success.";
    } else {
        echo "An error occured";
    }
}

?>