<?php
session_start();

if(!isset($_SESSION['user']))
{
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serwis</title>
    <style>
        body{
            font-family: Arial;
            background-color: silver;
            
        }

        a{
            text-decoration: none;
            color: deeppink;
        }

        span{
            font-weight: bold;
        }


       
    </style>
</head>
<body>
    <h2>Witaj w naszym serwisie! Miłej pracy</h2>
    <p>Jesteś zalogowany jako: <span>
    <?php
    if(isset($_SESSION['user']))
    {
        echo $_SESSION['user'];
    }
    ?>
    </span></p>


<div class="rozpo">
                <form action=""><input type="date">Data:</form>
                <label for="Start time" class="form-label">Godzina Rozpoczęcia:</label>
                <select name="startTime">
                    <option value="0:00">0:00h</option>
                    <option value="1:00">1:00h</option>
                    <option value="2:00">2:00h</option>
                    <option value="3:00">3:00h</option>
                    <option value="4:00">4:00h</option>
                    <option value="5:00">5:00h</option>
                    <option value="6:00">6:00h</option>
                    <option value="7:00">7:00h</option>
                    <option value="8:00">8:00h</option>
                    <option value="9:00">9:00h</option>
                    <option value="10:00">10:00h</option>
                    <option value="11:00">11:00h</option>
                    <option value="12:00">12:00h</option>
                    <option value="13:00">13:00h</option>
                    <option value="14:00">14:00h</option>
                    <option value="15:00">15:00h</option>
                    <option value="16:00">16:00h</option>
                    <option value="17:00">17:00h</option>
                    <option value="18:00">18:00h</option>
                    <option value="19:00">19:00h</option>
                    <option value="20:00">20:00h</option>
                    <option value="21:00">21:00h</option>
                    <option value="22:00">22:00h</option>
                    <option value="23:00">23:00h</option>
                </select>
                <label for="Koniec" class="form-label">Godzina zakonczenia:</label>
                <select name="koniec">
                <option value="0:00">0:00h</option>
                    <option value="1:00">1:00h</option>
                    <option value="2:00">2:00h</option>
                    <option value="3:00">3:00h</option>
                    <option value="4:00">4:00h</option>
                    <option value="5:00">5:00h</option>
                    <option value="6:00">6:00h</option>
                    <option value="7:00">7:00h</option>
                    <option value="8:00">8:00h</option>
                    <option value="9:00">9:00h</option>
                    <option value="10:00">10:00h</option>
                    <option value="11:00">11:00h</option>
                    <option value="12:00">12:00h</option>
                    <option value="13:00">13:00h</option>
                    <option value="14:00">14:00h</option>
                    <option value="15:00">15:00h</option>
                    <option value="16:00">16:00h</option>
                    <option value="17:00">17:00h</option>
                    <option value="18:00">18:00h</option>
                    <option value="19:00">19:00h</option>
                    <option value="20:00">20:00h</option>
                    <option value="21:00">21:00h</option>
                    <option value="22:00">22:00h</option>
                    <option value="23:00">23:00h</option>
                </select>

                <input type="submit" value="Zarezerwuj">
</div>
    
    <p><a href="">Wyloguj się</a></p>
</body>
</html>