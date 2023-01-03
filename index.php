<?php 
  include_once "./connection.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="image/ico/icone.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>Celck</title>
  <style>
    .imgSizeDefault {
      width: 100%;
      height: 300px;
    }
  </style>
</head>
<body>
  <?php
    include_once './menu.php';
  ?>
  <div class="container">
    <h2 class="display-4 mt-5 mb-5">Produtos</h2>
    <?php 
      $query_products = "SELECT id, name, price, image FROM products ORDER BY id ASC";
      $result_products = $conn->prepare($query_products);
      $result_products->execute();
    ?>

    <div class="row row-cols-1 row-cols-md-3">
      <?php
        // FETCH_ASSOC -> para poder imprimar atrazes do nome da coluna e n pelo id
        while($row_product = $result_products->fetch(PDO::FETCH_ASSOC)) {
          extract($row_product);
          /*echo "<img src='./image/$image'><br>";
          echo "ID: $id <br>";
          echo "Nome : $name <br>";
          echo "Preço: R$ " . number_format($price, 2, ",", ".") . "<br>";
          echo "<hr>";*/
          ?>
          
  <div class="col mb-4 text-center">
    <div class="card">
      <img src='<?php echo "./image/$image"; ?>' class="imgSizeDefault card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $name; ?></h5>
        <p class="card-text">R$ <?php echo number_format($price, 2, ",", "."); ?></p>
        <a href="view-products.php?id=<?php echo $id;?>" class="btn btn-primary">Detalhes</a>
      </div>
    </div>
  </div>

        <?php
        }
        
      ?>
    </div>
  </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>


