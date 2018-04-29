<nav class="navigationBar">
    <?php
    $buttons = [
                    "ro" => [
                        "Acasa",
                        "REGULAMENT",
                        "Contacte",
                        "Galerie",
                        "Înregistrare",
                        "Lista participanților"
                    ], 
                    "ru" => [
                        "Главная",
                        "Регламент",
                        "КОНТАКТ",
                        "галерея",
                        "регистрация",
                        "Список участников"
                    ] 
                ];
    
    
        $languages = ["ro", "ru"];
        $selectedLang = $languages[0];
        if (isset($_GET["lang"])) {
            $lang = $_GET["lang"];
            if (in_array($lang, $languages)) {
                $selectedLang = $lang;
            }
        }
        $langs = array_diff($languages, [$selectedLang]);
    ?>

    <div class="menu">
        <ul class="menuItems">
            <li><a href="index.php?lang=<?php echo $selectedLang;?>">
                <?php echo $buttons[$selectedLang][0]; ?>
                </a></li>
            <li><a href="index.php?lang=<?php echo $selectedLang;?>#regulament">
                <?php echo $buttons[$selectedLang][1]; ?>
                </a></li>
            <li><a href="index.php?lang=<?php echo $selectedLang;?>#bottom">
                <?php echo $buttons[$selectedLang][2]; ?>
                </a></li>
            <li><a href="index.php?lang=<?php echo $selectedLang;?>#">
                <?php echo $buttons[$selectedLang][3]; ?>
                </a></li>
        </ul>

        <div class="social">
            <a href="https://www.facebook.com/doremel.festivel.1?ref=bookmarks" target="_blank"><img src="imgs/facebook.png"></a>
            <a href="https://www.instagram.com/doremifestival/" target="_blank"><img src="imgs/instagram.png"></a>
            <a href="https://twitter.com/FestivalDoremi?lang=en" target="_blank"><img src="imgs/twitter.png"></a>
        </div>
        <script>
            
            function getUrlParameter(sParam) {
                var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : sParameterName[1];
                    }
                }
            }
            
            function changeLanguage(elem) {
                var oldLocation = window.location.href;
                let param = getUrlParameter("lang");
                let newURL = oldLocation.replace(param, elem.value);
                console.log(param);
                if (param == undefined) {
                    window.location.href = "index.php?lang="+elem.value;
                } else {
                    window.location.href = newURL;
                }
            }
        </script>
        
        <div class="languages">
            <select onchange="changeLanguage(this);">
                <?php
                    echo "<option selected>" . $selectedLang . "</option>";
                    foreach ($langs as $l) {
                        echo "<option>" . $l . "</option>";
                    }
                ?>
            </select>
        </div>

    </div>

    <div class="logoBlock">
        <img class="logoFlagImg" src="imgs/logoFlag.png">
        <img class="logo" src="imgs/doremiLogo.png">

        <button><a href="register.php?lang=<?php echo $selectedLang;?>">
            <?php echo $buttons[$selectedLang][4]; ?>
            </a></button>
        <button>
            <a href="list.php?lang=<?php echo $selectedLang;?>">
            <?php echo $buttons[$selectedLang][5]; ?>
            </a>
        </button>
    </div>



</nav>