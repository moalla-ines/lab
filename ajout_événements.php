<?php
     include('includes/header.php');
     include('includes/topbar.php');
     include('includes/sidebar.php');
     include('authentification.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajout événements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <?php
    if(isset($_SESSION['error'])){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?php echo($_SESSION['error']);?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
    unset($_SESSION['error']);
}   
?>
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

    <section class="content">
        <div class="container-fluid">
        <div class="col">
        <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center h4" style="color:#22577E">Événement</div>
            <div class="card-body text-dark">
                <form action="insert_evenement.php" method="post" enctype="multipart/form-data">
                    <div class="col-sm-10 mt-3 mx-1">
                        <h1>Création événement</h1>
                        <hr>
                       
                        <div class="form-group">
                            <label class="fw-bold">Titre</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="titre" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Lieu</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="lieu" placeholder="Lieu">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Description</label>
                            <span class="obligatoryFieldMark">*</span>
                            <textarea  class="form-control mt-2" name="description" cols="20" rows="5" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Prix(DT)(optionnel)</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="prix" placeholder="Prix">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Date debut</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="datetime-local" class="form-control mt-2 " name="date_debut" id="date" >
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Date fin</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="datetime-local" class="form-control mt-2 " name="date_fin" id="date" >
                        </div><br>
                      
                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
                        </div> 
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>




</div>

<?php
    include('includes/footer.php');
?>
