<?php

namespace Api\DAO;

use Api\Model\PessoaModel;

/**
 * 
 */
class PessoaDAO extends DAO
{
    /**
     * 
     */
    public function __construct()
    {
        parent::__construct();       
    }

    /**
     * 
     */
    public function select()
    {
        $sql = "SELECT * FROM pessoa ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    /**
     * 
     */
    public function insert(PessoaModel $m) : bool
    {
        $sql = "INSERT INTO pessoa (nome, data_nasc) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->data_nasc);

        return $stmt->execute();
    }

    /**
     * 
     */
    public function update(PessoaModel $m)
    {
        $sql = "UPDATE pessoa SET nome=?, data_nasc=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->data_nasc);
        $stmt->bindValue(3, $m->id);

        return $stmt->execute();
    }

    /**
     * 
     */
    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}