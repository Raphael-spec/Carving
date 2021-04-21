<?php

class AdminUserModel extends Tree{

    public function getUser(){

        $sql =" SELECT * 
        FROM user u
        INNER JOIN grade g
        ON u.id_g = g.id_g
        ORDER BY u.id_u ASC ";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        
        $tabUser = [];

        foreach($rows as $row){
            
            $use = new User();
            
            $use->setId_u($row->id_u);
            $use->setName($row->name);
            $use->setFirstname($row->firstname);
            $use->setLogin($row->login);
            $use->setPassword($row->password);
            $use->setMail($row->mail);
            $use->setStatus($row->status);
            $use->getGrade()->setId_g($row->id_g);
            $use->getGrade()->setName_g($row->name_g);
            
            array_push($tabUser,$use);
        }
     
            return $tabUser;
    }
    
    

    public function changeStatus(User $use){
       
       $sql = " UPDATE user
                SET status = :status
                WHERE id_u = :id";
        
        $result = $this->getRequest($sql, ['status'=>$use->getStatus(), 'id'=>$use->getId_u()]);
        
        return $result->rowCount();

    }

    //___________________________________________________________//

    public function signIn($loginEmail, $pass){
        
        $sql = "SELECT *
                FROM user
                WHERE (login = :logEmail OR mail = :logEmail) AND password = :password ";
        
        $result = $this->getRequest($sql,['logEmail'=>$loginEmail, 'password'=>$pass]);

        $row = $result->fetch(PDO::FETCH_OBJ);

        return $row;
    }

    //___________________________________________________________//
    
    public function record(User $use){
        
        $sql = "SELECT *
                FROM user
                WHERE email = :email";
        
        $result = $this->getRequest($sql, ['email'=>$use->getMail()]);
        
        if($result->rowCount() == 0){
            
            $req = "INSERT INTO user(name, firstname, login, password, mail, status, id_g)
                    VALUES(:name, :firstname, :login, :password, :mail, :status, :id_g)";
           
           $tabUsers = ['name'=>$use->getName(), 
                        'firstname'=>$use->getFirstname(), 
                        'login'=>$use->getLogin(), 
                        'password'=>$use->getPassword(), 
                        'mail'=>$use->getMail(), 
                        'status'=>$use->getStatus(),
                        'id_g'=>$use->getGrade()->getId_g()
                        ];
            
                $res = $this->getRequest($req, $tabUsers);
            
                return $res;
        }else{
                
            return "This user already exists";

        }
    }
}