<?php
/**
 * Created by PhpStorm.
 * User: vince
 * Date: 01/10/18
 * Time: 15:23
 */

namespace Controller;


use Model\CategoryManager;

class CategoryController
{
    /**
     *Call view to display all the Categories
     */
    public function index(){
        $cats = new CategoryManager();
        $cats = $cats->selectAllCategories();
        require __DIR__ . '/../View/category.php';
    }


    /**
     * Call view to display on Category
     * @param int $id
     */
    public function show(int $id){
        $cat = new CategoryManager();
        $cat = $cat->selectOneCategory($id);
        require __DIR__ . '/../View/showCategory.php';
    }
}