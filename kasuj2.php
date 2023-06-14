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
$ajdi = mysqli_query($polaczenie, "SELECT id, username FROM users2 WHERE username = '$user'") or die("Błąd zapytania do bazy: $dbname");
if ($ajdi && mysqli_num_rows($ajdi) > 0) {
    $row = mysqli_fetch_assoc($ajdi);
    $id = $row['id'];
    $username = $row['username'];
} else {
    echo "Nie znaleziono rekordu.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = $_POST["host"];
    $port = $_POST["port"];

    if ($username === 'admin') {
        $deleteQuery = "DELETE FROM domeny WHERE host = '$host' AND port = '$port'";
    } else {
        $deleteQuery = "DELETE FROM domeny WHERE host = '$host' AND port = '$port' AND user_id = '$id'";
    }

    $result = mysqli_query($polaczenie, $deleteQuery);

    if ($result) {
        header('Location: index1.php');
    } else {
        echo "Wystąpił błąd podczas usuwania adresu hosta.";
    }
}

mysqli_close($polaczenie);
?>