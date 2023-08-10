<?php

namespace App\adms\Models;

class AdmsLogin
{
    private array|null $data;
    private $resultBd;
    private $result;

    function getResult(){
        return $this->result;
    }

    public function login(array $data = null)
    {
        $this->data = $data;
        //var_dump($this->data);  

        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("adms_users", '',"WHERE user = :user OR email =:email LIMIT :limit" , "user={$this->data['user']}&email={$this->data['user']}&limit=1");

        $this->resultBd = $select->getResult();

        if($this->resultBd){
            // var_dump($this->resultBd);
            $this->valPassword();
        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Erro: Usuário ou a senha incorreta!</p>";
            $this->result = false;
        }
    }

    private function valPassword()
    {
        if(password_verify($this->data['password'], $this->resultBd[0]['password'])){
            $_SESSION['user_id'] = $this->resultBd[0]['id'];

            $_SESSION['user_name'] = $this->resultBd[0]['name'];

            $_SESSION['user_nickname'] = $this->resultBd[0]['nickname'];

            $_SESSION['user_email'] = $this->resultBd[0]['email'];

            $_SESSION['user_image'] = $this->resultBd[0]['image'];

            $this->result = true;

        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Erro: Usuário ou a senha incorreta!</p>";

            $this->result = false;
        }
    }
}