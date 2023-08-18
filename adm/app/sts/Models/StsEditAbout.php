<?php

namespace App\sts\Models;

class StsEditAbout
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

        if(isset($this->data["image"])){
            $image = $this->data["image"];
        }else{
            $image = false;
        }

        unset($this->data["image"]);

        $erro = true;

        if(!$image){
            $image = false;
            unset($this->data["image"]);
        }else{
            $upload = new \App\adms\Models\helper\AdmsUpload();

            $upload->upload($image, $this->data['id'], "app/sts/assets/image/about/");

            if($upload->getResult()){
                $image = true;
                $this->data['image'] = $upload->nameImage();
            }else{
                $_SESSION['msg'] = "<p class='alert-danger'>Erro: A imagem só pode ser desses tipos : jpg, jpeg, gif, png</p>";
                $erro = false;
                $this->result = false;
            }
        }

        if($erro){

            if($image){
                $noVal['image'] = $this->data['image'];
            }

            unset($this->data['image']);


            $valField = new \App\adms\Models\helper\AdmsValField(); // pega o helper para a verificacaop do campos via php

            $valField->valField($this->data); // chama o metodo do objeto

            if($valField->getResult()){

                if($image){
                    $this->data['image'] = $noVal['image'];
                }

                $this->data['modified'] = date("Y-m-d H:i:s");

                $id = $this->data['id'];

                unset($this->data['id']);

                $update = new \App\adms\Models\helper\AdmsUpdate();

                $update->exeUpdate("sts_abouts_companies", $this->data , "WHERE id=:id" , "id={$id}");

                if($update->getResult()){
                    $_SESSION['msg'] = "<p class='alert-success'>Sobre editado com sucesso!</p>";
                    $this->result = true;
                }else{
                    $_SESSION['msg'] = "<p class='alert-danger'>Erro: Sobre não editado, Tente novamente!</p>";
                    $this->result = false;
                }

            }else{
                $this->result = false;
            }

        }

    }

    public function delete($id)
    {
        $delete = new \App\adms\Models\helper\AdmsDelete();

        $delete->delete("sts_abouts_companies", "WHERE id=:id" , "id={$id}");

        if($delete->getResult()){
            $_SESSION['msg'] = "<p class='alert-success'>Sobre deletado com sucesso!</p>";
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Erro: Sobre nao deletado, Tente novamente!</p>";
            $this->result = false;
        }
    }

    public function getInfo($id)
    {
        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("sts_abouts_companies", '',"WHERE id=:id" , "id={$id}");

        $te = $select->getResult();

        return $te[0];
    }

}
