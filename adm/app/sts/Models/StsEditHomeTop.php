<?php

namespace App\sts\Models;

class StsEditHomeTop
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

        if(isset($this->data["image_top"])){
            $image = $this->data["image_top"];
        }else{
            $image = false;
        }

        unset($this->data["image_top"]);

        $erro = true;

        if(!$image){
            $image = false;
            unset($this->data["image_top"]);
        }else{
            $upload = new \App\adms\Models\helper\AdmsUpload();

            $upload->upload($image, $this->id, "app/sts/assets/image/home_top/");

            if($upload->getResult()){
                $image = true;
                $this->data['image_top'] = $upload->nameImage();
            }else{
                $_SESSION['msg'] = "<p class='alert-danger'>Erro: A imagem só pode ser desses tipos : jpg, jpeg, gif, png</p>";
                $erro = false;
                $this->result = false;
            }
        }

        if($erro){

            if($image){
                $noVal['image_top'] = $this->data['image_top'];
            }

            unset($this->data['image_top']);


            $valField = new \App\adms\Models\helper\AdmsValField(); // pega o helper para a verificacaop do campos via php

            $valField->valField($this->data); // chama o metodo do objeto

            if($valField->getResult()){

                if($image){
                    $this->data['image_top'] = $noVal['image_top'];
                }

                $this->data['modified'] = date("Y-m-d H:i:s");

                $update = new \App\adms\Models\helper\AdmsUpdate();

                $update->exeUpdate("sts_homes_tops", $this->data , "WHERE id=:id" , "id={$this->id}");

                if($update->getResult()){
                    $_SESSION['msg'] = "<p class='alert-success'>Top editado com sucesso!</p>";
                    $this->result = true;
                }else{
                    $_SESSION['msg'] = "<p class='alert-danger'>Erro: Top não editado, Tente novamente!</p>";
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

        $select->exeSelect("sts_homes_tops", '',"WHERE id=:id" , "id={$id}");

        $te = $select->getResult();

        return $te[0];
    }

}
