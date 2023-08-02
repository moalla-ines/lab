  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assests/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="info">
          <a href="#" class="d-block"><?php 
        if($_SESSION['mail']){
        echo ($_SESSION['prenom'].' '. $_SESSION['nom']  ) ; 
         
        }
        else
        {
           echo ('Not Logged in '); 
        }
        ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          <li class="nav-item">
            <a href="gestion_manifestation.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gestion Manifestations
                </p>
            </a>
            
            <li class="nav-item">
                <a href="gestion_événements.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                  <p>Gestion Événements</p>
                </a>
              </li>
              
           
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Gestion papiers
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="gestion_publication.php" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Gestion publications</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="gestion_production.php" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Gestion production scientifique</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="gestion_cooperation.php" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Gestion coopération</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
              <a href="calendrier.php" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Calendrier
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="domaine.php" class="nav-link">
                 <i class="nav-icon fa fa-tasks" aria-hidden="true"></i> <p> Domaines de recherches</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="gestion_membres.php" class="nav-link">
                 <i class="nav-icon fa fa-users" aria-hidden="true"></i> <p> Gestion Membres</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="gestion_actualité.php" class="nav-link">
                   <i class="nav-icon fa fa-check-square" aria-hidden="true"></i>  <p> Gestion Actualités</p>
                   </a>
            </li>
            <li class="nav-item">
              <a href="gestion_users.php" class="nav-link">
                 <i class="nav-icon fa fa-users" aria-hidden="true"></i> <p> Gestion Utilisateur</p>
              </a>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>