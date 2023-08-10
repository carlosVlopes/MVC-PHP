<?php

namespace App\adms\Models\helper;

use PDO;

use PDOException;

class AdmsDelete extends AdmsConn
{
    private string $select;

    private array $values = [];

    private bool $result;

    private object $query;

    private object $conn;


    public function getResult(): bool
    {
        return $this->result;
    }

    public function delete(string $table,string|null $terms = null, string|null $parseString = null): void // fazer selecionando com campos passados no array
    {
        if(!empty($parseString)){
            parse_str($parseString,$this->values);
        }

        $this->delete = "DELETE FROM {$table}  {$terms}";

        // var_dump($this->delete);

        $this->exeInstruction();

    }


    private function exeInstruction():void
    {
        $this->connection();

        try{
            $this->exeParameter();

            $this->query->execute();

            $this->result = true;
        }catch(PDOException $err){
            $this->result = false;
        }
    }

    private function connection():void
    {
        $this->conn = $this->connectDb();

        $this->query = $this->conn->prepare($this->delete);

        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }

    private function exeParameter():void
    {
        if($this->values){
            foreach ($this->values as $link => $value){
                if(($link == 'limit') or ($link == 'offset') or ($link == 'id')){
                    $value = (int) $value;
                }
                $this->query->bindValue(":{$link}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}
