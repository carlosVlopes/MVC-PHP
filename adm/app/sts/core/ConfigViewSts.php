<?php

namespace App\sts\core;

/**
 * Carregar as paginas da View sts
 * 
 * @author Cesar <cesar@celke.com.br>
 */
class ConfigViewSts
{
    
    /**
     * Receber o endereco da VIEW e os dados.
     * @param string $nameView Endereco da VIEW que deve ser carregada
     * @param array|string|null $data Dados que a VIEW deve receber.
     */
    public function __construct(private string $nameView, private array|string|null $data)
    {
    }

    /**
     * Carregar a VIEW.
     * Verificar se o arquivo existe, e carregar caso exista, nao existindo apresenta a mensagem de erro
     * 
     * @return void
     */
    public function loadViewSts():void
    {
        if(file_exists('app/' .$this->nameView . '.php')){
            include 'app/adms/Views/include/head.php';
            include 'app/adms/Views/include/navbar.php';
            include 'app/adms/Views/include/menu.php';
            include 'app/' .$this->nameView . '.php';
            include 'app/adms/Views/include/footer.php';
        }else{
            die("Erro - 008: Por favor tente novamente. Caso o problema persista, entre em contato o administrador " . EMAILADM);
        }
    }
}
