<?php

namespace App\sts\Controllers;

/**
 * Controller da página novo usuário
 * @author Cesar <cesar@celke.com.br>
 */
class EditHomeServ
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

        $editHomeServ = new \App\sts\Models\StsEditHomeServ();

        if(!empty($this->dataForm['SendEdit'])){

            unset($this->dataForm['SendEdit']);

            $editHomeServ->create($this->dataForm);

            if($editHomeServ->getResult()){
                $urlRedirect = URLADM . "view-page-home/index";
                header("Location: $urlRedirect");
            }else{
                $this->data = $editHomeServ->getInfo();
                $this->viewEditHomeServ();
            }
        }else{

            $this->data = $editHomeServ->getInfo();

            $this->viewEditHomeServ();
        }

    }

    private function viewEditHomeServ(): void
    {
        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/home/editHomeServ", $this->data);

        $loadView->loadViewSts();

    }
}
