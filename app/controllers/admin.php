<?php

require APP . '/core/session.php';

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->auth();
    }

    public function index()
    {
        $this->renderView('admin/index');
    }
}