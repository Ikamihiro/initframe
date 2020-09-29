<?php

require APP . '/database/conexao.php';

class Hero
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

    public static function all()
    {
        $conexao = Conexao::getConexao();
        $sql = 'SELECT id, nome, descricao, contribuicao FROM heroes';
        $query = $conexao->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}