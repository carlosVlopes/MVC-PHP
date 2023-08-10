<?php

namespace App\adms\Controllers;

/**
 * Controller da página visualizar usuarios
 * @author Cesar <cesar@celke.com.br>
 */
class UserProfile
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    private int|string|null $id;

    /**
     * Instantiar a classe responsável em carregar a View e enviar os dados para View.
     * 
     * @return void
     */
    public function index(): void
    {
        $this->id = $_SESSION['user_id'];

        $this->data['sidebarActive'] = "list-users";

        if($this->id){

            $viewProfile = new \App\adms\Models\AdmsViewProfile();

            $viewProfile->profile($this->id);

            if($viewProfile->getResult()){
                $this->data['user'] = $viewProfile->getResultBd();

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


    }

    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/UserProfile/viewProfile", $this->data);
        $loadView->loadView();
    }
}