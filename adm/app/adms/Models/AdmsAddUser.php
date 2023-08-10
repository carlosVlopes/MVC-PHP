<?php

namespace App\adms\Models;

class AdmsAddUser
{
    private array|null $data;
    private $result;

    function getResult()
    {
        return $this->result;
    }

    public function create(array $data = null)
    {
        $this->data = $data;

        $valField = new \App\adms\Models\helper\AdmsValField(); // pega o helper para a verificacaop do campos via php

        $valField->valField($this->data); // chama o metodo do objeto

        $email = new \App\adms\Models\helper\AdmsValEmail();

        $email->valEmail($this->data['email']);

        $senha = new \App\adms\Models\helper\AdmsValPassword();

        $senha->valPassword($this->data['password']);

        if($email->getResult() and $senha->getResult()){

            if($this->vfEmailUser($this->data['email'], $this->data['user'])){

                if($valField->getResult()){

                    $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);

                    $this->data['created'] = date("Y-m-d H:i:s");

                    $create = new \App\adms\Models\helper\AdmsCreate();

                    $create->exeCreate("adms_users", $this->data);

                    if($create->getResult()){
                        $_SESSION['msg'] = "<p class='alert-success'>Usuário cadastrado com sucesso!</p>";
                        $this->result = true;
                    }else{
                        $_SESSION['msg'] = "<p class='alert-danger'>Erro: Usuário não cadastrado com sucesso!</p>";
                        $this->result = false;
                    }

                }else{
                    $this->result = false;
                }
            }else{
                $this->result = false;
            }

        }

    }

    private function vfEmailUser($email, $user) :bool
    {
        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("adms_users", 'email,user',"WHERE email = :email OR user =:user" , "email={$email}&user={$user}");

        $v = $select->getResult();

        if($v){
            if($v[0]['user'] === $user){
                $_SESSION['msg'] = "<p class='alert-danger'>Erro: Esse user já está cadastrado!</p>";

                return false;
            }

            if($v[0]['email'] === $email){
                $_SESSION['msg'] = "<p class='alert-danger'>Erro: Esse email já está cadastrado!</p>";

                return false;
            }
        }else{
            return true;
        }


    }
}
