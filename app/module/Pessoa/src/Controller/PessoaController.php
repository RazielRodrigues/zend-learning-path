<?php

namespace Pessoa\Controller;

use Pessoa\Form\PessoaForm;
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

        $form = new \Pessoa\Form\PessoaForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return new ViewModel([
                'form' => $form
            ]);
        }

        $pessoa = new \Pessoa\Model\Pessoa();
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return new ViewModel([
                'form' => $form
            ]);
        }

        $pessoa->exchangeArray($form->getData());
        $this->table->save($pessoa);

        return $this->redirect()->toRoute('pessoa');
    }

    public function editarAction()
    {   
        $id = (int) $this->params()->fromRoute('id', 0);
        if ( 0 === $id ) {
            return $this->redirect()->toRoute('pessoa', ['action' => 'adicionar']);
        }
        try {
            $pessoa = $this->table->getById($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('pessoa', ['action' => 'index']);
        }
        $form = new PessoaForm();
        $form->bind($pessoa);
        $form->get('submit')->setAttribute('value', 'Editar');
        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];
        if (!$request->isPost()) {
            return $viewData;
        }

        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return $viewData;
        }

        $this->table->save($form->getData());

        return $this->redirect()->toRoute('pessoa');


    }

    public function deletarAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('pessoa');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');
            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $this->table->delete($id);
            }

            return $this->redirect()->toRoute('pessoa');
        }

        return [
            'id'    => $id,
            'pessoa' => $this->table->getById($id)
        ];
    }

}