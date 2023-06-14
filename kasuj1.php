<!DOCTYPE html>
<html>
<head>
    <title>Usuń adres hosta</title>
</head>
<body>
    <h1>Usuń adres hosta</h1>

    <form action="kasuj2.php" method="POST">
        <label for="host">Host:</label>
        <input type="text" name="host" id="host" required><br><br>

        <label for="port">Port:</label>
        <input type="number" name="port" id="port" required><br><br>

        <input type="submit" value="Usuń">
    </form>
</body>
</html>