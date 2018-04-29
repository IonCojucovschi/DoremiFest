 <p class="ribbon"> Регистрация на DoReMi Fest 2018 </p>
            
            <form action="" method="post">
            
                <input type="text" name="numeParticipant" placeholder="Имя Фамилия" required>
                
                <input type="text" name="numeProfesor" placeholder="Имя учителя" required>
                
                <input type="text" name="telefon" placeholder="Tелефон" required>
                
                <?php include("pages/countries.php"); ?>
                
                <input type="text" name="email" placeholder="Эл. адрес" required>
                <textarea name="details" placeholder="Краткое описание"></textarea>

                <input type="submit" name="submit" value="Отправить">
                
            </form>
            
            <br>
            
            <p style="padding: 10px; text-align: center; color: <?php echo $color;?>">
                <?php
                    if ($submit == true) {
                        echo "Данные успешно отправлены.";
                    } else if ($submit == false && !empty($msg)){
                        echo $msg;      
                    } else {
                        echo "Отправьте данные нашему администратору. И вскоре он / она свяжется с вами.";
                    }
                ?>
            </p>