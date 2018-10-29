<?php

namespace Controller;

use Model\Item;
use Model\ItemManager;

class ItemController extends AbstractController
{
    private $itemManager;

    public function __construct()
    {
        parent::__construct();
        $this->itemManager = new ItemManager($this->pdo);
    }

    public function index()
    {
        $items =  $this->itemManager->selectAll();

        return $this->twig->render('Item/index.html.twig', [
            'items' => $items,
        ]);
    }

    public function show(int $id)
    {
        $item = $this->itemManager->selectOneById($id);
        return $this->twig->render('Item/show.html.twig', [
            'item' => $item,
            ]);
    }

    public function add()
    {
        if(!empty($_POST) && !empty($_POST['title'])) {
                $item = new Item();
                $item->setTitle($_POST['title']);

                $this->itemManager->insert($item);
                header('Location: /');
                exit();
        }
        return $this->twig->render(('Item/add.html.twig'));
    }

    public function edit($id)
    {
        $item = $this->itemManager->selectOneById($id);
        if(!empty($_POST) && !empty($_POST['title'])) {
            $item->setTitle($_POST['title']);
            $this->itemManager->update($item);
            return $this->twig->render('Item/show.html.twig', [
                'item' => $item,
            ]);
        }
        return $this->twig->render('Item/edit.html.twig', [
            'item' => $item,
        ]);
    }

    public function delete($id)
    {
        $this->itemManager->delete($id);
        header('Location: /');
    }

}
