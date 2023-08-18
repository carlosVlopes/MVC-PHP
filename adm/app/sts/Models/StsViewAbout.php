<?php

namespace App\sts\Models;



/**
 * Visualizar conteudo da pagina home
 *
 * @author Celke
 */
class StsViewAbout
{

    /** @var array|null $resultBd Recebe os registros do banco de dados */
    private array|null $resultBd;


    /**
     * @return bool Retorna os detalhes do registro
     */
    function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    

    public function viewAbout(): void
    {
        $viewAbout = new \App\adms\Models\helper\AdmsRead();
        $viewAbout->fullRead("SELECT id, title, description, image FROM sts_abouts_companies", "");

        $this->resultBd = $viewAbout->getResult();
    }
    
}
