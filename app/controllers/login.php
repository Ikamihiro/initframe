<?php

require APP . '/core/session.php';

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

    public function login()
    {
        $params = array(
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        );
    }
}