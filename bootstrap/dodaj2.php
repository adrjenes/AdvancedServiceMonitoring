<?php
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
$ajdi = mysqli_query($polaczenie, "SELECT id FROM users2 WHERE username = '$user'") or die("Błąd zapytania do bazy: $dbname");
if ($ajdi && mysqli_num_rows($ajdi) > 0) {
    $row = mysqli_fetch_assoc($ajdi);
    $id = $row['id'];
    global $id;
} else {
    echo "Nie znaleziono rekordu.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = $_POST["host"];
    $port = $_POST["port"];
    $insertQuery = "INSERT INTO domeny (host, port, user_id, stan, errors) VALUES ('$host', '$port', '$id','',0)";
    $result = mysqli_query($polaczenie, $insertQuery);

    if ($result) {
        echo 'Ok';
    } else {
        echo "Wystąpił błąd podczas dodawania adresu hosta.";
    }
}

mysqli_close($polaczenie);
?>