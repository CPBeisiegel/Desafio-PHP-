<?php

session_start();


// variaveis PHP para pegar informações por POST

$name = $_POST['nomeCliente'];
$categoria = $_POST["categoria"];
$descricao = $_POST["descricao"];
$quantidade = $_POST["quant"];
$preco = $_POST["valor"];
$imagem = $_FILES["imagem"];

$erros=[];
// 
// var_dump($_FILES);

$extensoesAceitas = ["text/plan", "image/png"]; 

$nomeArquivo = $_FILES["imagem"]["name"];

$arquivoTmp = $_FILES["imagem"]["tmp_name"];

$extensoesArquivo = $_FILES['imagem']['type'];

$localSave = "download/$nomeArquivo"; 

if($_FILES['imagem']['error'] != UPLOAD_ERR_OK){
    echo "Deu certo no envio do arquivo";
    exit;
}
elseif (!array_search($extensoesArquivo,$extensoesAceitas)){
    echo "Exensão do arquivo invalida";
    exit;
}    

move_uploaded_file($arquivoTmp,$localSave);



function salvarCompra($novaCompra){
    if(!file_exists('compras.json')){
        $compras["listaCompras"] = $novaCompra;
        $jsonCompras = json_encode($compras);
        file_put_contents('compras.json', $jsonCompras);
        echo "<script>alert( 'Compra salva com sucesso!')</script>";
         
    } else {
         
         $jsonCompras = file_get_contents('compras.json');
         $listaCompras = json_decode($jsonCompras, TRUE);
         $listaCompras["listaCompras"][] = $novaCompra;

         
         $jsonListaCompras = json_encode($listaCompras);
         file_put_contents('compras.json',$jsonListaCompras);
         echo "<script>alert( 'Compra salva com sucesso!')</script>";
        }
        
        if($_SESSION['produtos']) {
            $_SESSION["produtos"][] = $novaCompra;
        } else {
            $_SESSION['produtos'] = [];
            $_SESSION["produtos"][] = $novaCompra;
        
        }
 }


salvarCompra([$name, $categoria, $descricao, $quantidade, $preco, $imagem]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>Document</title>
</head>
    <body>
     
    <div> 
       <p><a href="teste.php">Voltar para a lista de produtos</a></p>
    </div>
        <div class="container">
    <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
    
        <div class="col-md-4">
        <img src="imagens/camisetaB.jpg" class="card-img" alt="..." style="max-width:100%">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h1 class="card-title">The Beatles</h1>

            <h5 class="card-text">Categoria</h5>
            <p class="card-text">camiseta</p>

            <h5 class="card-text">Descrição</h5>
            <p class="card-text">Camiseta branca, 100% Algodão, com estampa preta.</p>

            <h5 class="card-text">Quantidade em estoque</h5>
            <p class="card-text"><?php echo $quantidade?></p>

            <h5 class="number">Preço</h5>
            <p class=""><?php echo "R$".$preco ?></p>
            
            
            <p class="card-text"><small class="text-muted"></small></p>
        </div>
        </div>

 
    </div>

    </div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>