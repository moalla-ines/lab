<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" >
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    </style>
</head>
<body>

<?php
  
  include ('check_login.php');
  $nom=$_SESSION['nom'];
  $prenom=$_SESSION['prenom'];
  $etat=$_SESSION['etat'];
  
?>

<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:#EEEEEE;" >
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
        <a class="nav-link active" aria-current="page" href="index.php"  style="color:#0d47a1">
          Prèsentation
          </a>
          
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="theme.php"  style="color:#0d47a1">
            Thèmes de recherche
          </a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="papers.php"  style="color:#0d47a1"> 
            Publications
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="production.php"  style="color:#0d47a1">
            Production  et coopération
          </a>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="evenements.php"  style="color:#0d47a1">
            Manifestation
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="membre.php"  style="color:#0d47a1">
            Membre
          </a>
          
        </li>
          
        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="contact.php"  style="color:#0d47a1"> 
            Contact
          </a>
        </li>
        
      </ul>
      <div class="input-text mt-2">
        <span class="fw-bold" > BIENVENUE : <?php echo (strtoupper($prenom.' '.$nom));?></span>
      </div>
      <div class="dropdown mx-4">
        
        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-gear-fill"></i> Dashboard Panel
        </button>
        <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton2" style="background-color:#0d47a1;">
          <li><a class="dropdown-item " href="login.php">Dashboard Main Page</a></li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-item-text fw-light fs-6 " style="color:aliceblue">PAPER PROCESS</li>
          <li><a class="dropdown-item" href="add_paper.php"><i class="bi bi-file-earmark-plus"></i> Ajouter publication</a></li>
          <li><a class="dropdown-item" href="view_paper.php"><i class="bi bi-archive"></i> Gérer mes publication(s)</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="projet.php"><i class="bi bi-file-earmark-plus"></i> Ajouter production </a></li>
          <li><a class="dropdown-item" href="view_projet.php"><i class="bi bi-archive"></i> Gérer mes production(s)</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="update_profile.php"><i class="bi bi-person"></i> Mettre à jour mon profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <?php
          if($etat=='1'){
            ?>
            <li><a class="dropdown-item" href="admin.php"><i class="bi bi-person"></i> Admin</a></li>
            <?php
            }
            ?>
          
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="logout.php"><i class="bi bi-lock"></i> Déconnexion</a></li>
          
        </ul>
      </div>
    </div>
  </div>
</div>
</nav>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html>