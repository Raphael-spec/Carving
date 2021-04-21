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
    //___________________________________________________________//

    public function listCategories(){

        $allCat = $this->adCatM->getCategories();
        
        require_once('./views/admin/categories/adminCategoriesList.php');
    }

    //___________________________________________________________//

    public function eraseCat(){

        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            
            $nbLine = $this->adCatM->deleteCat($id);

            if($nbLine > 0){
                    
                header('location:index.php?action=list_cat');
            }
        }
    }

     //___________________________________________________________//

     public function addCat(){
        //AuthController::isLogged();//(2) Pour s'authentifier 

        if(isset ($_POST['submit']) && !empty($_POST['category'])){
            
            $name_cat = trim(htmlentities(addslashes($_POST['category'])));
            
            $newCat = new Category();
            
            $newCat->setName_cat($name_cat);

            $ok = $this->adCatM->putCategory($newCat);
            
            if($ok){
                
                header('location:index.php?action=list_cat');
            }
        }
        require_once('./views/admin/categories/adminAddCat.php');
    }

    //___________________________________________________________//

    public function editCat(){
        // AuthController::isLogged();//(2) Pour s'authentifier 

       if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
       
            $id = trim($_GET['id']);
        
            $cat = $this->adCatM->collectCategory($id);

                if(isset($_POST['submit']) && !empty($_POST['category'])){
                    
                    $category = trim(addslashes(htmlentities($_POST['category'])));
                    
                        $cat->setName_cat($category);
                        
                        $ke = $this->adCatM->changeCategory($cat);
                                        
                        header('location:index.php?action=list_cat');
                        
                }

       require_once('./views/admin/categories/adminEditCat.php');
       }

    }

}