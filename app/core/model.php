<?php

require_once APP . 'database/conexao.php';

class Model
{
    private $db;
    private $atributos;

    public function __construct()
    {
        try {
            $this->db = Conexao::getConexao();
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function __set($atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
        return $this;
    }

    public function __get($atributo)
    {
        return $this->atributos[$atributo];
    }

    public function __isset($atributo)
    {
        return isset($this->atributos[$atributo]);
    }
}