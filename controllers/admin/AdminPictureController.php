<?php

class AdminPictureController{

    private $adPiM;

    public function __construct()
    {
        $this->adPiM = new AdminPictureModel();
        $this->adCrM = new AdminCarvingModel();
    }

    public function listPictures(){

        $allPic = $this->adPiM->getPictures(); 
        
        require_once('./views/admin/pictures/adminPicturesList.php');
    }
}