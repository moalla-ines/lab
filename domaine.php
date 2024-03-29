<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    

require_once ("password-connection.php");
$query="SELECT * FROM `lrsetitdomaine`" ;
$result=mysqli_query($con,$query);
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1 class="m-0">Domaines do recherche</h1><br>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Ajouter</h3>
                <p>Domaine</p>
              </div>
              <div class="icon">
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              </div>
              <a href="ajout_domaine.php" target="_blank" class="small-box-footer">AJOUT <i class="fas fa-arrow-circle-right"></i></a>
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
                if(isset($_SESSION['status']) && $_SESSION['status']!=''){
              ?>
                <script>
                  Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: '<?php echo ($_SESSION['status'])?>',
                      showConfirmButton: false,
                      timer: 2000
                    })
                  
                </script>
                <?php
                  unset( $_SESSION['status']);  
                }
                ?>  
    <?php
                    $i=1;
                  while($row=mysqli_fetch_array($result)){
                    $id=$row['0'];

            ?>
            <section class="content" id="domaine">
              <div id="accordion">
                <div class="card" >
                    <div class="card-header" id="heading<?php echo $i;?>">
                      <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                          <?php echo($row['1']);?>
                          </button>
                      </h5>
                    </div>

                    <div id="collapse<?php echo $i;?>" class="collapse " aria-labelledby="heading<?php echo $i;?>" data-parent="#accordion">
                      <div class="card-body">
                        <?php echo($row['2']);?><br><br>
                        <a href="edit_domaine.php?id=<?=($id);?>" target="_blank"><button class="btn btn-success">Modifier</button></a>
                        <button type="button" name="delete_paper_btn" class="btn btn-danger delete_paper_btn mx-2" value="<?=$id;?>">Supprimer</button>
                      </div>
                    </div>
                  </div>
                <?php
                                $i++;
                              }
                        ?>
              </div>
             </section>
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
              url: "delete_domaine.php",
              data: {
                'id':id,
                'delete_paper_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Supprimé!',
                  'Domaine de recherche est bien supprimé',
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
                      text: 'Domaine non supprimé!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>