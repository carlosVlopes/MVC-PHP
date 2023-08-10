<?php

namespace App\adms\Controllers;

/**
 * Controller da pagina Dashboard
 * @author Cesar <cesar@celke.com.br>
 */
class Dashboard
{

    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    /**
     * Instantiar a classe responsavel em carregar a View e enviar os dados para View.
     * 
     * @return void
     */
    public function index():void
    {
        $getUsers = new \App\adms\Models\AdmsDashboard();

        $getUsers->getUsers();

        $this->data = $getUsers->getResult();

        $this->data['sidebarActive'] = "dashboard";

        $loadView = new \Core\ConfigView("adms/Views/dashboard/dashboard", $this->data);
        $loadView->loadView();
    }
}