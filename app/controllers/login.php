<?php

require APP . 'core/session.php';
require APP . 'models/usuario.php';

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Session::init();
        if(Session::get('login'))
        {
            header('Location:' . ADMIN_URL);
        }

        $this->renderView('admin/login');
    }

    public function autenticar()
    {
        $params = array(
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        );

        $result = Usuario::autenticar($params);

        if(!$result)
        {
            header("Location:" . AUTH_URL);
        } else {
            Session::init();
            Session::set('login', true);
            Session::set('emailUsuario', $result->email);
            Session::set('usuarioId', $result->id);
            Session::set('nomeUsuario', $result->nome);

            header('Location:' . ADMIN_URL);
        }
    }

    public function logout() 
    {
        Session::init();
        Session::destroy();
        header("Location:" . AUTH_URL);
    }
}