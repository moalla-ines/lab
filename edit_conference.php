<?php
     include('includes/header.php');
     include('includes/topbar.php');
     include('includes/sidebar.php');
     include('authentification.php');
     
    require_once ("password-connection.php");
    $id=$_GET['id'];
    $query="SELECT * FROM `lrsetitconference_manifestation` WHERE `id`='$id' ";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
      
        if(isset($row['1'])){
          $val=$row['1'];
        }
        if(isset($row['2'])){
          $val_0=$row['2'];
        }
  
        if(isset($row['3'])){
          $val_1=$row['3'];
        }
        if(isset($row['4'])){
          $val_2=$row['4'];
        }
        
        if(isset($row['5'])){
          $val_3=$row['5'];
        }
        
        if(isset($row['6'])){
          $val_4=$row['6'];
        }
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mis à jour conférence</h1>
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
            <div class="card-header text-center h4" style="color:#22577E">Conférence</div>
            <div class="card-body text-dark">
                <form action="update_conference_manifestation.php?&id=<?=($id);?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-10 mt-3 mx-1">
                        <h1>Mis à jour conférence</h1>
                        <hr>
                       
                        <div class="form-group">
                            <label class="fw-bold">Titre</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="titre" placeholder="Titre" value="<?=$val;?>">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Lieu</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="lieu" placeholder="Lieu" value="<?=$val_0;?>">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Prix</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="number" class="form-control mt-2" name="prix" placeholder="Prix" value="<?=$val_1;?>">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Date debut</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="datetime-local" class="form-control mt-2 " name="date_debut" id="date" value="<?=$val_2;?>">
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Date fin</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="datetime-local" class="form-control mt-2 " name="date_fin" id="date" value="<?=$val_3;?>">
                        </div><br>
                        <div class="form-group" >
                            <label class="control-label fw-bold">Classe</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="classe" id="female" value="a"  >
                                        <label class="form-check-label " for="female" >a</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="classe" id="male" value="b" >
                                        <label class="form-check-label " for="male" >b</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="classe" id="male" value="c" >
                                        <label class="form-check-label " for="male" >c</label>
                                    </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="classe" id="male" value="Internationale" >
                                                <label class="form-check-label " for="male" >Internationale</label>
                                              </div>
                                
                        </div><br>
                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="update">Submit</button>	
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
