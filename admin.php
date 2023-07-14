<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('authentification.php');
    
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
          <?php
           include('alert.php');
          ?>
          </div>
          <div class="col-sm-3">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Gestion</h3>
                <p>Utilisateur</p>
              </div>
              <div class="icon">
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              </div>
              <a href="ajout_user.php" target="_blank" class="small-box-footer">Gestion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- /.col -->
          <!-- ./col -->
          <div class="col-sm-3">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Gestion</h3>
                <p>Membre</p>
              </div>
              <div class="icon">
              <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <a href="ajout_membre.php" target="_blank" class="small-box-footer">Gestion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- /.col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Gestion</h3>
                <p>Publication</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-copy"></i>
              </div>
              <a href="ajout_publication.php" class="small-box-footer">Gestion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Gestion</h3>
                <p>Production scientifique</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-copy"></i>
              </div>
              <a href="ajout_publication.php" class="small-box-footer">Gestion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Gestion</h3>
                <p>Coopération</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-copy"></i>
              </div>
              <a href="ajout_publication.php" class="small-box-footer">Gestion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning  ">
              <div class="inner">
                <h3>Gestion</h3>
                <p>Manifestation</p>
              </div>
              <div class="icon">
              <i class="fa fa-university" aria-hidden="true"></i>
              </div>
              <a href="ajout_publication.php" class="small-box-footer">Gestion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger  ">
              <div class="inner">
                <h3>Gestion</h3>
                <p>Événements</p>
              </div>
              <div class="icon">
              <i class="fa fa-university" aria-hidden="true"></i>
              </div>
              <a href="ajout_publication.php" class="small-box-footer">Gestion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
</div>
  



<?php
    include('includes/footer.php');
?>