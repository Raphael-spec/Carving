<?php

class AdminGradeController{

    private $adGrM;

    public function __construct()
    {
        $this->adGrM = new AdminGradeModel();
    }

    //___________________________________________________________//

    public function listGrades(){

        $allGr = $this->adGrM->getGrade();
        
        require_once('./views/admin/grades/adminGradeList.php');
    }

    //___________________________________________________________//

    public function eraseGr(){

        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            
            $nbLine = $this->adGrM->deleteGrade($id);

            if($nbLine > 0){
                    
                header('location:index.php?action=list_gr');
            }
        }
    }

    //___________________________________________________________//

       public function addGr(){
        //AuthController::isLogged();//(2) Pour s'authentifier 

        if(isset ($_POST['submit']) && !empty($_POST['grade'])){
            
            $name_g = trim(htmlentities(addslashes($_POST['grade'])));
            
            $newGrd = new Grade();
            
            $newGrd->setName_g($name_g);

            $ok = $this->adGrM->putGrade($newGrd);
            
            if($ok){
                
                header('location:index.php?action=list_gr');
            }
        }
        require_once('./views/admin/grades/adminAddGrd.php');
    }

    //___________________________________________________________//

    public function editGr(){
        // AuthController::isLogged();//(2) Pour s'authentifier 

       if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
       
            $id = trim($_GET['id']);
            
            $grd = $this->adGrM->collectGrade($id);

                if(isset($_POST['submit']) && !empty($_POST['grade'])){
                    
                    $grade = trim(addslashes(htmlentities($_POST['grade'])));
                    
                        $grd->setName_g($grade);
                        
                        $ke = $this->adGrM->changeGrade($grd);
                                        
                        header('location:index.php?action=list_gr');
                        
                }

                require_once('./views/admin/grades/adminEditGrd.php');
            }

    }
}