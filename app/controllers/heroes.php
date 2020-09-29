<?php

require APP . 'models/hero.php';
require APP . 'core/session.php';

class Heroes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth();
    }

    public function index()
    {
        $heroes = Hero::all();
        $this->renderView('heroes/index', ['heroes' => $heroes]);
    }
}