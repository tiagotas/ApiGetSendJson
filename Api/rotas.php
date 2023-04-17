<?php

use Api\Controller\PessoaController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) 
{
    /**
     * Método: POST
     * Exemplo: http://10.0.2.2/pessoa/salvar
     */
    case '/pessoa/salvar':
        PessoaController::salvar();
    break;

    /**
     * Método GET
     * Exemplo de Acesso: http://10.0.2.2/pessoa
     */
    case '/pessoa':
        PessoaController::listar();
    break;

    /**
     * Método GET
     * Exemplo de Acesso: http://10.0.2.2/pessoa/deletar?id=1
     */
    case '/pessoa/deletar':
        PessoaController::deletar();
    break;  
    
    /**
     * Rota não indentificada
     */ 
    default:
        http_response_code(403);
    break;
}