<?php

namespace Sts\Controllers;



/**
 * Controller da página Home
 *
 * @author Cesar <cesar@celke.com.br>
 */
class Home
{
    
    /** @var array|string|null $dados Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    /**
     * Instanciar a MODELS e receber o retorno
     * Instantiar a classe responsável em carregar a View e enviar os dados para View.
     * 
     * @return void
     */
    public function index(): void
    {
        $home = new \Sts\Models\StsHome();
        $this->data['home'] = $home->index();  

        $footer = new \Sts\Models\StsFooter();
        $this->data['footer'] = $footer->index();  
        
        $loadView= new \Core\ConfigView("sts/Views/home/home", $this->data);
        $loadView->loadView();
    }
}