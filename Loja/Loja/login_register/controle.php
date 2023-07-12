<?php

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $conexao =  mysqli_connect('localhost','root','');
    $db = mysqli_select_db($conexao,"store");

    $verifica = mysqli_query($conexao, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die("erro ao selecionar");
    if (mysqli_num_rows($verifica)<=0)
    {
        echo"<script language='javascript' type='text/javascript'>alert('Email e/ou password incorretos');window.location.href='index.php';</script>";
        die();
    }
    elseif(!isset($_SESSION))
    {
        session_start();
        $resultado = mysqli_fetch_assoc($verifica);
        // Salva os dados encontrados na sessão
        $_SESSION['UtilizadorID'] = $resultado['id'];
        $_SESSION['UtilizadorNome'] = $resultado['nome'];
        $_SESSION['UtilizadorEmail'] = $resultado['email'];
        $_SESSION['UtilizadorTipo'] = $resultado['tipo'];

        if($_SESSION['UtilizadorTipo'] == 1)
        {
            // Redireciona o visitante
            // header("Location: C:\\xampp\\htdocs\\Loja\\php admin crud\\php admin crud\\admin_page.php"); exit;
            header("location: ..\administrator_page\admin_page.php");
        }
        else if($_SESSION['UtilizadorTipo'] == 2)
        {
            // Redireciona o visitante
            // header("Location: C:\\xampp\\htdocs\\loja\\Home\\index.html"); exit;
            header("location: ..\Home\index.html");
        }
        else
        {   // Redireciona o visitante
            header("Location: Convidado.php"); exit;
        }
    }
?>