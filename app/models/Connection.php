<?php

namespace app\models;

use PDO;
use PDOException;

class Connection
{

    static public function connection()
    {

        $pdo = null;

        if ($pdo == null) {

            try {

                $pdo = new PDO('mysql:host=localhost;dbname=db_promotora_pesquisa', 'root', '');
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {

                echo "Erro ao conectar com o banco: " . $e->getMessage();
            }

            return $pdo;
        }
    }
}
