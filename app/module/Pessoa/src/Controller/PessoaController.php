<?php

namespace Pessoa\Controller;

use Pessoa\Model\PessoaTable;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class PessoaController extends AbstractActionController
{

    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'pessoas' => $this->table->getAll(),
        ]);
    }

    public function adicionarAction()
    {
        return new ViewModel([
            'content' => 'Placeholder page'
        ]);
    }


    public function listarAction()
    {
        return new ViewModel([
            'content' => 'Placeholder page'
        ]);
    }

    public function editarAction()
    {
        return new ViewModel([
            'content' => 'Placeholder page'
        ]);
    }

    public function deletarAction()
    {
        return new ViewModel([
            'content' => 'Placeholder page'
        ]);
    }

    public function confirmarAction()
    {
        return new ViewModel([
            'content' => 'Placeholder page'
        ]);
    }

}