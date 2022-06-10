<?php

namespace Pessoa\Form;

use Zend\Form\Form;

class PessoaForm extends Form
{
    
    public function __construct() {
        parent::__construct('pessoa', []);

        $this->add( new \Zend\Form\Element\Hidden('id'));
        $this->add( new \Zend\Form\Element\Text('nome'))->setLabel('Nome');
        $this->add( new \Zend\Form\Element\Text('sobrenome'))->setLabel('Sobrenome');
        $this->add( new \Zend\Form\Element\Email('email'))->setLabel('Email');
        $this->add( new \Zend\Form\Element\Checkbox('status'))->setLabel('Status');

        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setAttributes(['value' => 'Salvar', 'id' => 'submitbutton']);
        $this->add($submit);
        
    }

}