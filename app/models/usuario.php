<?php

require APP . '/core/model.php';
require APP . '/database/conexao.php';

class Usuario extends Model
{
    public function __construct($data)
    {
        parent::__construct();
    }

    public static function autenticar($array)
    {
        $conexao = Conexao::getConexao();
        $sql = "select * from usuario where email=:email and password=:password";
        $count = $conexao->affectedRows($sql, $array);

        if($count > 0)
        {
            return $conexao->select($sql, $array);
        }

        return false;
    }
}