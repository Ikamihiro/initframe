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
        if(!$this->id)
        {
            $data = [
                'nome' => $this->nome,
                'contribuicao' => $this->contribuicao,
                'descricao' => $this->descricao,
            ];
            $sql = 'INSERT INTO `heroes` (`nome`, `contribuicao`, `descricao`) VALUES (:nome, :contribuicao, :descricao)';
            $stmt = $this->db->prepare($sql);

            if($stmt->execute($data)) {
                return true;
            }

            return false;
        }
    }
}