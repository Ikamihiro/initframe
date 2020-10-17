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

    public static  function find($id)
    {
        $conexao = Conexao::getConexao();
        $sql = 'SELECT `id`, `nome`, `descricao`, `contribuicao` FROM `heroes` WHERE `id` = :id';
        $data = ['id' => $id];
        $stmt = $conexao->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchObject('Hero');
    }

    public function save()
    {
        if(!$this->id)
        {
            $data = [
                'nome' => $this->nome,
                'contribuicao' => $this->contribuicao,
                'descricao' => $this->descricao,
            ];
            
            $sql = 'INSERT INTO `heroes` (`nome`, `contribuicao`, `descricao`) VALUES (:nome, :contribuicao, :descricao)';
            $stmt = $this->db->prepare($sql);

            return $stmt->execute($data);
        }

        $data = [
            'id' => $this->id,
            'nome' => $this->nome,
            'contribuicao' => $this->contribuicao,
            'descricao' => $this->descricao,
        ];

        $sql = 'UPDATE `heroes` SET `nome` = :nome, `contribuicao` = :contribuicao, `descricao` = :descricao WHERE `id` = :id';
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);
    }

    public function delete()
    {
        $sql = 'DELETE FROM `heroes` WHERE `id` = :id';
        $data = ['id' => $this->id];
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
}