<?php

namespace app\models;

abstract class Modelo
{

    protected $connection;

    public function __construct()
    {

        $this->connection = Connection::connection();
    }
}
