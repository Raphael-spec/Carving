<?php

// require_once('../../models/Tree.php');
// require_once('../../models/Category.php');
// require_once('../../models/admin/AdminCategoryModel.php');

class AdminCategoryController{

    private $adCatM;

    public function __construct()
    {
        $this->adCatM = new AdminCategoryModel();
    }

    public function listCategories(){

        $allCat = $this->adCatM->getCategories();
        require_once('./views/admin/categories/adminCategoriesItems.php');
    }
}