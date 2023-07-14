<?php
     include('includes/header.php');
     include('includes/topbar.php');
     include('includes/sidebar.php');
     include('authentification.php');

     
     require_once ("password-connection.php");  
     $query="SELECT * FROM `lrsetitactualite` " ;
     $result=mysqli_query($con,$query);
     $id=$_GET['id'];
     while($row=mysqli_fetch_array($result)){
      
        if(isset($row['1'])){
          $val=$row['1'];
        }
        if(isset($row['2'])){
          $val_0=$row['2'];
        }
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mis à jour actualité</h1>
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

    <section class="content">
        <div class="container-fluid">
        <div class="col">
        <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center h4" style="color:#22577E">Actualité</div>
            <div class="card-body text-dark">
                <form action="update_actualite.php?&id=<?=($id);?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-10 mt-3 mx-1">
                        <h1>Mis à jour actualité</h1>
                        <hr>
                       
                        <div class="form-group">
                            <label class="fw-bold">Titre</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="titre" placeholder="Titre" value="<?=$val;?>"> 
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Description</label>
                            <span class="obligatoryFieldMark">*</span>
                            <textarea  class="form-control mt-2" name="description" cols="20" rows="5" placeholder="Description"><?php echo($val_0);?></textarea>
                        </div>
                        <div class=" form-group">
                            <label class="fw-bold">Image</label>
                            <input type="file" name="photo" class="form-control mt-2"  >
                        </div>
                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="update" name="update">Update</button>	
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
