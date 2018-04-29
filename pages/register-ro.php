 <p class="ribbon"> Inregistreazate la DoReMi Fest 2018 </p>
            
            <form action="" method="post">
            
                <input type="text" name="numeParticipant" placeholder="Nume Prenume" required>
                
                <input type="text" name="numeProfesor" placeholder="Nume Profesor" required>
                
                <input type="text" name="telefon" placeholder="Telefon" required>
                
                <?php include("pages/countries.php"); ?>
                
                <input type="text" name="email" placeholder="Email" required>
                <textarea name="details" placeholder="Descriere succcinta"></textarea>

                <input type="submit" name="submit" value="Trimite">
                
            </form>
            
            <br>
            
            <p style="padding: 10px; text-align: center; color: <?php echo $color;?>">
                <?php
                    if ($submit == true) {
                        echo "Datele au fost trimise cu succes.";
                    } else if ($submit == false && !empty($msg)){
                        echo $msg;      
                    } else {
                        echo "Trimite datele spre administratorul nostru. Si in scurt timp el/ea va va contacta.";
                    }
                ?>
            </p>