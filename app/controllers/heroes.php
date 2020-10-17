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
            $hero->id = null;
            $hero->nome = $params['nome'];
            $hero->contribuicao = $params['contribuicao'];
            $hero->descricao = $params['descricao'];

            if($hero->save())
            {
                $this->redirect('heroes', ['sucesso' => 'Heroi salvo com sucesso!']);
            } else {
                $this->view('heroes/create', ['erro' => 'Aconteceu algum erro na inserção no banco...']);
            }
        } else {
            $this->view('heroes/create', ['erros' => $erros]);
        }
    }

    public function edit($id)
    {
        $hero = Hero::find($id);
        $this->view('heroes/edit', ['hero' => $hero]);
    }

    public function update($id)
    {
        $hero = Hero::find($id);

        $params = array(
            "nome" => $_POST["nome"],
            "contribuicao" => $_POST["contribuicao"],
            "descricao" => $_POST['descricao']
        );

        $erros = array();

        if($this->validate($params, $erros))
        {
            $hero->nome = $params['nome'];
            $hero->contribuicao = $params['contribuicao'];
            $hero->descricao = $params['descricao'];

            if($hero->save())
            {
                $this->redirect('heroes', ['sucesso' => 'Heroi salvo com sucesso!']);
            } else {
                $this->view('heroes/create', ['erro' => 'Aconteceu algum erro na inserção no banco...']);
            }
        } else {
            $this->view('heroes/edit', ['hero' => $hero, 'erros' => $erros]);
        }
    }

    public function delete($id)
    {
        $hero = Hero::find($id);

        if($hero->delete()) {
            $this->redirect('heroes', ['sucesso' => 'Heroi deletado com sucesso!']);
        } else {
            $this->redirect('heroes', ['erro' => 'Não conseguimos deletar o heroi']);
        }
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