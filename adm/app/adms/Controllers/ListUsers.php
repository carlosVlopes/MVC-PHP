<?php

namespace App\adms\Controllers;

/**
 * Controller da página listar usuarios
 * @author Cesar <cesar@celke.com.br>
 */
class ListUsers
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    private string|int|null $page;

    /**
     * Instantiar a classe responsável em carregar a View e enviar os dados para View.
     *
     * @return void
     */
    public function index(string|int|null $page = null): void
    {

        $this->page = (int) $page ? $page : 1;

        $checkPermissions = new \App\adms\Models\helper\AdmsValPermissions();

        $checkPermissions->valPermissions($_SESSION['user_id']);

        $this->data['permissions'] = $checkPermissions->getResults();

        $listUsers = new \App\adms\Models\AdmsListUsers();

        $listUsers->list($this->page);

        if($listUsers->getResult()){
            $this->data['listUsers'] = $listUsers->getResultBd();

            $this->data['pagination'] = $listUsers->getResultPg();
        }else{
            $this->data['listUsers'] = [];
        }

        $this->data['sidebarActive'] = "list-users";

        $loadView = new \Core\ConfigView("adms/Views/users/listUsers", $this->data);
        $loadView->loadView();

    }
}