<?php

class Grade{
    
    private $id_g;
    private $name_g;

    public function __construct()
    {
        
    }

    

    /**
     * Get the value of id_g
     */ 
    public function getId_g()
    {
        return $this->id_g;
    }

    /**
     * Set the value of id_g
     *
     * @return  self
     */ 
    public function setId_g($id_g)
    {
        $this->id_g = $id_g;

        return $this;
    }

    

    /**
     * Get the value of name_g
     */ 
    public function getName_g()
    {
        return $this->name_g;
    }

    /**
     * Set the value of name_g
     *
     * @return  self
     */ 
    public function setName_g($name_g)
    {
        $this->name_g = $name_g;

        return $this;
    }
}