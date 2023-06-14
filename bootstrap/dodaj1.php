<!DOCTYPE html>
<html>
<head>
    <title>Dodaj adres hosta</title>
    <!-- Dodaj linki do Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Dodaj adres hosta</h1>

        <form action="dodaj2.php" method="POST">
            <div class="form-group">
                <label for="host">Host:</label>
                <input type="text" class="form-control" name="host" id="host" required>
            </div>

            <div class="form-group">
                <label for="port">Port:</label>
                <input type="number" class="form-control" name="port" id="port" required>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>

    <!-- Dodaj skrypty Bootstrap JS (opcjonalne, ale mogą być przydatne) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>