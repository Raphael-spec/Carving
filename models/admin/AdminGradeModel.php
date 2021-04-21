<?php

class AdminGradeModel extends Tree{

    public function getGrade(){

        $sql = "SELECT *
                FROM grade";
                
        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabGr = [];

        foreach($rows as $row){

            $grd = new Grade();

            $grd->setId_g($row->id_g);
            $grd->setName_g($row->name_g);
            
            array_push($tabGr, $grd);
        }
            return $tabGr;
    } 
    //___________________________________________________________//

    public function deleteGrade($id){
        
        $sql = "DELETE FROM grade
                WHERE id_g = :id";
        
        $result = $this->getRequest($sql, ['id'=>$id]);
        
        $line = $result->rowCount();
        
        return $line;
    }

    //___________________________________________________________//

     public function putGrade(Grade $grd){
        
        $sql = "INSERT INTO grade(name_g)
                VALUES(:name)";
        
        $result = $this->getRequest($sql,['name'=>$grd->getName_g()]);

        return $result;

    }

    //___________________________________________________________//

    public function collectGrade($id){
        
        $sql = "SELECT *
                FROM grade
                WHERE id_g = :id";
       
       $result = $this->getRequest($sql,['id'=>$id]);
        
       if($result->rowCount() > 0){

            $row = $result->fetch(PDO::FETCH_OBJ);
            
            $grd = new Grade();
           
            $grd->setId_g($row->id_g);
            $grd->setName_g($row->name_g);

            return $grd;

        }
    }

    public function changeGrade(Grade $grd){ 
        
        $sql = "UPDATE grade
                SET name_g = :name
                WHERE id_g = :id";
        
        $result = $this->getRequest($sql, ['name'=>$grd->getName_g(), 'id'=>$grd->getId_g()]);

        if($result->rowCount() > 0){
            
            $line = $result->rowCount();
            return $line;
        }
    }
}