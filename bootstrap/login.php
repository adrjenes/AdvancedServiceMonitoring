<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Gidaszewski</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Formularz logowania</h1>
        <form method="post" action="weryfikuj.php">
            <div class="form-group">
                <label for="user">Login:</label>
                <input type="text" class="form-control" name="user" id="user" maxlength="20" size="20">
            </div>
            <div class="form-group">
                <label for="pass">Hasło:</label>
                <input type="password" class="form-control" name="pass" maxlength="20" size="20">
            </div>
            <button type="submit" class="btn btn-primary" id="button">Zaloguj się</button>
        </form>
        <br><br>
        <form method="POST" action="rejestruj.php">
            <button type="submit" class="btn btn-primary">Zarejestruj się</button>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>