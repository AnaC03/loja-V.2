<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_artigos'])){

   $artigos_name = $_POST['artigos_name'];
   $artigos_image = $_FILES['artigos_image']['name'];
   $artigos_image_tmp_name = $_FILES['artigos_image']['tmp_name'];
   $artigos_image_folder = 'uploaded_img/'.$artigos_image;

   if(empty($artigos_name) || empty($artigos_image)){
      $message[] = 'Por favor preencha todos!';    
   }else{

      $update_data = "UPDATE artigos SET name='$artigos_name', image='$artigos_image'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($artigos_image_tmp_name, $artigos_image_folder);
         header('location:admin_page.php');
      }else{
         $$message[] = 'por favor preencha todos!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
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


<div class="admin-artigos-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM artigos WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Atualizar os artigos</h3>
      <input type="text" class="box" name="artigos_name" value="<?php echo $row['name']; ?>" placeholder="introduza o nome do artigo">
      <input type="file" class="box" name="artigos_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="Atualizar" name="update_artigos" class="btn">
      <a href="admin_page.php" class="btn">Voltar!</a>
   </form>

   <?php }; ?>

   

</div>

</div>

</body>
</html>