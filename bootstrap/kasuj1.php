<!DOCTYPE html>
<html>
<head>
    <title>Usuń adres hosta</title>
    <!-- Dodaj link do arkusza stylów Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Usuń adres hosta</h1>

        <form action="kasuj2.php" method="POST">
            <div class="form-group">
                <label for="host">Host:</label>
                <input type="text" class="form-control" name="host" id="host" required>
            </div>

            <div class="form-group">
                <label for="port">Port:</label>
                <input type="number" class="form-control" name="port" id="port" required>
            </div>

            <button type="submit" class="btn btn-primary">Usuń</button>
        </form>
    </div>

    <!-- Dodaj skrypty Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>