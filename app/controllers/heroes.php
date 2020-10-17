<?php

require_once APP . 'models/hero.php';
require_once APP . 'core/session.php';

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
        $this->view('heroes/index', ['heroes' => $heroes]);
    }

    public function create()
    {
        $this->view('heroes/create');
    }

    public function store()
    {
        $params = array(
            "nome" => $_POST["nome"],
            "contribuicao" => $_POST["contribuicao"],
            "descricao" => $_POST['descricao']
        );

        $erros = array();

        if($this->validate($params, $erros))
        {
            $hero = new Hero();
            $hero->nome = $params['nome'];
            $hero->contribuicao = $params['contribuicao'];
            $hero->descricao = $params['descricao'];

            if($hero->save())
            {
                $this->redirect('heroes');
            } else {
                $this->view('heroes/create', ['erro' => 'Aconteceu algum erro na inserção no banco...']);
            }
        } else {
            $this->view('heroes/create', ['erros' => $erros]);
        }
    }

    public function edit($id)
    {

    }

    private function validate($params, &$erros)
    {
        if(strlen($params['nome']) == 0)
        {
            $erros['nome'] = 'O Nome é obrigatório';
        }

        if(strlen($params['contribuicao']) == 0)
        {
            $erros['contribuicao'] = 'A Contribuição é obrigatória';
        }

        if(strlen($params['descricao']) == 0)
        {
            $erros['descricao'] = 'A Descrição é obrigatória';
        }

        if(count($erros) > 0)
        {
            return false;
        } else {
            return true;
        }
    }
}