<?php

namespace App\sts\Models;

class StsEditHomePrem
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

        if(isset($this->data["prem_image"])){
            $image = $this->data["prem_image"];
        }else{
            $image = false;
        }

        unset($this->data["prem_image"]);

        $erro = true;

        if(!$image){
            $image = false;
            unset($this->data["prem_image"]);
        }else{
            $upload = new \App\adms\Models\helper\AdmsUpload();

            $upload->upload($image, $this->id, "app/sts/assets/image/home_prem/");

            if($upload->getResult()){
                $image = true;
                $this->data['prem_image'] = $upload->nameImage();
            }else{
                $_SESSION['msg'] = "<p class='alert-danger'>Erro: A imagem só pode ser desses tipos : jpg, jpeg, gif, png</p>";
                $erro = false;
                $this->result = false;
            }
        }

        if($erro){

            if($image){
                $noVal['prem_image'] = $this->data['prem_image'];
            }

            unset($this->data['prem_image']);


            $valField = new \App\adms\Models\helper\AdmsValField(); // pega o helper para a verificacaop do campos via php

            $valField->valField($this->data); // chama o metodo do objeto

            if($valField->getResult()){

                if($image){
                    $this->data['prem_image'] = $noVal['prem_image'];
                }

                $this->data['modified'] = date("Y-m-d H:i:s");

                $update = new \App\adms\Models\helper\AdmsUpdate();

                $update->exeUpdate("sts_homes_premiums", $this->data , "WHERE id=:id" , "id={$this->id}");

                if($update->getResult()){
                    $_SESSION['msg'] = "<p class='alert-success'>Servicos Premium editado com sucesso!</p>";
                    $this->result = true;
                }else{
                    $_SESSION['msg'] = "<p class='alert-danger'>Erro: Servicos Premium não editado, Tente novamente!</p>";
                    $this->result = false;
                }

            }else{
                $this->result = false;
            }

        }

    }

    public function getInfo()
    {
        $id = 1;

        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("sts_homes_premiums", '',"WHERE id=:id" , "id={$id}");

        $te = $select->getResult();

        return $te[0];
    }

}
