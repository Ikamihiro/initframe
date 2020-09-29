<?php

require APP . 'core/model.php';
require APP . 'database/conexao.php';

class Usuario extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function autenticar($array)
    {
        $conexao = Conexao::getConexao();
        $query = $conexao->prepare("SELECT * from `usuarios` where `email`='{$array['email']}' and `password`='{$array['password']}'");

        if($query->execute())
        {
            if($query->rowCount() > 0)
            {
                $resultado = $query->fetchObject(Usuario::class);
                //$resultado = $query->fetch();
                //var_dump($resultado);
                //die();

                if($resultado)
                {
                    return $resultado;
                }
            }
        } else {
            return false;
        }
    }
}