<?php

namespace App\adms\Controllers;

/**
 * Controller da página novo usuário
 * @author Cesar <cesar@celke.com.br>
 */
class AddUser
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

        $checkPermissions = new \App\adms\Models\helper\AdmsValPermissions();

        $checkPermissions->valPermissions($_SESSION['user_id']);

        $permissions = $checkPermissions->getResults();

        if($permissions['add']){


            $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $this->data['sidebarActive'] = "add-user";

            if(!empty($this->dataForm['SendAddUser'])){

                unset($this->dataForm['SendAddUser']);

                $addUser = new \App\adms\Models\AdmsAddUser();

                $addUser->create($this->dataForm);

                if($addUser->getResult()){
                    $urlRedirect = URLADM . "list-users/index";
                    header("Location: $urlRedirect");
                }else{
                    $this->data['form'] = $this->dataForm;
                    $this->viewAddUser();
                }
            }else{
                if($permissions['perm']){
                    $this->data['permi'] = true;
                }else{
                    $this->data['permi'] = false;
                }

                $this->viewAddUser();
            }
        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Voce nao tem permissao para acessar essa pagina</p>";
            $urlRedirect = URLADM . "erro/index";
            header("Location: $urlRedirect");
        }
    }

    private function viewAddUser(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/users/addUser", $this->data);

        $loadView->loadView();
    }
}
