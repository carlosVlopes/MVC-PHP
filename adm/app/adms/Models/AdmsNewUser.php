<?php

namespace App\adms\Models;

class AdmsNewUser
{
    private array|null $data;
    private object $conn;
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

        if($this->data['password'] !== $this->data['r_password']){
            $_SESSION['msg'] = "<p class='alert-danger'>O campo Confirme a senha deve ser igual ao campo senha!</p>";
            $this->result = false;
        }else{

            $email = new \App\adms\Models\helper\AdmsValEmail();

            $email->valEmail($this->data['email']);

            $senha = new \App\adms\Models\helper\AdmsValPassword();

            $senha->valPassword($this->data['password']);

            if($email->getResult() and $senha->getResult()){

                if($this->vfEmailUser($this->data['email'])){

                    if($valField->getResult()){

                        $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);

                        $this->data['user'] = $this->data['email'];

                        $this->data['created'] = date("Y-m-d H:i:s");

                        $create = new \App\adms\Models\helper\AdmsCreate();

                        $create->exeCreate("adms_users", $this->data);

                        if($create->getResult()){
                            $_SESSION['msg'] = "<p class='alert-success'>Usuário cadastrado com sucesso!</p>";
                            $this->result = true;
                        }else{
                            $_SESSION['msg'] = "<p class='alert-danger'>Usuário não cadastrado, verifique os campos e tente novamente!</p>";
                            $this->result = false;
                        }

                    }else{
                        $this->result = false;
                    }
                }else{
                    $_SESSION['msg'] = "<p class='alert-danger'>Esse email já está cadastrado, tente outro!</p>";
                    $this->result = false;
                }

            }
        }

    }

    private function vfEmailUser($email) :bool
    {
        $select = new \App\adms\Models\helper\AdmsSelect();

        $select->exeSelect("adms_users", 'email,user',"WHERE email = :email OR user =:user" , "email={$email}&user={$email}");

        if($select->getResult()){
            return false;
        }else{
            return true;
        }
    }
}
