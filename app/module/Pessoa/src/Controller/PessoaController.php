<?php

namespace Pessoa\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class PessoaController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel([
            'content' => 'Placeholder page'
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