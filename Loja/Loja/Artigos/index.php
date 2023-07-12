<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Servilusa</title>
    <link rel="icon" type="imgage/png" href="img/Flor.png" />
    <!--Link do Css-->
    <link rel="stylesheet" href="css/style.css">
    <!--Icons de caixa-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>
        <!--Cabeçalho-->
        <nav class="navbar">
            <div class="logo"><img src="img/Servilusa.ico" alt="Logo Servilusa"></div>
            <ul class="menu">
                <li><a
                        href="file:///c%3A/Users/acunha/OneDrive%20-%20Servilusa%2C%20Agencias%20Funer%C3%A1rias%20SA/Ambiente%20de%20Trabalho/Loja/Home/index.html">Página
                        Inicial</a></li>
                <li><a href="" class="active">Artigos</a></li>
                <li><a href="">Histórico</a></li>
                <li><a
                        href="file:///C:/Users/acunha/OneDrive%20-%20Servilusa%2C%20Agencias%20Funer%C3%A1rias%20SA/Ambiente%20de%20Trabalho/Loja/Contactos/index2.html">Contactos</a>
                </li>
                <i class='bx bx-cart' id="Cart-Icon"></i>
            </ul>
            <div class="cart">
                <h2 class="cart-title">Seu Carrinho</h2>
                <!--Artigo-->
                <div class="cart-content">
                </div>
                <!--Separador-->
                <div class="line"></div>
                <!--Botão de Finalizar Compra-->
                <button type="button" class="btn-buy">Finalizar</button>
                <!--Finalizar Carrinho-->
                <i class='bx bx-x' id="close-cart"></i>
            </div>
            </div>
    </header>
</body>
<!--Loja-->
<section class="shop container">
    <h2 class="section-title">Materiais</h2>
    <div class="shop-content">
        <?php
        // Conexão com o banco de dados
        $conn = mysqli_connect('localhost', 'root', '', 'store');

        // Verificação da conexão
        if (!$conn) {
            die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
        }

        // Consulta SQL para recuperar os produtos
        $sql = 'SELECT id, name, image FROM artigos WHERE category="Materiais"';
        $result = mysqli_query($conn, $sql);

        // Verificação de erros na consulta
        if (!$result) {
            die('Erro na consulta: ' . mysqli_error($conn));
        }

        // Loop para exibir os produtos
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product-box">';
            echo '<img src="..\administrator_page\uploaded_img\\' . $row['image'] . '" alt="" class="product-img">';
            echo '<h3 class="product-title">' . $row['name'] . '</h3>';
            echo '<i class="bx bx-cart add-cart"></i>';
            echo '</div>';
        }

        // Fechamento da conexão
        mysqli_close($conn);
    ?>
    </div>
    <h2 class="section-title">Impressoras</h2>
    <div class="shop-content">
        <?php
        // Conexão com o banco de dados
        $conn = mysqli_connect('localhost', 'root', '', 'store');

        // Verificação da conexão
        if (!$conn) {
            die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
        }

        // Consulta SQL para recuperar os produtos
        $sql = 'SELECT id, name, image FROM artigos WHERE category="Impressoras"';
        $result = mysqli_query($conn, $sql);

        // Verificação de erros na consulta
        if (!$result) {
            die('Erro na consulta: ' . mysqli_error($conn));
        }

        // Loop para exibir os produtos
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product-box">';
            echo '<img src="..\administrator_page\uploaded_img\\' . $row['image'] . '" alt="" class="product-img">';
            echo '<h3 class="product-title">' . $row['name'] . '</h3>';
            echo '<i class="bx bx-cart add-cart"></i>';
            echo '</div>';
        }

        // Fechamento da conexão
        mysqli_close($conn);
    ?>
    </div>
</section>

<div class="spacefooter"></div>
<!--Link para o JS-->
<script src="js/main.js"></script>
<!-- Rodapé -->
<div class="footer-cta pt-5 pb-5">
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2023, All Right Reserved <a
                                href="https://www.servilusa.pt/pt?gclid=EAIaIQobChMI6tiLz4yL_wIVbp9oCR2CtABeEAAYASAAEgLH1fD_BwE">Servilusa</a>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                </div>
            </div>
        </div>
    </div>
    </body>

</html>