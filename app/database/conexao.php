<?php

class Conexao
{
    protected static $db;

    public function __construct() { }

    /**
     * Função que instancia uma Conexão com o Banco de Dados
     */
    private static function conectar()
    {
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        );
        self::$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Função que retorna uma instância da Conexão
     * @return PDO
     */
    public static function getConexao()
    {
        if (is_null(self::$db))
        {
            self::conectar();
        }

        return self::$db;
    }
}