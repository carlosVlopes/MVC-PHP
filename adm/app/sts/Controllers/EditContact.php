<?php

namespace App\sts\Controllers;

/**
 * Controller da página novo usuário
 * @author Cesar <cesar@celke.com.br>
 */
class EditContact
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

        $this->data['sidebarActive'] = "view-contact";

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $editContact = new \App\sts\Models\StsEditContact();

        if(!empty($this->dataForm['SendEdit'])){

            unset($this->dataForm['SendEdit']);

            $editContact->create($this->dataForm);

            if($editContact->getResult()){
                $urlRedirect = URLADM . "edit-contact/index";
                header("Location: $urlRedirect");
            }else{
                $this->data = $editContact->getInfo();

                $this->viewEditContact();
            }
        }else{

            $this->data = $editContact->getInfo();

            $this->viewEditContact();
        }

    }

    private function viewEditContact(): void
    {
        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/contact/viewContact", $this->data);

        $loadView->loadViewSts();

    }
}
