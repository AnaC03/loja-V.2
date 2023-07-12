<?php

@include 'config.php';

if(isset($_POST['add_artigos'])){

   $artigos_name = $_POST['artigos_name'];
   $artigos_category = $_POST['categoria_name'];
   $artigos_image = $_FILES['artigos_image']['name'];
   $artigos_image_tmp_name = $_FILES['artigos_image']['tmp_name'];
   $artigos_image_folder = 'uploaded_img/'.$artigos_image;

   if(empty($artigos_name) || empty($artigos_image)){
      $message[] = 'Por favor preencha todos os campos';
   }else{
      $insert = "INSERT INTO artigos(name, category, image) VALUES('$artigos_name', '$artigos_category','$artigos_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($artigos_image_tmp_name, $artigos_image_folder);
         $message[] = 'Novos Artigos adicionados com sucesso';
      }else{
         $message[] = 'Não foi possível adicionar os Artigos';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM artigos WHERE id = $id");
   header('location:admin_page.php');
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css\style.css">

</head>

<body>

    <?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>

    <div class="container">

        <div class="admin-artigos-form-container">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h3>Adicionar um novo Artigo</h3>
                <input type="text" placeholder="introduza o nome do artigo" name="artigos_name" class="box">
                <select name="categoria_name" id="category">
                    <!-- <input type="text" placeholder="introduza a categoria" name="categoria_name" class="box"> -->
                    <?php
                  // Conexão com o banco de dados
                  $conn = mysqli_connect('localhost', 'root', '', 'store');

                  // Verificação da conexão
                  if (!$conn) {
                        die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
                  }

                  // Consulta SQL para recuperar os nomes das categorias
                  $sql = 'SELECT name FROM category';
                  $result = mysqli_query($conn, $sql);

                  // Verificação de erros na consulta
                  if (!$result) {
                        die('Erro na consulta: ' . mysqli_error($conn));
                  }

                  // Loop para exibir as opções do dropdown
                  while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                  }

                ?>
                </select>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="artigos_image" class="box">
                <input type="submit" class="btn" name="add_artigos" value="Adicionar">
            </form>

        </div>

        <?php

   $select = mysqli_query($conn, "SELECT * FROM artigos");
   
   ?>
        <div class="artigos-display">
            <table class="artigos-display-table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($select)){ ?>
                <tr>
                    <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td>
                        <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i
                                class="fas fa-edit"></i> Editar </a>
                        <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i
                                class="fas fa-trash"></i> Eliminar </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</body>

<?php
   // Fechamento da conexão
   mysqli_close($conn);
?>

</html>