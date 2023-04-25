<?php

namespace Api\Model;

use Api\DAO\PessoaDAO;

/**
 * A camada model é responsável por transportar os dados da Controller até a DAO e vice-versa.
 * Também é atribuído a Model a validação dos dados da View e controle de acesso aos métodos
 * da DAO.
 */
class PessoaModel extends Model
{
    /**
     * 
     */
    public $id, $nome, $data_nasc;
    
    /**
     * 
     */
    public function save()
    {
        if($this->id == null)
            return (new PessoaDAO())->insert($this);
        else
            return (new PessoaDAO())->update($this);
    }

    /**
     * 
     */
    public function getAllRows(string $query = null)
    {
        $dao = new PessoaDAO();

        $this->rows = ($query == null) ? $dao->select() : $dao->search($query);
    }

    /**
     * 
     */
    public function delete(int $id)
    {
        (new PessoaDAO())->delete($id);
    }
}