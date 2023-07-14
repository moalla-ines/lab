<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    
    require_once ("password-connection.php");  
    $query="SELECT * FROM `lrsetitmembre` " ;
    $result=mysqli_query($con,$query);
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1 class="m-0">Gestion Membres</h1><br>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Ajouter</h3>
                <p>Membre</p>
              </div>
              <div class="icon">
              <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <a href="ajout_membre.php" target="_blank" class="small-box-footer">AJOUT <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- /.col -->
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <?php
            if(isset($_SESSION['status'])){
                ?>
                        <div class="alert alert-success" role="alert">
                        <?php echo($_SESSION['status']);?>
                        </div>

            <?php
                unset($_SESSION['status']);
            }   
            ?>
                <?php
            if(isset($_SESSION['erreur'])){
                ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo($_SESSION['erreur']);?>
                        </div>

            <?php
                unset($_SESSION['erreur']);
            }   
            ?>
          

    
    <div class="card card-solid" id="membre">
        <div class="card-body pb-0">
        <div class="row">
            <?php
            while($row=mysqli_fetch_array($result)) :
            $id=$row['0'];
            ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" >
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <?php echo($row['7']); ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo($row['2'].' '.$row['1']); ?></b></h2>
                      <p class="text-muted text-sm mt-1"><b>Spécialité : </b><?php echo($row['10']); ?> </p>
                      <ul class="ml-2 mb-0  fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fa fa-envelope" aria-hidden="true"></i> </span>Mail : <?php echo($row['8']); ?></li>
                        <li class="small mt-2"><span class="fa-li"><i class="fa fa-phone" aria-hidden="true"></i> </span> Phone #: <?php echo($row['16']);?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                        <?php echo( '<img src="data:image;base64,'.base64_encode($row['22']).'" class="img-circle img-fluid"" alt="user-avatar" style="width:100px; height="100px""') ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer mt-2">
                  <div class="text-left">
                  <?php 
                      if($row['verify_status']=="1"){
                        ?>
                        <h5 style="color:#008000">Compte activé</h5>
                        <?php
                      } 
                      else
                      {?>
                      
                        <h5 style="color:#FF0000">Non activé</h5 >  
                      <?php
                      }
                      ?>
                       <?php 
                      if($row['approve']=="1"){
                        ?>
                        <h5 style="color:#008000">Compte apprové</h5>
                        <?php
                      } 
                      else
                      {?>
                      
                        <h5 style="color:#FF0000">Non apprové</h5 >  <button type="button" name="approve_member_btn" class="btn btn-success approve_member_btn mb-2" value="<?=$id;?>">Apprové  ce compte </button>
                      <?php
                      }
                      ?>
                       <?php 
                      if($row['etat']=="1"){
                        ?>
                        <h5 style="color:#008000">A les privilèges d'admin</h5> <button type="button" name="remove_admin_btn" class="btn btn-danger remove_admin_btn mb-2" value="<?=$id;?>">Retirer les privilèges d'admin  </button>
                        <?php
                      }else{
                        ?>
                        <button type="button" name="add_admin_btn" class="btn btn-success add_admin_btn mb-2" value="<?=$id;?>">Ajouter comme admin </button>
                      <?php
                      } 
                      
                      ?>

                  </div>
                  <div class="text-left">
                  
                  <button type="button" name="delete_paper_btn" class="btn btn-danger delete_paper_btn " value="<?=$id;?>">Supprimer</button>
                    <a href="edit_membre.php?id_membre=<?=($id);?>" target="_blank" class="text-light">
                        <button type="button" class="  btn btn-primary  " >Modifier</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
        <?php
            endwhile;
            ?>
      </div>
    </div>
    
</div>
</div>




<?php
    include('includes/footer.php')
?>

<script>
  $(document).ready(function () {
    $('.delete_paper_btn').click(function (e) { 
      e.preventDefault();
      var id=$(this).val();

      Swal.fire({ 
        title: 'Êtes-vous sûr ?',
        text: "Vous ne pourrez pas réparer ça!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              type: "post",
              url: "delete_membre.php",
              data: {
                'id':id,
                'delete_paper_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Supprimé!',
                  'Membre est bien supprimé',
                  'success'
                ).then((result) => {
                  location.reload();
                }).catch((err) => {
                  
                });
               
                }else if(respons ==500)
                {
                  Swal.fire({
                      icon: 'error',
                      title: 'Erreur',
                      text: 'Membre non supprimé!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>
<script>
  $(document).ready(function () {
    $('.approve_member_btn').click(function (e) { 
      e.preventDefault();
      var id=$(this).val();

      Swal.fire({ 
        title: 'Êtes-vous sûr ?',
        text: "Vous allez approuvé ce compte!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Aprrouvé!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              type: "post",
              url: "approve_membre.php",
              data: {
                'id':id,
                'approve_member_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Approuvé!',
                  'Membre est bien approuvé',
                  'success'
                ).then((result) => {
                  location.reload();
                }).catch((err) => {
                  
                });
               
                }else if(respons ==500)
                {
                  Swal.fire({
                      icon: 'error',
                      title: 'Erreur',
                      text: 'Membre non approuvé!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>
<script>
  $(document).ready(function () {
    $('.add_admin_btn').click(function (e) { 
      e.preventDefault();
      var id=$(this).val();

      Swal.fire({ 
        title: 'Êtes-vous sûr ?',
        text: "Vous allez ajouter ce membre comme admin!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Ajouté!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              type: "post",
              url: "add_admin.php",
              data: {
                'id':id,
                'add_admin_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Approuvé!',
                  'Membre est bien ajouté comme admin',
                  'success'
                ).then((result) => {
                  location.reload();
                }).catch((err) => {
                  
                });
               
                }else if(respons ==500)
                {
                  Swal.fire({
                      icon: 'error',
                      title: 'Erreur',
                      text: 'Membre non ajouté!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>
<script>
  $(document).ready(function () {
    $('.remove_admin_btn').click(function (e) { 
      e.preventDefault();
      var id=$(this).val();

      Swal.fire({ 
        title: 'Êtes-vous sûr ?',
        text: "Vous allez retirer les privilèges d'admin!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Retiré!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              type: "post",
              url: "remove_admin.php",
              data: {
                'id':id,
                'remove_admin_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Approuvé!',
                  'privilèges admin sont bien retirés' ,
                  'success'
                ).then((result) => {
                  location.reload();
                }).catch((err) => {
                  
                });
               
                }else if(respons ==500)
                {
                  Swal.fire({
                      icon: 'error',
                      title: 'Erreur',
                      text: 'Membre non ajouté!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>