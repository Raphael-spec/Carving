<?php

require_once('./app/autoload.php');


class Maze{

    private $ctrCat;

    public function __construct()
    {
        $this->ctrCat = new AdminCategoryController();
    }

    public function getMaze(){

        if(isset($_GET['action'])){

            switch($_GET['action']){

                case 'list_cat':
                    $this->ctrCat->listCategories();
                    break;
            }
        }
    }
}