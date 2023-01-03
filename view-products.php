<?php 
  $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
  
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

  <title>Celck - Visualizar produtos </title>
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
    
    $query_products = "SELECT id, name, description, price, image FROM products WHERE id =:id LIMIT 1";
    $result_products = $conn->prepare($query_products);
    $result_products->bindParam(':id', $id, PDO::PARAM_INT);
    $result_products->execute();
    $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
    extract($row_product);
    $price_rise = ($price * 0.50) + $price;
  ?>
  <div class="container">
    <h1 class="display-4 mt-5 mb-5"><?php echo $name; ?></h1>
    <div class="row">
      <div class="col-md-6">
      <img src='<?php echo "./image/$image"; ?>' class="imgSizeDefault card-img-top" alt="...">
      </div>
      <div class="col-md-6">
        <p>de R$ <?php echo number_format($price_rise, 2, ",", "."); ?></p>
        <p>por R$ <?php echo number_format($price, 2, ",", "."); ?></p>
        <p>
          <a href="checkout-form.php?id=<?php echo $id; ?>" class="btn btn-primary">
            Comprar
          </a>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-5">
        <?php echo $description; ?>
      </div>
    </div>
  </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>


