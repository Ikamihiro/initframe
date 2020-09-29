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
        if(!Session::get('login'))
        {
            Session::destroy();
            header("Location:" . AUTH_URL);
            exit;
        }
    }

    public function renderView($view, $array = null)
    {
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
    }
}