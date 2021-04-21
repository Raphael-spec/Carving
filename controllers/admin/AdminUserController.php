<?php

class AdminUserController{

    private $adUseM;
    private $adGrM;

    public function __construct()
    {
        $this->adUseM = new AdminUserModel();
        $this->adGrM = new AdminGradeModel();
    }

    public function listUsers(){
        //AuthController::isLogged();//(2) Pour s'authentifier 
        
        if(isset($_GET['id']) && isset($_GET['status']) && !empty($_GET['id'])){
            
            $id = $_GET['id'];
            $status = $_GET['status'];
            
            $use = new User();
            
                if($status == 1){
                    $status = 0;
                }else{
                    $status = 1;
                }

            $use->setId_u($id);
            $use->setStatus($status);
            
            $this->adUseM->changeStatus($use);
        }    
        
        $allUsers = $this->adUseM->getUser();
        
        require_once('./views/admin/users/adminUsersList.php');
        //return $allUsers;
    }
//___________________________________________________________//    

    public function login(){
        //AuthController::isLogged();//(2) Pas sur le login, on veut pas securiser le login
        
        if(isset($_POST['submit'])){
            
            if(strlen($_POST['pass']) >= 4 && !empty($_POST['loginEmail'])){
                
                $loginEmail = trim(htmlentities(addslashes($_POST['loginEmail'])));
                $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
               
                $data_u = $this->adUseM->signIn($loginEmail, $pass);
                
                if(!empty($data_u)){
                    
                    if($data_u->statut > 0){
                        //session_start();
                        //$_SESSION['Auth'] = $data_u;
                        header('location:index.php?action=list_carv');
        
                    }else{
        
                        $error = "your account has been deleted";
                    }
                }else{
                    $error = "Your login/mail or/and password doesn't match"; 
               
                }
            }else{
                $error = "Please enter valid datas"; 
    
            }
        
        }
        require_once('./views/admin/users/login.php');
    }
    //___________________________________________________________//

    public function addUser(){
        //AuthController::isLogged();
        
        if(isset($_POST['submit'])){

            if(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL) && strlen($_POST['password']) >= 4){
        
                
                $name = trim(htmlentities(addslashes($_POST['name'])));
                $firstname = trim(htmlentities(addslashes($_POST['firstname'])));
                $login = trim(htmlentities(addslashes($_POST['login'])));
                $password = md5(trim(htmlentities(addslashes($_POST['password']))));
                $mail = trim(htmlentities(addslashes($_POST['mail'])));
                $id_g = trim(htmlentities(addslashes($_POST['grade'])));
                
        
                $user = new User();
                
                $user->setName($name);
                $user->setFirstname($firstname);
                $user->setLogin($login);
                $user->setPassword($password);
                $user->setMail($mail);
                $user->setStatus(1);
                $user->getGrade()->setId_g($id_g);
        
                $ok = $this->adUseM->record($user);
                
                if($ok){
                    header('location:index.php?action=list_us');
                }
            }
        
         }
                $allGr = $this->adGrM->getGrade();
            
                require_once('./views/admin/users/record.php');
        

    }
}