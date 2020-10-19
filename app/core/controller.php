<?php

class Controller
{
    public $db = null;
    public $model = null;

    public function __construct() 
    {
        // Construtor
    }

    protected function auth()
    {
        Session::init();
        if(Session::get('login') == false)
        {
            Session::destroy();
            header("Location:" . AUTH_URL);
            exit;
        }
    }

    public function view($view, $array = null)
    {
        ob_start();

        if (!is_null($array))
        {
            foreach ($array as $var => $value)
            {
                ${$var} = $value;
            }
        }

        require APP . 'views/_templates/header.php';
        require APP . 'views/' . $view . '.php';
        require APP . 'views/_templates/footer.php';

        ob_flush();
    }

    public function redirect($route, $array = null)
    {
        ob_start();
        // Se for especificada uma rota
        // o sistema irá direcionar o usuário a ela
        if(!is_null($route))
        {
            if (!is_null($array))
            {
                Session::init();
                foreach ($array as $var => $value)
                {
                    Session::set($var, $value);
                }
            }

            header('Location:' . URL_BASE . $route);
        } else {
            // Se não for especificada, redireciona para
            // a rota raiz do sistema
            header('Location:' . URL_BASE);
        }

        ob_flush();
    }
}