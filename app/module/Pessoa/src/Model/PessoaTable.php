<?php

namespace Pessoa\Model;

use Pessoa\Model\Pessoa;
use Zend\Router\Exception\RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class PessoaTable {
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getAll()
    {
        return $this->tableGateway->select();
    }

    public function getById($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }
    
    public function save(Pessoa $pessoa)
    {
        $data = [
            'id' => $pessoa->getId(),
            'nome' => $pessoa->getNome(),
            'sobrenome' => $pessoa->getSobrenome(),
            'email' => $pessoa->getEmail(),
            'status' => $pessoa->getStatus(),
        ];

        $id = (int) $pessoa->getId();
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data, ['id' => $id]);

    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

}