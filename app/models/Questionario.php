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

    public function gerearGrafico(){
        
        function buscarOpcoes(){
    
            $sql = 'SELECT opcao.descricao_opcao AS "desc" FROM opcao';
    
            $conexao = Connection::connection();
            $opcoes = $conexao->prepare($sql);
    
            $opcoes->execute();
    
            return $opcoes->fetchAll();
        }
        $opcoesBusca = buscarOpcoes();

        $dados = [];

        for($i = 0; $i < sizeof($opcoesBusca); $i++){

          
            /* $sql = "SELECT count(resposta.nome_cliente) AS '{$opcoesBusca[$i]->desc}', pergunta.id_pergunta AS 'id' FROM resposta 
            INNER JOIN pergunta 
            ON pergunta.id_pergunta = resposta.fk_pergunta
            INNER JOIN opcao
            ON opcao.id_opcao = resposta.fk_opcao
            WHERE opcao.descricao_opcao = '{$opcoesBusca[$i]->desc}'"; */

            $sql = "SELECT count(resposta.nome_cliente) as 'quantidade', pergunta.id_pergunta as 'pergunta', 
                    opcao.descricao_opcao as 'resposta' from resposta 
                    inner join pergunta 
                    on pergunta.id_pergunta = resposta.fk_pergunta
                    inner join opcao
                    on opcao.id_opcao = resposta.fk_opcao
                    WHERE opcao.descricao_opcao = '{$opcoesBusca[$i]->desc}'
                    group by pergunta.id_pergunta";

            $conexao = Connection::connection();
            $opcoes = $conexao->prepare($sql);

            $opcoes->execute();

            array_push($dados, $opcoes->fetchAll()[0]);
        }
        return $dados;
      
    }
}
