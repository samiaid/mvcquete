<?php

namespace Model;

class CategoryManager extends AbstractManager
{
    const TABLE = 'category';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function insert(Category $category): int
    {
        $statement = $this->pdo->prepare('INSERT INTO ' . self::TABLE . " (`name`) VALUES (:name)" );
        $statement->bindValue('name', $category->getTitle(), \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

    public function update(Category $category)
    {
        $statement = $this->pdo->prepare('UPDATE ' . self::TABLE . " SET `name` =:name WHERE id =:id" );
        $statement->bindValue('id', $category->getId(), \PDO::PARAM_INT);
        $statement->bindValue('name', $category->getName(), \PDO::PARAM_STR);
        return $statement->execute();
    }

}