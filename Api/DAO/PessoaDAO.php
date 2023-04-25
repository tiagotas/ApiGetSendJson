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
    public function select() : array
    {
        $sql = "SELECT * FROM pessoa ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\PessoaModel");
    }

    /**
     * 
     */
    public function search(string $query) : array
    {
        $str_query = ['filtro' => '%' . $query . '%'];

        $sql = "SELECT * FROM pessoa WHERE nome LIKE :filtro ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($str_query);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\PessoaModel");
    }

    /**
     * 
     */
    public function insert(PessoaModel $m) : PessoaModel
    {
        $sql = "INSERT INTO pessoa (nome, data_nasc) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->data_nasc);
        $stmt->execute();

        $m->id = $this->conexao->lastInsertId();

        return $m;
    }

    /**
     * 
     */
    public function update(PessoaModel $m) : bool
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