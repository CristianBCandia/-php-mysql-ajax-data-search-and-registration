<?php

namespace app\models;

class Resposta extends Modelo
{

    protected $tabela = 'resposta';

    public function inserir($respostas)
    {

        for($i = 0; $i < 4; $i++){

            $sql = "INSERT INTO resposta (nome_cliente, fk_pergunta, fk_opcao) values (?, ?, ?)";
    
            $conexao = Connection::connection();
        
            $inserir = $conexao->prepare($sql);
    
            $inserir->bindValue(1, $respostas[$i]["nome"]);
            $inserir->bindValue(2, $respostas[$i]["pergunta"]);
            $inserir->bindValue(3, $respostas[$i]["opcao"]);

            $inserir->execute();
        }
        
            
        return $conexao->lastInsertId();
    }
}
