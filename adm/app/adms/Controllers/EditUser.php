<?php

namespace App\adms\Controllers;

/**
 * Controller da página novo usuário
 * @author Cesar <cesar@celke.com.br>
 */
class EditUser
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
        $checkPermissions = new \App\adms\Models\helper\AdmsValPermissions();

        $checkPermissions->valPermissions($_SESSION['user_id']);

        $permissions = $checkPermissions->getResults();

        if($permissions['edit']){

            $id = (int) $id;

            $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $addUser = new \App\adms\Models\AdmsEditUser();

            if(!empty($this->dataForm['SendEditUser'])){

                if($_FILES['image']['error'] == 0){
                    $this->dataForm['image'] = $_FILES['image'] ? $_FILES['image'] : null;
                }

                unset($this->dataForm['SendEditUser']);

                $addUser->create($this->dataForm, $id);

                if($addUser->getResult()){
                    $urlRedirect = URLADM . "list-users/index";
                    header("Location: $urlRedirect");
                }else{
                    $this->data = $addUser->getInfo($id);
                    $this->viewAddUser();
                }
            }else{

                $this->data = $addUser->getInfo($id);

                unset($this->data['password']);

                if($permissions['perm']){
                    $this->data['perm'] = true;
                }else{
                    $this->data['perm'] = false;
                }

                $this->viewAddUser();
            }
        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Voce nao tem permissao para acessar essa pagina</p>";
            $urlRedirect = URLADM . "erro/index";
            header("Location: $urlRedirect");
        }
    }

    public function editPass(int|string|null $id)
    {
        $checkPermissions = new \App\adms\Models\helper\AdmsValPermissions();

        $checkPermissions->valPermissions($_SESSION['user_id']);

        $permissions = $checkPermissions->getResults();

        if($permissions['edit']){

            $id = (int) $id;

            $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $addPass = new \App\adms\Models\AdmsEditUser();

            if(!empty($this->dataForm['SendEditPass'])){

                unset($this->dataForm['SendEditPass']);

                $addPass->editPassword($this->dataForm, $id);

                if($addPass->getResultPass()){
                    $urlRedirect = URLADM . "list-users/index";
                    header("Location: $urlRedirect");
                }else{
                    $loadView = new \Core\ConfigView("adms/Views/users/editPass", $this->data);

                    $loadView->loadView();
                }
            }else{
                $this->data['id'] = $id;

                $loadView = new \Core\ConfigView("adms/Views/users/editPass", $this->data);

                $loadView->loadView();
            }
        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Voce nao tem permissao para acessar essa pagina</p>";
            $urlRedirect = URLADM . "erro/index";
            header("Location: $urlRedirect");
        }
    }

    public function delete(int|string|null $id)
    {
        $checkPermissions = new \App\adms\Models\helper\AdmsValPermissions();

        $checkPermissions->valPermissions($_SESSION['user_id']);

        $permissions = $checkPermissions->getResults();

        if($permissions['delete']){

            $id = (int) $id;

            $delete = new \App\adms\Models\AdmsEditUser();

            $delete->delete($id);

            $urlRedirect = URLADM . "list-users/index";
            header("Location: $urlRedirect");


        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Voce nao tem permissao para acessar essa pagina</p>";
            $urlRedirect = URLADM . "erro/index";
            header("Location: $urlRedirect");
        }
    }

    private function viewAddUser(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/users/editUser", $this->data);

        $loadView->loadView();
    }
}
