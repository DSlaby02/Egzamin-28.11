<?php
    session_start();
?>
<?php

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $godzinaroz = $_POST['start'];
    $godzinazak =  $_POST['koniec'];
    $sala = $_POST['sala'];
    $id = $_SESSION['id'];
    $data= date("Y-m-d");
    
    if(strlen($imie) < 3)
    {
        $_SESSION['blad'] = "Wpisz poprawne imię";
        header('location: rezerwacja.php');
        exit();
    }

    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
    {
        $_SESSION['blad'] = "Wpisz poprawny email";
        header('location: rezerwacja.php');
        exit();
    }
    require_once "zmienne.php";
    $conn = new mysqli($host,$user,$password,$name);
    if($conn-> connect_errno!=0)
    {
        echo "Error: ",$conn->connect_errno;
    }
    else
    {

        $imie = htmlentities($imie);
        $nazwisko = htmlentities($nazwisko);
        $email = htmlentities($email);
        $telefon = htmlentities($telefon);
        $godzinaroz = htmlentities($godzinaroz);
        $godzinazak = htmlentities($godzinazak);
        $sala = htmlentities($sala);
        $data = htmlentities($data);

        $imie = $conn-> real_escape_string($imie);
        $nazwisko = $conn-> real_escape_string($nazwisko);
        $email = $conn-> real_escape_string($email);
        $telefon = $conn-> real_escape_string($telefon);
        $godzinaroz = $conn-> real_escape_string($godzinaroz);
        $godzinazak = $conn-> real_escape_string($godzinazak);
        $sala = $conn-> real_escape_string($sala);
        $data = $conn-> real_escape_string($data);

        if(isset($_POST['sala']))
        {
            $rezultat = $conn->query("SELECT * FROM sale WHERE status='niezarezerwowany' AND`typ_sali`='$sala';" );
            if($rezultat->num_rows > 0)
            {
                if($godzinaroz>=$data)
                {
                    if($godzinaroz<$godzinazak)
                    {
                        $rezultat = $conn->query("SELECT * FROM sale WHERE status='niezarezerwowany' AND`typ_sali`='$sala';");
                        $id = $rezultat->fetch_assoc()['id'];
                        $rezultat = $conn->query("INSERT INTO `rezerwacja` VALUES (NULL,'$imie','$nazwisko','$email','$telefon','$godzinaroz','$godzinazak','$id')");
                        $rezultat = $conn->query("UPDATE `sale` SET `status`='zarezerwowany' WHERE `id` = '$id'");
                        $_SESSION['show'] = "udalo";
                        header("location: index.php");
                    }
                    else
                    {
                        $_SESSION['blad'] = "Zła data zameldowania i wymeldowania";
                        header('location: rezerwacja.php');
                        exit();
                    }
                }
                else
                {
                    $_SESSION['blad'] = "Zła data zameldowania";
                    header('location: rezerwacja.php');
                    exit();
                }
            }
            else
            {
                $_SESSION['blad'] = "Brak wolnych sali";
                header('location: rezerwacja.php');
                exit();
            }
        }
        else
            {
                $_SESSION['blad'] = "Wybierz sale";
                header('location: rezerwacja.php');
                exit();
            }
    }
?>