<?php ob_start();?>
<h1 class="display-6 text-center font-verdana text-decoration-underline">Carving list</h1>

<div class="row">
    <div class="col-4 offset-8">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="input-group">
            <input class="form-control text-center" type="search" name="search" id="search" placeholder="Search..." >
            <button type="submit" class="btn btn-outline-secondary" name="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
<table class="table table-striped">
      <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Picture</th>
              <th>Creation D</th>
              <th>Content</th>
              <th>Prix</th>
              <th>Category</th>
              <th colspan="2" class="text-center">Actions</th>
          </tr>
      </thead>
     <tbody>
          <tr>
          <?php if(is_array($carvs)){ foreach ($carvs as $carv) { ?>
              <td><?=$carv->getId_carv();?></td>
              <td><?=$carv->getName();?></td>
              <td><img src="./assets/images/<?=$carv->getPicture_f();?>" alt="" width="100"></td>
              <td><?=$carv->getCrea_date();?></td>
              <td><?=$carv->getContent();?></td>
              <td><?=$carv->getPrix();?></td>
              <td><?=$carv->getCategory()->getName_cat();?></td>
              <td class="text-center">
                <a class="btn btn-warning" href="index.php?action=edit_carv&id=<?=$carv->getId_carv();?>">
                    <i class="fas fa-pen"></i>
                </a>
              </td>
              <?php// if($_SESSION['Auth']->id_g != 3){ ?>
              <td  class="text-center">
                <a class="btn btn-danger" href="index.php?action=delete_v&id=<?=$carv->getId_carv();?>"
                    onclick="return confirm('Are you sure, you want to delete this carving?')">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
              <?php //} ?>
          </tr>
          <?php }}else{ echo"<tr class='text-center text-danger'><td colspan='10' >".$carvs."</td></tr>";} ?>
      </tbody>
  </table>

<?php
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>
