<?php

require_once APP . 'core/session.php';
require_once APP . 'models/usuario.php';

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Session::init();
        if(Session::get('login') == true)
        {
            $this->redirect('login');
        }

        $this->view('admin/login');
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
            $this->redirect('login');
        } else {
            Session::init();
            Session::set('login', true);
            Session::set('emailUsuario', $result->email);
            Session::set('usuarioId', $result->id);
            Session::set('nomeUsuario', $result->nome);
            $this->redirect('admin');
        }
    }

    public function logout() 
    {
        Session::init();
        Session::destroy();
        $this->redirect('login');
    }
}