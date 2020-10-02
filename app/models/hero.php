<?php

require_once APP . 'core/model.php';

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

    public function save()
    {
        if(is_null($this->id))
        {
            $sql = 'INSERT INTO `heroes` (`nome`, `contribuicao`, `descricao`) VALUES (:nome, :contribuicao, :descricao)';
        }
    }
}