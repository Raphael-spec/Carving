<?php

abstract class Tree{


    private static $dataB;

     
    private static function getDataB()
    {
        if(self::$dataB === null){
            try{
                self::$dataB = new PDO('mysql:host=localhost; dbname=carving','root','');
                self::$dataB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //echo'ok...';
            }catch(PDOException $e){
                die($e->getMessage());
            }

        }
        return self::$dataB;
    }

    protected function getRequest($sql, $params = null){
        
        $result = self::getDataB()->prepare($sql);
        $result->execute($params);
        
        return $result;
    }
}