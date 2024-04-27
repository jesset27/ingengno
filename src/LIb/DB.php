<?php

namespace Jesse\Ingengno\Lib;

use PDO;
use PDOException;

class DB
{

    protected PDO $connection;

    public function __construct(
        protected string $host,
        protected string $dbname,
        protected string $username,
        protected string $password,
        protected array $options = []
    ) {
        $this->connect();
    }

    protected function connect(): void
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $this->connection = new PDO($dsn, $this->username, $this->password, $this->options);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function prepare(string $abstractSql, array $values = [])
    {
        try {
            $stmt = $this->connection->prepare($abstractSql);
            foreach ($values as $key => $value) {
                $stmt->bindValue($key + 1, $value, $this->objectType($value));
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "Erro na preparação da consulta: " . $e->getMessage();
            return null;
        }
    }

    public function execute(string $sql)
    {
        try {
            return $this->connection->query($sql);
        } catch (PDOException $e) {
            echo "Erro na execução da consulta: " . $e->getMessage();
            return null;
        }
    }

    private function objectType($var)
    {
        $fieldsType = [
            "integer" => PDO::PARAM_INT,
            "string" => PDO::PARAM_STR,
            "boolean" => PDO::PARAM_BOOL,
            "double" => PDO::PARAM_STR,
            "float" => PDO::PARAM_STR
        ];
        return $fieldsType[gettype($var)];
    }

    
}
