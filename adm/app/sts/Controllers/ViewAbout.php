<?php

namespace App\sts\Controllers;


/**
 * Controller da pagina visualizar conteudo do site da pagina home
 * @author Cesar <cesar@celke.com.br>
 */
class ViewAbout
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    public function index(): void
    {
        $viewAbout = new \App\sts\Models\StsViewAbout();

        $viewAbout->viewAbout();

        $this->data['abouts'] = $viewAbout->getResultBd();

        $this->data['sidebarActive'] = "view-about";

        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/about/listAbouts", $this->data);
        $loadView->loadViewSts();
    }
}
