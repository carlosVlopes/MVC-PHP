<?php

namespace App\sts\Controllers;

/**
 * Controller da página novo usuário
 * @author Cesar <cesar@celke.com.br>
 */
class EditHomeTop
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

        $editHomeTop = new \App\sts\Models\StsEditHomeTop();

        if(!empty($this->dataForm['SendEdit'])){

            if($_FILES['image_top']['error'] == 0){
                $this->dataForm['image_top'] = $_FILES['image_top'] ? $_FILES['image_top'] : null;
            }

            unset($this->dataForm['SendEdit']);

            $editHomeTop->create($this->dataForm);

            if($editHomeTop->getResult()){
                $urlRedirect = URLADM . "view-page-home/index";
                header("Location: $urlRedirect");
            }else{
                $this->data = $editHomeTop->getInfo();
                $this->viewEditHomeTop();
            }
        }else{

            $this->data = $editHomeTop->getInfo();

            $this->viewEditHomeTop();
        }

    }

    private function viewEditHomeTop(): void
    {
        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/home/editHomeTop", $this->data);

        $loadView->loadViewSts();

    }
}
