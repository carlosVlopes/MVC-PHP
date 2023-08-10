<?php

namespace App\adms\Controllers;

/**
 * Controller da página visualizar usuarios
 * @author Cesar <cesar@celke.com.br>
 */
class ViewUser
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    private int|string|null $id;

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

        if($permissions['view']){

            $this->data = $permissions;

            $this->data['sidebarActive'] = "list-users";

            if($id){

                $this->id = (int) $id;

                $viewUser = new \App\adms\Models\AdmsViewUser();

                $viewUser->list($this->id);

                if($viewUser->getResult()){
                    $this->data['user'] = $viewUser->getResultBd();

                    $this->loadView();
                }else{
                    $_SESSION['msg'] = "<p class='alert-danger'>Usuario nao encontrado!</p>";
                    $urlRedirect = URLADM . "list-users/index";
                    header("Location: $urlRedirect");
                }

            }else{
                $_SESSION['msg'] = "<p class='alert-danger'>Usuario nao encontrado!</p>";
                $urlRedirect = URLADM . "list-users/index";
                header("Location: $urlRedirect");
            }

        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Voce nao tem permissao para acessar essa pagina</p>";
            $urlRedirect = URLADM . "erro/index";
            header("Location: $urlRedirect");
        }

    }

    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/users/viewUser", $this->data);
        $loadView->loadView();
    }
}