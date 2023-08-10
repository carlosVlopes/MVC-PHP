<?php

namespace App\adms\Models;

class AdmsViewUser
{

    private array|null $resultBd;

    private bool $result;

    private int $id;

    function getResult(): bool
    {
        return $this->result;
    }

    function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    public function list(int $id)
    {
        $this->id = $id;

        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("adms_users", '',"WHERE id=:id LIMIT 1" , "id={$id}");

        $v = $select->getResult();

        if($select->getResult()){
            $this->resultBd = $select->getResult();

            $this->result = true;
        }else{
            $this->result = false;
        }
    }

}
