<?php

class Pictures{

    private $id_p;
    private $picture_s;
    private $picture_o;
    private $carving;


    public function __construct()
    {
        $this->carving = new Carving();
    }

    



    /**
     * Get the value of id_p
     */ 
    public function getId_p()
    {
        return $this->id_p;
    }

    /**
     * Set the value of id_p
     *
     * @return  self
     */ 
    public function setId_p($id_p)
    {
        $this->id_p = $id_p;

        return $this;
    }

    /**
     * Get the value of picture_s
     */ 
    public function getPicture_s()
    {
        return $this->picture_s;
    }

    /**
     * Set the value of picture_s
     *
     * @return  self
     */ 
    public function setPicture_s($picture_s)
    {
        $this->picture_s = $picture_s;

        return $this;
    }

    /**
     * Get the value of picture_o
     */ 
    public function getPicture_o()
    {
        return $this->picture_o;
    }

    /**
     * Set the value of picture_o
     *
     * @return  self
     */ 
    public function setPicture_o($picture_o)
    {
        $this->picture_o = $picture_o;

        return $this;
    }

    /**
     * Get the value of carving
     */ 
    public function getCarving()
    {
        return $this->carving;
    }

    /**
     * Set the value of carving
     *
     * @return  self
     */ 
    public function setCarving($carving)
    {
        $this->carving = $carving;

        return $this;
    }
}