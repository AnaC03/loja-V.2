*
// Conexão com o banco de dados
require_once "db_connection.php";

if (!$conn) {
    die("Falha na conexão com a base de dados: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Verifica se as senhas coincidem
    if ($password != $confirm_password) {
        echo "As passwords não coincidem!";
    } else {
        // Encripta a senha
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insere os dados no banco de dados
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            echo "Registo criado com sucesso!";
        } else {
            echo "Erro ao registrar: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);*/


//Novo código de acesso a BD****************************************************************************************Testes
   //recepção dos dados de formulario