<?php

namespace App\sts\Controllers;

/**
 * Controller da página novo usuário
 * @author Cesar <cesar@celke.com.br>
 */
class EditAbout
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

        $editAbout = new \App\sts\Models\StsEditAbout();

        if(!empty($this->dataForm['SendEdit'])){

            if($_FILES['image']['error'] == 0){
                $this->dataForm['image'] = $_FILES['image'] ? $_FILES['image'] : null;
            }

            unset($this->dataForm['SendEdit']);

            $editAbout->create($this->dataForm);

            if($editAbout->getResult()){
                $urlRedirect = URLADM . "view-about/index";
                header("Location: $urlRedirect");
            }else{
                $this->data = $editAbout->getInfo($id);
                $this->viewEditAbout();
            }
        }else{

            $this->data = $editAbout->getInfo($id);

            $this->viewEditAbout();
        }

    }

    public function delete($id)
    {
        $id = (int) $id;

        $delete = new \App\sts\Models\StsEditAbout();

        $delete->delete($id);

        $urlRedirect = URLADM . "view-about/index";
        header("Location: $urlRedirect");
    }

    private function viewEditAbout(): void
    {
        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/about/editAbout", $this->data);

        $loadView->loadViewSts();

    }
}
