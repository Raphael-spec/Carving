<?php ob_start();?>

<div class="row col-8 offset-2">
    <h1 class="display-6 text-center font-verdana border-white text-decoration-underline">Edit Category</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row ">
                    <div class=" container col-4 offet-4 mt-4">
                        <input type="text" class="form-control text-center" name="id" value="<?=$cat->getId_cat();?>" readonly>
                    </div>
                </div>

                        <label for="categorie" class="h6">Category</label>
                        <input type="text" id="category" name="category" class="form-control" value="<?=$cat->getName_cat();?>">
                        <button type="submit" class="btn btn-warning col-12 mt-2" name="submit">Edit</button>
            </form>
        </div>
    </div>
</div>


<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');

?>

