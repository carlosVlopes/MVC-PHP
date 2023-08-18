<?php

namespace App\sts\Models;



/**
 * Visualizar conteudo da pagina home
 *
 * @author Celke
 */
class StsViewMessage
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


    public function viewMessage(): void
    {
        $viewMessage = new \App\adms\Models\helper\AdmsRead();
        $viewMessage->fullRead("SELECT * FROM sts_contacts_msgs", "");

        $this->resultBd = $viewMessage->getResult();
    }
    
}
