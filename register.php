<!doctype>

<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("dbConn.php");
$submit = false;
$color = "black";
$msg = "";

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $participant = mysqli_real_escape_string($conn, $_POST["numeParticipant"]);
    $profesor = mysqli_real_escape_string($conn, $_POST["numeProfesor"]);
    $telefon = mysqli_real_escape_string($conn, $_POST["telefon"]);
    $tara = mysqli_real_escape_string($conn, $_POST["country"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $detalii = mysqli_real_escape_string($conn, $_POST["details"]);
        $uuid = uniqid('', true);

    
    if (isset($_POST["detalii"])){
        $detalii = $_POST["detalii"];
    }
    
    if (isset($conn)) {
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $color = "red";
            $msg = 'Invalid email address';
        } else {
            $select = mysqli_query($conn, "SELECT `email` FROM `participanti` WHERE `email` = '".$email."'");
            $color = "black";

            if(mysqli_num_rows($select)) {
                $color = "red";
                $msg = 'This email is already being used';
            } else {
 $result = mysqli_query($conn, "INSERT INTO `participanti` (`id`, `uuid`, `nume_participant`, `nume_profesor`, `email`, `telefon`, `tara`, `detalii`, `anul_participarii`, `valid`) VALUES (NULL, '$uuid', '$participant', '$profesor', '$email', '$telefon', '$tara', '$detalii', NOW(), 0)");

                if (isset($result)) {
                
                $body = '<html><body><h3>Un nou utlizator sa inregistrat pe <a href="http://www.doremi-fest.md" target="_blank" rel="noopener">doremi-fest.md</a></h3>
<h4><em>Datele utilizatorului:</em></h4>
<ol style="list-style-type: upper-roman;">
<li style="text-align: left;"><strong>Nume</strong>: '. $participant .'</li>
<li style="text-align: left;"><strong>Email</strong>: <a href="mailto:'. $email .'">'. $email .'</a></li>
<li style="text-align: left;"><strong>Validare</strong>: <a href="http://doremi-fest.md/validateUser.php?id='.$uuid.'" target="_blank" rel="noopener">Click pentru a valida</a></li>
</ol>
<p>Validarea se face pentru ca utilizatorul sa apara in <a href="http://doremi-fest.md/list.php?lang=ro" target="_blank" rel="noopener">lista participantilor</a></p>
<p>Poti contacta utilizatorul prin "<strong>reply</strong>" la acest email...</p></body></html>';


$to = "doremifestival@gmail.com"; 
$subject = $participant . " sa inregistrat la festival"; 

$headers = "From: noreply@doremi-fest.md\r\n";
$headers .= "Reply-To: ". $email ."\r\n";
$headers .= "Return-Path: ". $email ."\r\n";
$headers .= "CC: sombodyelse@gmail.com\r\n";
$headers .= "BCC: hidden@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if(mail($to,$subject,$body,$headers)) { 
   $submit = true;
} else { 
       $color = "red";
       $msg = 'Email could not be send...'; 
} 



                }
            }
        }
    }
}


?>

<html>

    <head>
        <title>DoReMi Fest</title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
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
        
           <?php
                include("pages/register-" . $selectedLang . ".php");
            ?>
            
            <div class="bottomLayout" id="bottom"></div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>