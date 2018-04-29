<!doctype>

<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("dbConn.php");
?>

<html>

    <head>
        <title>DoReMi Fest</title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/list.css">
        <link rel="shortcut icon" type="image/x-icon" href="imgs/icon.png" />
        
        <script>
        
            function scrollToBottom() {
                var c = document.getElementById("container");
                window.scrollTo(0, c.scrollHeight);
            }
            
        </script>
    </head>
    
    <body>
        
        <?php
            include("header.php");
        ?>
        
        <div class="container" id="container">
            <p class="ribbon">Lista participanților</p>
            <br>
            <?php
                $result = mysqli_query($conn, "SELECT `nume_participant`, `nume_profesor`, `tara`, `detalii`, YEAR(`anul_participarii`) AS 'year' FROM `participanti` where `valid` = '1'");
                
            ?>
            
            <table class="displayTable">
                <tr>
                    <th>Participant</th>
                    <th>Profesor</th>
                    <th>Țara</th>
                    <th>Anul</th>
                </tr>
                <?php
                    while ($arr = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $arr["nume_participant"] . "</td>";
                        echo "<td>" . $arr["nume_profesor"] . "</td>";
                        echo "<td>" . $arr["tara"] . "</td>";
                        echo "<td>" . $arr["year"] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            
            <div class="bottomLayout" id="bottom"></div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>