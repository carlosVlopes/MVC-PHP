<?php

namespace Core;

// Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
if (!defined('C7E3L8K9E5')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Configurações básicas do site.
 *
 * @author Cesar <cesar@celke.com.br>
 */

abstract class Config
{

    /**
     * Possui as constantes com as configurações.
     * Configurações de endereço do projeto.
     * Página principal do projeto.
     * Credenciais de acesso ao banco de dados
     * E-mail do administrador.
     * 
     * @return void
     */
    protected function config(): void
    {
        //URL do projeto
        define('URL', 'http://192.168.30.15/estudo/carlos/celke/');
        define('URLADM', 'http://192.168.30.15/estudo/carlos/celke/adm/');

        define('CONTROLLER', 'Home');
        define('CONTROLLERERRO', 'Erro');

        //Credenciais do banco de dados
        define('HOST', '192.168.30.15');
        define('USER', 'carlos');
        define('PASS', 'Ac4rl0s??ss10n');
        define('DBNAME', 'carlos_teste');
        define('PORT', 3306);

        define('EMAILADM', 'cesar@celke.com.br');
    }
}
