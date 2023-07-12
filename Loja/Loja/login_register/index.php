<?php/*
// Conexão com o banco de dados
require_once "db_connection.php";

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta no banco de dados
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            echo "Login bem-sucedido!";
        } else {
            echo "Password incorreta!";
        }
    } else {
        echo "Utilziador não foi encontrado!";
    }
}

mysqli_close($conn);*/



//Codigo de acesso login*******************************************A chamar o validador Controle.php****************************************************

?>

<!DOCTYPE html>
<html>
<head>
    <title>Loja Servilusa</title>
    <link rel="icon" type="imgage/png" href="Flor.png"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="login-wrap">
        <h2>Login</h2>
        <form method="post" action="controle.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="button">
            <button type="submit" class="btn btn-primary">Entrar<a href="Loja\Home\index.html"></a></button>
            </div>
        </form>
        <div class="register">
        <p>Não tem uma conta? <a href="register.php">Registre-se</a></p>
        </div>
    </div>
</div>
</body>
</html>