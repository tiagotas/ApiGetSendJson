<?php

namespace Api\Controller;

use Api\Model\PessoaModel;
use Exception;


/**
 * 
 */
class PessoaController extends Controller
{
    /**
     * 
     */
    public static function salvar() : void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new PessoaModel();
            $model->id = $json_obj->Id;
            $model->nome = $json_obj->Nome;
            $model->data_nasc = $json_obj->Data_Nasc;

            $model->save();
              
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }

    /**
     * 
     */
    public static function listar() : void
    {
        try
        {
            $model = new PessoaModel();
            
            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
              
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }

    /**
     * 
     */
    public static function buscar() : void
    {
        try
        {
            $model = new PessoaModel();
            
            $q = json_decode(file_get_contents('php://input'));
            
            //fwrite(fopen("dados.json", "w"), file_get_contents('php://input'));
            
            $model->getAllRows($q);

            parent::getResponseAsJSON($model->rows);
              
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }

    /**
     * Remove uma pessoa do banco de dados.
     */
    public static function deletar() : void
    {
        try 
        {
            $id = json_decode(file_get_contents('php://input'));
            
            (new PessoaModel())->delete( (int) $id);

        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }
}