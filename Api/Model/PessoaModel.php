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
            (new PessoaDAO())->insert($this);
        else
            (new PessoaDAO())->update($this);
    }

    /**
     * 
     */
    public function getAllRows()
    {
        $this->rows = (new PessoaDAO())->select();
    }

    /**
     * 
     */
    public function delete()
    {
        (new PessoaDAO())->delete($this->id);
    }
}