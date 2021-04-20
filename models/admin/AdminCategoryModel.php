<?php

// require_once('../Category.php');
// require_once('../Tree.php');

class AdminCategoryModel extends Tree{

    public function getCategories(){

        $sql = "SELECT *
                FROM category";
                
        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabCat = [];

        foreach($rows as $row){

            $cat = new Category();

            $cat->setId_cat($row->id_cat);
            $cat->setName_cat($row->name_cat);
            array_push($tabCat, $cat);
        }
            return $tabCat;

    }

    // public function deleteCat($id){
        
    //     $sql = "DELETE FROM category
    //             WHERE id_cat = :id";
        
    //     $result = $this->getRequest($sql, ['id'=>$id]);
        
    //     $line = $result->rowCount();
        
    //     return $line;
    // }

}