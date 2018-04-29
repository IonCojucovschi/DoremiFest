<!doctype>

<html>

    <head>
        <title>DoReMi Fest</title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
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
            include("pages/index-" . $selectedLang . ".php"); 
        ?>
        <div class="bottomLayout" id="bottom"></div>
        </div>
    
        <?php include("footer.php"); ?>
    </body>

</html>