<?php

namespace App\sts\Models;



/**
 * Visualizar conteudo da pagina home
 *
 * @author Celke
 */
class StsViewMessage
{
    private int $limitResult = 4;

    private int $page;


    /** @var array|null $resultBd Recebe os registros do banco de dados */
    private array|null $resultBd = [];


    /**
     * @return bool Retorna os detalhes do registro
     */
    function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    function getResultPg(): string|null
    {
        return $this->resultPg;
    }


    public function viewMessage(int $page = null): void
    {
        $this->page = (int) $page ? $page : 1;

        $pagination = new \App\adms\Models\helper\AdmsPagination(URLADM . 'view-message/index', "sts_contacts_msgs");

        $pagination->condition($this->page, $this->limitResult);

        $pagination->pagination();

        $this->resultPg = $pagination->getResult();

        $viewMessage = new \App\adms\Models\helper\AdmsRead();

        $viewMessage->fullRead("SELECT * FROM sts_contacts_msgs", "");

        $this->resultBd = $viewMessage->getResult();
    }

    public function searchMessage($data)
    {
        unset($data['search_message']);

        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("sts_contacts_msgs", '',"WHERE name = :name OR email = :email" , "name={$data['search_name']}&email={$data['search_email']}");

        if($select->getResult()){
            $this->resultBd = $select->getResult();

            $this->result = true;
        }else{
            $this->result = false;
        }
    }

}
