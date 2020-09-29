<?php

class Model
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = Conexao::getConexao();
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
}