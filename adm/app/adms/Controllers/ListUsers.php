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

    private array|null $dataForm;

    /**
     * Instantiar a classe responsável em carregar a View e enviar os dados para View.
     *
     * @return void
     */
    public function index(string|int|null $page = null): void
    {
        $listUsers = new \App\adms\Models\AdmsListUsers();

        $checkPermissions = new \App\adms\Models\helper\AdmsValPermissions();

        $checkPermissions->valPermissions($_SESSION['user_id']);

        $this->data['permissions'] = $checkPermissions->getResults();

        $this->page = (int) $page ? $page : 1;

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $this->data['error'] = false;

        if(!empty($this->dataForm['search_user'])){

            $listUsers->searchUser($this->dataForm);

            $this->data['listUsers'] = $listUsers->getResultBd();

            if($this->data['listUsers']){

                $this->data['pagination'] = '';

                $this->loadView();

            }else{
                $this->data['error'] = true;
            }

            $this->data['listUsers'] = [];
            $this->data['pagination'] = '';
        }else{

            $listUsers->list($this->page);

            if($listUsers->getResult()){
                $this->data['listUsers'] = $listUsers->getResultBd();

                $this->data['pagination'] = $listUsers->getResultPg();
            }else{
                $this->data['listUsers'] = [];
                 $this->data['pagination'] = '';
            }
        }


        $this->data['sidebarActive'] = "list-users";

        $this->loadView();

    }

    public function loadView()
    {
        $loadView = new \Core\ConfigView("adms/Views/users/listUsers", $this->data);
        $loadView->loadView();
    }
}