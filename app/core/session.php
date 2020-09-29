<?php

class Session
{
    /**
     * Inicializa a Sessão
     */
    public static function init()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    /**
     * Pega um dado da Sessão
     */
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    /**
     * Coloca um dado na Sessão
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function destroy()
    {
        session_destroy();
    }
}
