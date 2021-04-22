<?php

class AdminCarvingModel extends Tree{

    public function getCarving($search = null){

        if(!empty($search)){
            
                $sql = "SELECT *
                        FROM carving cv
                        INNER JOIN category ca
                        ON cv.id_cat = ca.id_cat
                        WHERE name LIKE :name OR name_cat LIKE :name_cat OR crea_date LIKE :crea_date
                        ORDER BY id_carv ASC";
            
            $searchPar = ["name"=>"$search%", "name_cat"=>"$search%", "crea_date"=>"$search%"];
            
            $result = $this->getRequest($sql, $searchPar);
            //$carvings = $result->fetchAll(PDO::FETCH_OBJ);

        }else{

            $sql = "SELECT *
                    FROM carving cv
                    INNER JOIN category ca
                    ON cv.id_cat = ca.id_cat
                    ORDER BY id_carv ASC";
                    

                $result = $this->getRequest($sql);
        }
        
        $carvings = $result->fetchAll(PDO::FETCH_OBJ);

        $datas = [];

        foreach ($carvings as $carv) {

            $c = new Carving();
            $c->setId_carv($carv->id_carv);
            $c->setName($carv->name);
            $c->setContent($carv->content);
            $c->setCrea_date($carv->crea_date);
            $c->setPicture_f($carv->picture_f);
            $c->setQuantity($carv->quantity);
            $c->setPrix($carv->prix);
            $c->getCategory()->setId_cat($carv->id_cat);
            $c->getCategory()->setName_cat($carv->name_cat);
            
            array_push($datas, $c);
        }
        
        if($result->rowCount() > 0){
            
            return $datas;
        }else{
            
            return "No Records...";
        }
    }

}