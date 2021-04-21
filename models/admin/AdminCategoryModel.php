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
    //___________________________________________________________//

    public function deleteCat($id){
        
        $sql = "DELETE FROM category
                WHERE id_cat = :id";
        
        $result = $this->getRequest($sql, ['id'=>$id]);
        
        $line = $result->rowCount();
        
        return $line;
    }

    //___________________________________________________________//

    public function putCategory(Category $cat){
        
        $sql = "INSERT INTO category(name_cat)
                VALUES(:name)";
        
        $result = $this->getRequest($sql,['name'=>$cat->getName_cat()]);

        return $result;

    }
    //___________________________________________________________//

    public function collectCategory($id){
        
        $sql = "SELECT *
                FROM category
                WHERE id_cat = :id";
       
       $result = $this->getRequest($sql,['id'=>$id]);
        
       if($result->rowCount() > 0){

            $row = $result->fetch(PDO::FETCH_OBJ);
            
            $cat = new Category();
           
            $cat->setId_cat($row->id_cat);
            $cat->setName_cat($row->name_cat);

            return $cat;

        }
    }

    public function changeCategory(Category $cat){ 
        
        $sql = "UPDATE category
                SET name_cat = :name
                WHERE id_cat = :id";
        
        $result = $this->getRequest($sql, ['name'=>$cat->getName_cat(), 'id'=>$cat->getId_cat()]);

        if($result->rowCount() > 0){
            
            $line = $result->rowCount();
            return $line;
        }
    }

}