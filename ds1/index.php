<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serwis</title>
    <link rel="stylesheet" href="indexcss.css">
    
</head>



<body>


<input type="checkbox" id="menu-toggle"/>
  <label id="trigger" for="menu-toggle"></label>
  <label id="burger" for="menu-toggle"></label>
  <ul id="menu">
    <li><a href="index.php">Strona głowna</a></li>
    <li><a href="rejestracja.php">Zarejestruj się</a></li>
  </ul>



    <h2>Witaj! Aby rozpocząć pracę musisz sie zalogować</h2>
    <div class="form">
        <form action="logowanie.php" method="post">
            <input type="text" name="login" placeholder="wpisz login">
            <input type="password" name="haslo" placeholder="wpisz haslo">
            <input type="submit" value="Zaloguj się" name="loguj">
        </form>
        
        <?php
        if(isset($_SESSION['error'])) :
        ?>
        <div class="error">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>