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

    private string|int|null $page;

    public function index(string|int|null $page = null): void
    {
        $this->page = (int) $page ? $page : 1;

        $viewMessage = new \App\sts\Models\StsViewMessage();

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $this->data['error'] = false;

        if(!empty($this->dataForm['search_message'])){

            $viewMessage->searchMessage($this->dataForm);

            $this->data['messages'] = $viewMessage->getResultBd();

            if($this->data['messages']){

                $this->data['pagination'] = '';

                $this->loadView();

            }else{
                $this->data['error'] = true;
            }

            $this->data['messages'] = [];
            $this->data['pagination'] = '';
        }else{

            $viewMessage->viewMessage($this->page);

            $this->data['messages'] = $viewMessage->getResultBd();

            $this->data['pagination'] = $viewMessage->getResultPg();

        }
        $this->data['sidebarActive'] = "view-message";

        $this->loadView();
    }

    public function loadView()
    {
        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/message/listMessage", $this->data);
        $loadView->loadViewSts();
    }
}
