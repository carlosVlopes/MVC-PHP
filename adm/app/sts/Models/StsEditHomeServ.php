<?php

namespace App\sts\Models;

class StsEditHomeServ
{
    private array|null $data;

    private bool $result;

    private int $id;

    function getResult()
    {
        return $this->result;
    }

    public function create(array $data = null)
    {
        $this->data = $data;

        $this->id = 1;

        $valField = new \App\adms\Models\helper\AdmsValField(); // pega o helper para a verificacaop do campos via php

        $valField->valField($this->data); // chama o metodo do objeto

        if($valField->getResult()){

            $this->data['modified'] = date("Y-m-d H:i:s");

            $update = new \App\adms\Models\helper\AdmsUpdate();

            $update->exeUpdate("sts_homes_services", $this->data , "WHERE id=:id" , "id={$this->id}");

            if($update->getResult()){
                $_SESSION['msg'] = "<p class='alert-success'>Servicos editado com sucesso!</p>";
                $this->result = true;
            }else{
                $_SESSION['msg'] = "<p class='alert-danger'>Erro: Servicos não editado, Tente novamente!</p>";
                $this->result = false;
            }

        }else{
            $this->result = false;
        }

    }

    public function getInfo()
    {
        $id = 1;

        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("sts_homes_services", '',"WHERE id=:id" , "id={$id}");

        $te = $select->getResult();

        return $te[0];
    }

}
