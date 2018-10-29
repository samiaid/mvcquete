<?php

namespace Model;

abstract class AbstractManager
{
    protected $pdo;
    protected $table;
    protected $className;

    public function __construct(string $table, \PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->className = __NAMESPACE__ . '\\' . ucfirst($table);
    }

    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }

    public function delete(int $id)
    {
        $statement = $this->pdo->prepare('DELETE FROM ' . $this->table . " WHERE id =:id" );
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        return $statement->execute();
    }
}