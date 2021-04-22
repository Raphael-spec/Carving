<?php

class AdminPictureModel extends Tree{

    public function getPictures(){

        $sql = "SELECT *
                FROM pictures p
                INNER JOIN carving c
                ON p.id_carv = c.id_carv
                ORDER BY id_p ASC";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        
        $tabPic = [];

        foreach ($rows as $row) {
            
            $pic = new Pictures();
            
            $pic->setId_p($row->id_p);
            $pic->setPicture_s($row->picture_s);
            $pic->setPicture_o($row->picture_o);
            $pic->getCarving()->setId_carv($row->id_carv);
            $pic->getCarving()->setName($row->name);


            array_push($tabPic, $pic);
        }
        return $tabPic;
    }
}