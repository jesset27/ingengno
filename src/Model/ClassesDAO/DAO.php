<?php

namespace Jesse\Ingengno\Model\ClassesDAO;

use Jesse\Ingengno\Lib\DB;

abstract class DAO
{

    protected string $table = "";

    public function __construct(
        protected DB $DB
    ) {
    }

    public function get(int $id)
    {
        if ($id === null || empty($id) || gettype($id) != "integer") {
            throw new \InvalidArgumentException("ID inválido para busca na tabela {$this->table}");
        }

        return $this->DB->prepare("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch(\PDO::FETCH_ASSOC);
    }

    public function create(object $object)
    {
        $attributes = get_object_vars($object);
        $values = array_values($attributes);
        $fields = implode(', ', array_keys($attributes));
        $placeholders = implode(', ', array_fill(0, count($values), '?'));
        var_dump($attributes);
        echo "<br>";
        var_dump($values);
        echo "<br>";
        var_dump($fields);
        echo "<br>";
        var_dump($placeholders);

        $stmt = $this->DB->prepare(
            "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})"
        );
        for ($i = 0; $i < count($values); $i++) {
            $stmt->bindValue($i + 1, $values[$i]);
        }
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
    public function delete(int $id)
    {
        $stmt = $this->DB->prepare("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        return $stmt->rowCount() > 0;
    }

    public function find(array $data)
    {
        $attributes = [];
        $values = [];
        foreach ($data as $key => $value) {
            if ($value !== null && !empty($value)) {
                $attributes[] = "$key = ?";
                $values[] = $value;
            }
        }

        if (empty($values)) {
            return false;
        }

        $conditions = implode(" AND ", $attributes);
        $stmt = $this->DB->prepare("SELECT * FROM {$this->table} WHERE {$conditions}", $values);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update(array $data)
    {
        if (!isset($data['id']) || empty($data['id']) || gettype($data['id']) != "integer") {
            throw new \InvalidArgumentException("ID inválido para atualização na tabela {$this->table}");
        }

        $attributes = [];
        $values = [];
        foreach ($data as $key => $value) {
            if ($key !== 'id') {
                $attributes[] = "$key = ?";
                $values[] = $value;
            }
        }
        $values[] = $data['id'];

        $setFields = implode(", ", $attributes);
        $stmt = $this->DB->prepare("UPDATE {$this->table} SET {$setFields} WHERE id = ?", $values);

        return $stmt->rowCount() > 0;
    }

    public function getAll()
    {
        return $this->DB->execute("SELECT * FROM {$this->table}")->fetchAll();
    }
}
