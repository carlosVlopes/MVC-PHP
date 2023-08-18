<?php

namespace App\sts\Models;

class StsAddAbout
{
    private array|null $data;
    private $result;

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

            $upload->upload($image, 'create', "app/sts/assets/image/about/");

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

                $this->data['created'] = date("Y-m-d H:i:s");

                $create = new \App\adms\Models\helper\AdmsCreate();

                $create->exeCreate("sts_abouts_companies", $this->data);

                if($create->getResult()){
                    $_SESSION['msg'] = "<p class='alert-success'>Sobre cadastrado com sucesso!</p>";
                    $this->result = true;
                }else{
                    $_SESSION['msg'] = "<p class='alert-danger'>Erro: Sobre não cadastrado !</p>";
                    $this->result = false;
                }

            }else{
                $this->result = false;
            }

        }
    }

}
