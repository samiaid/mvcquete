<?php
/**
 * Created by PhpStorm.
 * User: vince
 * Date: 25/09/18
 * Time: 09:52
 */


namespace Controller;

use Model\ItemManager;

class ItemController{


    public function index()
    {
        $items = new ItemManager();
        $items = $items->selectAllItems();
        require __DIR__ . '/../View/item.php';
    }

    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneItem($id);
        require __DIR__ . '/../View/showItem.php';
    }
}


