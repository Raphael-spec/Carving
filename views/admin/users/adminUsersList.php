<?php ob_start();?>
<h1 class="display-6 text-center font-monospace text-decoration-underline">Users List</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Firstname</th>
            <th>Login</th>
            <th>Mail</th>
            <th>Grade</th>
            <?php //if($_SESSION['Auth']->id_g == 1){ ?>
            <th class="text-center">Action</th>
            <?php //} ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allUsers as $user) { ?>
        <tr>
            <td><?=$user->getId_u();?></td>
            <td><?=$user->getName();?></td>
            <td><?=$user->getFirstname();?></td>
            <td><?=$user->getLogin();?></td>
            <td><?=$user->getMail();?></td>
            <td><?=$user->getGrade()->getName_g();?></td>
            <?php// if($_SESSION['Auth']->id_g == 1){ ?>


            <td class="text-center">
                <!-- <a class="btn btn-success" href="">
                    <i class="fas "></i>
                    <?//php echo($user->getStatut()) ?"Désactiver" : "Activer";?>
                </a> -->
                <?php
                   echo ($user->getStatus())
                    ? "<a href='index.php?action=list_u&id=".$user->getId_u()."&status=".$user->getStatus()."' onclick='return confirm(`Are you sure you want to unlock this status?`)' class='btn btn-success'><i class='fas fa-unlock'>Unlock</i></a>"
                    : "<a href='index.php?action=list_u&id=".$user->getId_u()."&status=".$user->getStatus()."' onclick='return confirm(`Are you sure you want to lock on this status?`)' class='btn btn-danger'><i class='fas fa-lock'>Lock on</i></a>"
                ?>
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

