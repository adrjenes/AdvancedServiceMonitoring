<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Gidaszewski</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Rejestracja</h1>

        <form method="post" action="dodaj_uzytkownika.php">
            <div class="form-group">
                <label for="user">Login:</label>
                <input type="text" class="form-control" name="user" maxlength="20" size="20">
            </div>

            <div class="form-group">
                <label for="pass">Hasło:</label>
                <input type="password" class="form-control" name="pass" maxlength="20" size="20">
            </div>

            <div class="form-group">
                <label for="pass2">Powtórz hasło:</label>
                <input type="password" class="form-control" name="pass2" maxlength="20" size="20">
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>