<?php

require APP . '/core/session.php';

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();

        Session::init();
        if(!Session::get('login'))
        {
            Session::destroy();
            header("Location:" . AUTH_URL);
            exit;
        }
    }

    public function index()
    {
        $this->renderView('admin/index');
    }
}