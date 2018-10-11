<?php

namespace Controller;


use Model\CategoryManager;
use Twig_Loader_Filesystem;
use Twig_Environment;

class CategoryController
{
    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new Twig_Environment($loader);
    }

    /**
     *Call view to display all the Categories
     */
    public function index(){
        $cats = new CategoryManager();
        $cats = $cats->selectAllCategories();

        return $this->twig->render('Category/index.html.twig', ['categories' => $cats]);
    }


    /**
     * Call view to display on Category
     * @param int $id
     */
    public function show(int $id){
        $cat = new CategoryManager();
        $cat = $cat->selectOneCategory($id);

        return $this->twig->render('Category/showCategory.html.twig', ['category' => $cat]);
    }
}
