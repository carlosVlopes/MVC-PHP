<?php

namespace App\sts\Controllers;

/**
 * Controller da página novo usuário
 * @author Cesar <cesar@celke.com.br>
 */
class EditHomePrem
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
    public function index(int|string|null $id): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $editHomePrem = new \App\sts\Models\StsEditHomePrem();

        if(!empty($this->dataForm['SendEdit'])){

            if($_FILES['prem_image']['error'] == 0){
                $this->dataForm['prem_image'] = $_FILES['prem_image'] ? $_FILES['prem_image'] : null;
            }

            unset($this->dataForm['SendEdit']);

            $editHomePrem->create($this->dataForm);

            if($editHomePrem->getResult()){
                $urlRedirect = URLADM . "view-page-home/index";
                header("Location: $urlRedirect");
            }else{
                $this->data = $editHomePrem->getInfo();
                $this->viewEditHomePrem();
            }
        }else{

            $this->data = $editHomePrem->getInfo();

            $this->viewEditHomePrem();
        }

    }

    private function viewEditHomePrem(): void
    {
        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/home/editHomePrem", $this->data);

        $loadView->loadViewSts();

    }
}
