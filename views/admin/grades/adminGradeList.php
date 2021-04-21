<?php ob_start();

?>
<h1 class="display-6 text-center font-verdana text-decoration-underline">Grades list</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th colspan="2" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allGr as $grd) { ?>
        <tr>
            <td><?=$grd->getId_g();?></td>
            <td><?=$grd->getName_g();?></td>
            <td class="text-center">
                <a class="btn btn-warning" href="index.php?action=edit_gr&id=<?=$grd->getId_g();?>">
                <i class="fas fa-pen"></i></a>
            </td>
            <?php // if($_SESSION['Auth']->id_g != 1){ ?>
            <td class="text-center">
                <a class="btn btn-danger" href="index.php?action=delete_gr&id=<?=$grd->getId_g();?>"
                onclick="return confirm('Are you sure you want to delete this grade?')">
                <i class="fas fa-trash"></i></a>
            </td>
            <?php //} ?>
        </tr>
        <?php } ?>
    </tbody>

</table>


<?php
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>