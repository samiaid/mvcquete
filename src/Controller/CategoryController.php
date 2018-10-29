<?php

namespace Controller;

use Model\CategoryManager;

class CategoryController extends AbstractController
{
    private $categoryManager;

    public function __construct()
    {
        parent::__construct();
        $this->categoryManager = new CategoryManager($this->pdo);
    }

    public function index()
    {
        $categories = $this->categoryManager->selectAll();

        return $this->twig->render('Category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    public function show($id)
    {
        $category = $this->categoryManager->selectOneById($id);

        return $this->twig->render('Category/show.html.twig', [
            'category' => $category,
        ]);
    }

    public function add()
    {
        if(!empty($_POST) && !empty($_POST['name'])) {
            $category = new Category();
            $category->setTitle($_POST['name']);

            $this->categoryManager->insert($category);
            header('Location: /category');
            exit();
        }
        return $this->twig->render(('Category/add.html.twig'));
    }

    public function edit($id)
    {
        $category = $this->categoryManager->selectOneById($id);
        if(!empty($_POST) && !empty($_POST['name'])) {
            $category->setName($_POST['name']);
            $this->categoryManager->update($category);
            return $this->twig->render('Category/show.html.twig', [
                'category' => $category,
            ]);
        }
        return $this->twig->render('Category/edit.html.twig', [
            'category' => $category,
        ]);
    }

    public function delete($id)
    {
        $this->categoryManager->delete($id);
        header('Location: /categories');
    }

}