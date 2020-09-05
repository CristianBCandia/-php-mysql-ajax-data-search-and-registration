<?php

require '../../config.php';

use app\models\Resposta;

$resposta = new Resposta;


$nome = $_POST['nome'];
$idPergunta1 = 'idade';
$idOpcao1 = intval($_POST['idade']);
$idPergunta2 = 'convenio';
$idOpcao2 = intval($_POST['convenio']);
$idPergunta3 = 'salario';
$idOpcao3 = intval($_POST['salario']);
$idPergunta4 = 'motivo';
$idOpcao4 = intval($_POST['motivo']);


$arrayRespostas =   [
    ["nome" => $nome, "pergunta" => $idPergunta1, "opcao" => $idOpcao1],
    ["nome" => $nome, "pergunta" =>  $idPergunta2, "opcao" => $idOpcao2],
    ["nome" => $nome, "pergunta" => $idPergunta3, "opcao" => $idOpcao3],
    ["nome" => $nome, "pergunta" => $idPergunta4, "opcao" =>  $idOpcao4]
];


$resposta->inserir($arrayRespostas);
