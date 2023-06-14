<?php
ini_set('display_errors', 1);
session_start();
$dbhost = "localhost";
$dbuser = "UR_NAME";
$dbpassword = "UR_PASSWORD";
$dbname = "UR_DATABASE";

$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$polaczenie) {
    echo "Błąd połączenia z MySQL." . PHP_EOL;
    echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$user = $_SESSION['who'];
$ajdi = mysqli_query($polaczenie, "SELECT id, username FROM users2 WHERE username = '$user'") or die("Błąd zapytania do bazy: $dbname");
if ($ajdi && mysqli_num_rows($ajdi) > 0) {
    $row = mysqli_fetch_assoc($ajdi);
    $id = $row['id'];
    $username = $row['username'];

    echo "<button><a href='login.php'>Wyloguj się</a></button><br><br>";
    echo "<button><a href='dodaj1.php'>Dodawanie portu</a></button><br><br>";
    echo "<button><a href='kasuj1.php'>Usuwanie portu</a></button><br><br>";
    echo "<button><a href='login.php'>Logowanie</a></button><br><br>";
    echo "<button><a href='rejestruj.php'>Rejestracja</a></button><br><br>";

    if ($username === 'admin') {
        $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny") or die("Błąd zapytania do bazy: $dbname");
    } else {
        $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny WHERE user_id = '$id'") or die("Błąd zapytania do bazy: $dbname");
    }

    $output = "<div class='table-responsive'><table class='table table-bordered table-striped'>";
    $output .= "<thead><tr><th>id</th><th>Host</th><th>Port</th><th>Stan</th><th>Errors</th></tr></thead>";
    $output .= "<tbody>";

    while ($wiersz = mysqli_fetch_array($rezultat)) {
        $id = $wiersz[0];
        $host = $wiersz[1];
        $port = $wiersz[2];
        $stann = $wiersz[4];
        $errors = $wiersz[5];
        $fp = @fsockopen($host, $port, $errno, $errstr, 30);
        $servicesNotWorking = [];
        $servicesWorking = [];
        if ($fp) {
            $servicesWorking[] = $host;
            $stan = "Ok";
            $up = mysqli_query($polaczenie, "UPDATE domeny SET stan = 'Ok' WHERE id = '$id'");
        } else {
             $servicesNotWorking[] = $host;
            $stan = "Error";
            $up = mysqli_query($polaczenie, "UPDATE domeny SET stan = 'Error' WHERE id = '$id'");
            $up2 = mysqli_query($polaczenie, "UPDATE domeny SET errors = errors + 1 WHERE id = '$id' AND stan= 'Error'");
        }
        
        $output .= "<tr><td>$id</td><td>$host</td><td>$port</td><td>$stan</td><td>$errors</td></tr>";
    }

    $output .= "</tbody></table></div>";

    echo $output;
} else {
    echo "Nie znaleziono rekordu.";
}

mysqli_close($polaczenie);
?>