<?php

class AdminCarvingController{

    private $adCrM;

    public function __construct()
    {
        $this->adCrM = new AdminCarvingModel();
        $this->adCatM = new AdminCategoryModel();
    }

    public function listCarving(){
        //AuthController::isLogged();//(2) Pour s'authentifier 
        //var_dump($_POST);
          if(isset($_POST['submit']) && !empty($_POST['search'])){
             
              $search = trim(htmlspecialchars(addslashes($_POST['search'])));
              $carvs = $this->adCrM->getCarving($search);
              
              require_once('./views/admin/carving/adminCarvingList.php');
    
          }else{
  
            $carvs = $this->adCrM->getCarving();
            
            require_once('./views/admin/carving/adminCarvingList.php');
             //var_dump($carv);
     
          }
      }
}