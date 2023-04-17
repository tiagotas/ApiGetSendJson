<?php

namespace Api\Model;

use Exception;

abstract class Model {

    /**
     * Propriedade que armazenará o array retornado da DAO com a listagem das pessoas.
     */
    public $rows;
    
}