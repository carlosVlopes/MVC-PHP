<?php

namespace App\adms\Models\helper;

use PDO;

class AdmsCreate extends AdmsConn
{
    private string $table;
    private array $data;
    private string|null $result;
    private object $insert;
    private string $query;
    private object $conn;

    public function getResult():string
    {
        return $this->result;
    }

    public function exeCreate(string $table, array $data): void
    {
        $this->table = $table;

        $this->data = $data;

        $this->exeReplaceValues();

    }

    private function exeReplaceValues():void
    {
        $coluns = implode(',', array_keys($this->data));

        $values = ':' . implode(', :', array_keys($this->data));

        $this->query = "INSERT INTO {$this->table} ($coluns) VALUES ($values)";

        // var_dump($this->query);
        $this->exeInstruction();
    }

    private function exeInstruction():void
    {
        $this->connection();

        try{
            $this->insert->execute($this->data);

            $this->result = $this->conn->lastInsertId();
        }catch(PDOException $err){
            $this->result = null;
        }
    }

    private function connection():void
    {
        $this->conn = $this->connectDb();

        $this->insert = $this->conn->prepare($this->query);
    }
}
