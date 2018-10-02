<?php
/**
 * Created by PhpStorm.
 * User: vince
 * Date: 01/10/18
 * Time: 15:23
 */

namespace Model;

require __DIR__ . '/../../app/db.php';

class CategoryManager
{
    /**
     * Return array with all the categories in the table category
     * @return array
     */
    public function selectAllCategories() : array {
        $pdo = new \PDO(DSN, USER, PASS);
        $query="SELECT * FROM category";
        $statement = $pdo->query($query);
        return $statement->fetchAll();
    }

    /**
     * Return array with all the information of one category with id = $id
     * @param int $id
     * @return array
     */
    public function selectOneCategory(int $id) : array {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM category WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }
}