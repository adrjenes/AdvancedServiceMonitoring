<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
    $user = $_POST['user']; 
    $pass = $_POST['pass']; 
    $pass2 = $_POST['pass2']; 

    $link = mysqli_connect('localhost', 'UR_NAME', 'UR_PASSWORD', 'UR_DATABASE'); 
    if(!$link) {
        echo "Błąd: " . mysqli_connect_errno() . " " . mysqli_connect_error();
    } else {
        mysqli_query($link, "SET NAMES 'utf8'");

        // Sprawdzenie, czy istnieje już użytkownik o tym samym username
        $checkQuery = "SELECT * FROM users2 WHERE username = '$user'";
        $result = mysqli_query($link, $checkQuery);
        if(mysqli_num_rows($result) > 0) {
            echo "Użytkownik o takim username już istnieje";
        } else {
            // Dodanie użytkownika do bazy danych
            $sql = "INSERT INTO users2 (`username`, `password`) VALUES ('$user', '$pass')";
            if ($link->query($sql) === TRUE && $pass === $pass2) {
                echo "Dodano użytkownika<br>";
                echo "<a href='login.php'>" . "Zaloguj się" . "</a>";
            } else {
                echo "Niezgodność haseł lub błąd połączenia z bazą danych.";
            }
        }
    }

    mysqli_close($link);
?>
</BODY>
</HTML>







