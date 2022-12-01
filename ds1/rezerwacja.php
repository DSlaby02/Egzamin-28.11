<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location: logowanie.php');
    }
    $test = $_SESSION['user'];
    require_once "zmienne.php";
    $conn = new mysqli($host,$user,$password,$name);
    $rezultat = $conn->query("SELECT email FROM users WHERE login='$test'");
    $row = $rezultat->fetch_array();
    $email = $row['email'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rezerwacjastyle.css">
    <title>Rezerwacja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        </div>
        <ul class="menu">
            <li><a href="index.php">wyloguj się</a></li>
            
           
            </a></li>
           
            </div>
        </ul>
    </nav>

    <div class="container">
            <form action="rez.php" method="POST">
                <h2>Proszę wprowadzić dane osoby rezerwującej</h2>
               <br><br>
                <div class="dane">
                <div class="pole1">
                    <div class="imie">
                        <input type="text" name="imie" placeholder="Imię">
                    </div><br>
                
                    <div class="nazwisko">
                        <input type="text" name="nazwisko" placeholder="Nazwisko">
                    </div>
                    </div><br><br>
                </div>
                <div class="kontakt">
                    <div class="email">
                        <label for="kontakt"></label><br>
                        <input type="email" name="email" value="<?php echo $email ?>" placeholder="E-mail" >
                    </div><br><br>
                    <div class="telefon">
                       <br>
                        <input type="tel" name="telefon" pattern="[0-9]{9}" placeholder="Telefon">
                    </div><br><br>
                </div>
                <div class="czas">
                    <div>
                        <label for="godzinaroz"><p>Dzień Rozpoczęcia</p></label><br>
                        <input type="date" name="start">
                    </div>
                    
                    <div>
                        <label for="godzinazak"><p>Dzień zakonczenia</p></label><br>
                        <input type="date" name="koniec">
                    </div>
                </div><br>
                <div class="sala">
                    <div class="sala1">
                        <input type="radio" name="sala" id="sala1" value="6"><p>Sala 6 osobowa</p><br>
                    </div>
                    <br>
                
                    <div class="sala2">
                        <input type="radio" name="sala" id="sala2" value="10"><p>Sala 10 osobowa</p><br>
                    </div>
                    <br>
                    <div class="sala3">
                        <input type="radio" name="sala" id="sala3" value="10"><p>Sala 10 osobowa</p><br>
                    </div>
                    <div class="sala4">
                        <input type="radio" name="sala" id="sala4" value="16"><p>Sala 16 osobowa</p><br>
                    </div>
                    <div class="sala5">
                        <input type="radio" name="sala" id="sala5" value="20"><p>Sala 20 osobowa</p><br>
                    </div>
                </div>
                <br><br>
                <div class="button1">
                    <input type="submit" name="submit"  value="Wyślij" class="przycisk">
                </div>
                <?php if(isset($_SESSION['blad'])): ?>
                        <div class="error">
                            <?php
                                echo $_SESSION['blad'];
                                unset($_SESSION['blad']);
                            ?>
                        </div>
                <?php endif; ?>
            </form>
    </div>
        

    <footer style="position: absolute; bottom:0; right: 0;">Sale wynajmujemy tylko całodniowo</footer>
</body>
</html>