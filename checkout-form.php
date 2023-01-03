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

  <title>Celck - formulario de checkout </title>
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

  $query_products = "SELECT id, name, price, image FROM products WHERE id =:id LIMIT 1";
  $result_products = $conn->prepare($query_products);
  $result_products->bindParam(':id', $id, PDO::PARAM_INT);
  $result_products->execute();
  $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
  extract($row_product);
  ?>

  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="./image/logo/icone.png" alt="" width="72" height="72">
      <h2>Formulário de Pagamento</h2>
      <p class="lead">
        Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.
      </p>
    </div>

    <div class="row mb-5">
      <div class="col-md-8">
        <h3><?php echo $name; ?></h3>
      </div>
      <div class="col-md-4">
        <div class="mb-1 text-muted"><?php echo number_format($price, 2, ",", ".") ?></div>
      </div>
    </div>

    <hr>

    <div class="row mb-5"> 
      <div class="col-md-12">
        <h4 class="mb-3">Informções Pessoais</h4>

        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="first_name">Primeiro Nome</label>
              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Primeiro nome" autofocus required>
            </div>

            <div class="form-group col-md-6">
              <label for="last_name">Último Nome</label>
              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Último nome" required>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cpf">CPF</label>
              <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Somente número do CPF" maxlength="14" oninput="maskCPF(this)" required>
            </div>

            <div class="form-group col-md-6">
              <label for="phone">Telefone</label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefone com o DDD" maxlength="14" oninput="maskPhone(this)" required>
            </div>
          </div>

          <div class="form-group">
            <label for="email">Address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Digite o seu melhor e-mail">
          </div>
        </form>

        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="js/custom.js"></script>

</body>

</html>