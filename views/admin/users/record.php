<?php ob_start();?>

 <div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-verdana text-decoration-underline">Add user</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col">
                        <label for="name">Name*</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Please enter a name" >
                    </div>
                    <div class="col">
                        <label for="firstname">Firstname*</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Please enter a firstname" >
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <label for="login">Login*</label>
                        <input type="text" id="login" name="login" class="form-control" placeholder="Please enter a login" >
                    </div>
                    <div class="col">
                        <label for="password">Password*</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Please enter a password" >
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="email">Mail*</label>
                        <input type="email" id="mail" name="mail" class="form-control" placeholder="Please enter a mail" >
                    </div>
                    <div class="col">
                        <label for="grade">Grade</label>
                        <select id="grade" name="grade" class="form-select">
                        <!-- <option value="">Choisir</option> -->
                        <?php foreach ($allGr as $gr) {; ?>
                            <option value="<?=$gr->getId_g();?>"><?=$gr->getName_g();?></option>
                        <?php }; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary  col-12 mt-2" name="submit">Valid</button>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>