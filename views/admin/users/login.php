<?php ob_start();?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
<h1 class="display-6 text-center font-verdana text-decoration-underline">Login form</h1>
            
            <?php if(isset($error)){ ?>
                <div class="alert alert-danger text-center"><?=$error;?></div>
            <?php } ?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">

                <label for="loginMail" class="h6">Login or Mail*</label>
                <input type="text" id="loginMail" name="loginMail" class="form-control mt-2" placeholder="Please enter your login or mail">
                
                <label for="password" class="h6">Password*</label>
                <input type="password" id="password" name="password" class="form-control mt-2" placeholder="Enter your password">

                <button  type="submit" class="btn btn-primary col-12 mt-2" name="submit">Log in</button>
            </form>


        </div>
    </div>
</div>



<?php
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>

