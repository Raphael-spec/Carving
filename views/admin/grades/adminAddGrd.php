<?php ob_start();?>

<div class="row col-8 offset-2">
    <h1 class="display-6 text-center font-verdana border-success text-decoration-underline">Add Grade</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">

            <form action="index.php?action=add_gr" method="post">

                <label for="grade" class="h6">Grade</label>
                <input type="text" id="grade" name="grade" class="form-control mt-2" placeholder="Please put a new grade">
                <button  type="submit" class="btn btn-success col-12 mt-2" name="submit">Add</button>
            </form>


        </div>
    </div>
</div>


<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');

?>

