<?php

namespace App\sts\Controllers;

/**
 * Controller da página novo usuário
 * @author Cesar <cesar@celke.com.br>
 */
class AddAbout
{

    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data = [];

    /** @var array $dataForm Recebe os dados do formulario */
    private array|null $dataForm;

    /**
     * Instantiar a classe responsável em carregar a View e enviar os dados para View.
     * 
     * @return void
     */
    public function index(): void
    {

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['SendAdd'])){

            if($_FILES['image']['error'] == 0){
                $this->dataForm['image'] = $_FILES['image'] ? $_FILES['image'] : null;
            }

            unset($this->dataForm['SendAdd']);

            $addAbout = new \App\sts\Models\StsAddAbout();

            $addAbout->create($this->dataForm);

            if($addAbout->getResult()){
                $urlRedirect = URLADM . "view-about/index";
                header("Location: $urlRedirect");
            }else{
                $this->data['form'] = $this->dataForm;
                $this->viewAddAbout();
            }
        }else{
            $this->viewAddAbout();
        }

    }

    private function viewAddAbout(): void
    {
        $loadView = new \Core\ConfigView("sts/Views/about/addAbout", $this->data);

        $loadView->loadView();
    }
}
