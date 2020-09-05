<?php

namespace app\models;

class Questionario extends Modelo
{

    protected $tabela = 'questionario';


    public function carregarQuestionario()
    {

        $sql = "SELECT *
                FROM questionario 
                INNER JOIN pergunta
                ON questionario.id_questionario = pergunta.fk_questionario
                INNER JOIN opcao 
                ON pergunta.id_pergunta = opcao.fk_pergunta
                ORDER BY opcao.id_opcao";

        $conexao = Connection::connection();
        $questionario = $conexao->prepare($sql);

        $questionario->execute();

        return $questionario->fetchAll();
    }
    
    public function listarDadosPesquisa(){
        
        $sql = "SELECT resposta.nome_cliente , pergunta.descricao_pergunta 
               , opcao.descricao_opcao 
                FROM resposta INNER JOIN opcao ON resposta.fk_opcao = opcao.id_opcao
                INNER JOIN pergunta ON pergunta.id_pergunta = resposta.fk_pergunta
                ORDER BY resposta.nome_cliente";

        $conexao = Connection::connection();
        $questionario = $conexao->prepare($sql);

        $questionario->execute();

        return $questionario->fetchAll();


    }
}
