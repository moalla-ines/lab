<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajout manifestation</h1>
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
    <div class="card border-dark shadow p-3 mb-5 bg-body rounded" >
      <div class="card-header fw-bold">
        <ul class="nav  card-header-tabs justify-content-center" >
          <li class="nav-item " id="paper">
           <button class="btn btn-outline-dark mx-2" id="show_article" onclick="showThese()"><a class="nav-link " aria-current="true" >Conférence</a></button> 
          </li>
          <li class="nav-item " id="paper">
          <button class="btn btn-outline-dark mx-2" id="show_ouvrage" onclick="showHabilitation()"><a class="nav-link " >Formation</a></button>
          </li>

        </ul>
      </div>

        <div id="these" >
          <form action="insert_conference_manifestation.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-10 mt-3 mx-2">
              <h1>Conférence</h1>
              <hr>
                <div class="form-group">
                    <label class="fw-bold">Titre</label>
                    <input type="text" name="titre" class="form-control mt-2" placeholder="Titre">
                </div><br>
                <div class="form-group">
                    <label class="fw-bold">Lieu</label>
                    <input type="text" class="form-control mt-2" name="lieu" placeholder="Lieu">
                </div><br>

                <div class="form-group">
                    <label class="fw-bold">Prix (DT)</lable>
                    <input type="number" class="form-control mt-2" name="prix" placeholder="Prix">
                </div><br>

                <div class="form-group">
                    <label class="fw-bold">Date debut</label>
                    <input type="datetime-local" class="form-control mt-2 " name="date_debut" id="date" >
                </div><br>
                <div class="form-group">
                    <label class="fw-bold">Date fin</label>
                    <input type="datetime-local" class="form-control mt-2 " name="date_fin" id="date" >
                </div><br>
                <div class="form-group">
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
                    <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
                </div>  
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
          </form>
          
        </div>

        
        <div id="hab" style="display:none" >
          <form action="insert_formation.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-10 mt-3 mx-2">
                  <h1>Formation</h1>
                  <hr>
                  <div class="form-group">
                            <label class="fw-bold">Titre</label>
                            <input type="text" class="form-control mt-2" name="titre" placeholder="Titre">
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Lieu</label>
                            <input type="text" class="form-control mt-2" name="lieu" placeholder="Lieu">
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Formateur</label>
                            <input type="text" class="form-control mt-2" name="formateur" placeholder="Lieu">
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Prix(DT)</label>
                            <input type="number" class="form-control mt-2" name="prix" placeholder="Prix">
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Date debut</label>
                            <input type="datetime-local" class="form-control mt-2 " name="date_debut" id="date" >
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Date fin</label>
                            <input type="datetime-local" class="form-control mt-2 " name="date_fin" id="date" >
                        </div><br>
                                            
                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
                    </div>
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
                          
          </form>   
                </div>
        </div>
      
        
      
        
          
        </div>
              </div>
      
         
  </div>
        </div>
    </section>


</div>


<?php

    include('includes/footer.php');
?>