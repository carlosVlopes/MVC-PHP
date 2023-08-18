<?php

namespace App\sts\Controllers;


/**
 * Controller da pagina visualizar conteudo do site da pagina home
 * @author Cesar <cesar@celke.com.br>
 */
class ViewMessage
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    public function index(): void
    {
        $viewMessage = new \App\sts\Models\StsViewMessage();

        $viewMessage->viewMessage();

        $this->data['messages'] = $viewMessage->getResultBd();

        $this->data['sidebarActive'] = "view-message";

        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/message/listMessage", $this->data);
        $loadView->loadViewSts();
    }
}
