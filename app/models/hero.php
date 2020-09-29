<?php

require APP . '/core/model.php';
require APP . '/database/conexao.php';

class Hero extends Model
{
    public function __construct()
    {
        parent::__construct();
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