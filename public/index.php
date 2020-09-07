<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Pesquisa Bem Promotora</title>
</head>

<body>

    
    <div class="container d-flex justify-content-space-between align-items-center flex-column">
        <div class="btn-group mb-4">
    
            <button id="iniciar-pesquisa" class=" btn btn-dark mt-4 ">Iniciar</button>
            <!-------Botão do evento----------------------------------------------------------------------------------->
            <button id="lista" class=" btn btn-dark mt-4 ">Listar</button>
            <!----------#########---------------------------------------------------------------------------------->
            <button id="grafico" class="btn btn-dark mt-4">Gráfico</button>

        </div>

        <div id="container">

        </div>

        <div class="grafico-container bg-light text-muted" id="grafico-container"></div>
    
        <form id="formulario-pesquisa" name="formulario" class="form-group d-flex flex-column"></form>
            
    </div>
    <div class="container d-flex flex-column justify-content-center mt-4">
            
        <div id="sucesso" class="align-self-center w-25" role="alert">
            
        </div>
            
            
    </div>

    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
     crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
     crossorigin="anonymous"></script>
</body>

</html>