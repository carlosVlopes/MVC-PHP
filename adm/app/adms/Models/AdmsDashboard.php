<?php

namespace App\adms\Models;

class AdmsDashboard
{
    private array|null $data;

    private array $result;

    function getResult()
    {
        return $this->result;
    }

    public function getUsers()
    {
        $getUsers = new \App\adms\Models\helper\AdmsPagination(URLADM . 'list-users/index', "adms_users");

        $getUsers->pagination(false);

        $this->result = $getUsers->getResultBd();

    }
}
