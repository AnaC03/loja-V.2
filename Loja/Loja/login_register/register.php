<?php
   $ms = "";
   if (isset($_POST['guardar']))
   {
       if($_POST["nome"] == "" or $_POST["email"] == "" or $_POST["password"] == "" or $_POST["tipo"] == "")
       {
          $ms = "Existe campo por preencher";
       }
       else{
           $nome = $_POST["nome"];
           $email = $_POST["email"];
           $password = md5($_POST["password"]);
           $tipo = $_POST["tipo"];


           //conexão com o servidor e selecção da BD
           $conexao = mysqli_connect("localhost","root","");
           $bd = mysqli_select_db($conexao, "store");

           //Inserção dos dados na tabela
           $sql = "
                   INSERT INTO users(nome,email,password,tipo)
                   VALUES ('$nome','$email','$password','$tipo')";

           $inserir = mysqli_query($conexao, "$sql");

           //Configuração da mensagem
           $ms = "";
           if($conexao)
           {
               if($bd)
               {
                   if($inserir)
                   {
                       $ms = mysqli_affected_rows($conexao)." Utilizador Criado com Sucesso!";
                   }
                   else
                   {
                       $ms = "Falha na Inserção de registo";
                   }
               }
               else
               {
                   $ms = "Falha na Selecção da BD!";
               }
           }
           else
           {
               $ms = "Falha na Ligação a Servidor";
           }
           mysqli_close($conexao);
       }
   }
   $_POST["guardar"] = "";
   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="icon" type="imgage/png" href="Flor.png"/> 
</head>
<body>
    <div class="container">
        <div class="login-wrap2">
        <h2>Registo</h2>
        <form method="post">
            <div class="form-group">
            <?php  echo "$ms"?><br>
                <label for="username">Utilzador:</label>
                <input type="text" class="form-control" id="username" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            </div>
            <div class="form-group">
                <select name="tipo" id="tipo">
                    <option value="">Selecione</option>
                    <option value="2">Cliente</option>
                </select>
            </div>
            <div class="button">
            <button type="submit" class="btn btn-primary" name="guardar">Registar</button>
            </div>
        </form>
        <div class="login">
        <p>Já tem uma conta? <a href="index.php">Login</a></p>
        </div>
    </div>
</body>
</html>
