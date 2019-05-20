<?php

session_start();

$bandas = ["Black Keys","The Beatles","Queen","Foo Fighters"];
$categoria = "camiseta";
// $descricao = "Camiseta branca, 100% Algodão, com estampa preta.";

$preco = 55;

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Desafio PHP</title>
</head>

<div class="container">
  <div class="row">
    <div class="col-xs">
      <h1>Todos os Produtos</h1>
    </div>
  </div>
  <div class="row">
  <div class="col-md">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Categoria</th>
          <th scope="col">Preço</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><a href="produto.php">Black Keys</th>
          <td>camiseta</td>
          <td>R$ <?php echo $preco; ?></td>
        </tr>
        <tr>
          <th scope="row"><a href="produto.php">The Beatles</th>
          <td>camiseta</td>
          <td>R$ <?php echo $preco; ?></td>
        </tr>
        <tr>
          <th scope="row"><a href="produto.php">Queen</th>
          <td>camiseta</td>
          <td>R$ <?php echo $preco; ?></td>
        </tr>
        <tr>
          <th scope="row"><a href="produto.php">Foo Fighters</th>
          <td>camiseta</td>
          <td>R$ <?php echo $preco; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
<div class="col-md">
  <form action="produto.php" method="POST" id="form-cadastro" name="formulario" enctype="multipart/form-data">
    <div class="form-group ">
    

      <label for="nomeCliente">Nome</label>
      <input type="text" name="nomeCliente" class="form-control" id="nomeCliente" placeholder="">
    </div>
    <div class="form-group">
      <label for="categoria">Categoria</label>
      <select class="form-control" name="categoria" id="categoria">
        <option disabled selected>Selecione uma categoria</option>
        <option value="camiseta"><?php echo $categoria; ?></option>
        <option value="camiseta"><?php echo $categoria; ?></option>
        <option value="camiseta"><?php echo $categoria; ?></option>
        <option value="camiseta"><?php echo $categoria; ?></option>
      </select>
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input class="form-control" name="descricao" id="descricao">
    </div>
    <div class="form-group">
      <label for="quant">Quantidade</label>
      <input type="number" class="form-control" name="quant" id="quant">
    </div>
    <div class="form-group">
      <label for="valor"> Preço</label>
      <input type="number" class="form-control" name="valor" id="valor">
    </div>
    <div class='form-group'>
      <label for="imagem">Foto do produto</label>
      <input type='file' class="form-control" name="imagem" id="imagem" value='Escolher arquivo' />
    </div>
      <div class="form-group">
        <button type="submit" name='cadastro' class="btn btn-primary">Enviar</button>
      </div>

   
  </form>
</div>
</div>
  </div>
    


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
      let formulario = document.querySelector("#form-cadastro");
      let variaveis = document.querySelectorAll("input");
      let destinar = document.querySelector("button");

      formulario.onsubmit = function (event) {
        event.preventDefault();
        numeroEnviado = 0;
        for (input of variaveis) {
          if (input.value == "") {
            input.style.border = "1px solid red";
            input.setAttribute("placeholder", "Preencha os dados corretamente");
          } else {
            input.style.border = "1px solid #ccc";
            numeroEnviado++;
          }
        }
        
        if (numeroEnviado == variaveis.length) {
          document.getElementById('form-cadastro').submit();
        }
        
      }
      </script>
    
    </html>