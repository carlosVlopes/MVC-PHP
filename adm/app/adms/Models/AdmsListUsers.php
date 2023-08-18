<?php

namespace App\adms\Models;

class AdmsListUsers
{

    private array|null $resultBd = [];

    private bool $result;

    private int $page;

    private string|null $resultPg;

    private int $limitResult = 4;

    function getResult(): bool
    {
        return $this->result;
    }

    function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    function getResultPg(): string|null
    {
        return $this->resultPg;
    }

    public function list(int $page = null)
    {
        $this->page = (int) $page ? $page : 1;

        $pagination = new \App\adms\Models\helper\AdmsPagination(URLADM . 'list-users/index', 'adms_users');

        $pagination->condition($this->page, $this->limitResult);

        $pagination->pagination();

        $this->resultPg = $pagination->getResult();

        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("adms_users", 'id,name,email',"LIMIT :limit OFFSET :offset" , "limit={$this->limitResult}&offset={$pagination->getOffset()}");

        if($select->getResult()){
            $this->resultBd = $select->getResult();

            $this->result = true;
        }else{
            $this->result = false;
        }
    }

    public function searchUser($data)
    {
        unset($data['search_user']);

        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("adms_users", 'id,name,email',"WHERE name = :name OR email = :email" , "name={$data['search_name']}&email={$data['search_email']}");

        if($select->getResult()){
            $this->resultBd = $select->getResult();

            $this->result = true;
        }else{
            $this->result = false;
        }
    }

}
