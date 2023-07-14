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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    </style>
    <style>
      .dropdown:hover .dropdown-menu{
        display: block;
      }
      .dropdown-menu{
        margin-top: 0;
      }
    </style>
  <script>
    $(document).ready(function(){
      $(".dropdown").hover(function(){
        var dropdownMenu = $(this).children(".dropdown-menu");
        if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("open");
        }
    });
});     
</script>
</head>
<body>
<?php


include ('check_login.php');
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$id=$_SESSION['id'];
$etat=$_SESSION['etat'];

$query="SELECT * FROM `lrsetitmembre` WHERE `id`=$id " ;
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
        
        if(isset($row['7'])){
          $val_5=$row['7'];
        }
        
        if(isset($row['8'])){
          $val_6=$row['8'];
        }
        
        if(isset($row['9'])){
          $val_7=$row['9'];
        }
        if(isset($row['10'])){
          $val_8=$row['10'];
        }
        if(isset($row['11'])){
          $val_9=$row['11'];
        }
        
        if(isset($row['12'])){
            $val_10=$row['12'];
        }
          if(isset($row['13'])){
            $val_11=$row['13'];
        }
    
          if(isset($row['14'])){
            $val_12=$row['14'];
        }
          if(isset($row['15'])){
            $val_13=$row['15'];
        }
          
          if(isset($row['16'])){
            $val_14=$row['16'];
        }
          
          if(isset($row['17'])){
            $val_15=$row['17'];
        }
          
          if(isset($row['18'])){
            $val_16=$row['18'];
        }
          
          if(isset($row['19'])){
            $val_17=$row['19'];
        }
        if(isset($row['22'])){
          $val_22=$row['22'];
      }
    }
?>

<?php
  if(!isset($_SESSION['mail'])){ 
    header('location: index.php');
    }
?>

<nav class="navbar navbar-expand-lg navbar-light  sticky-top" style="background-color:#EEEEEE;" >
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
        </li>
        
      </ul>
      <div class="input-text mt-2">
        <span class="fw-bold"> BIENVENUE : <?php echo (strtoupper($prenom.' '.$nom));?></span>
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
</nav>


<div id="demo" class="carousel slide carousel-fade " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  </div>


  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/1.png" alt="image" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="image/2.png" alt="image" class="d-block" style="width:100%">
    </div>
  </div>


  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
  <section class="headpage ">
    <h1 class="container "style="text-color:white;">
      Mis à jour profile
    </h1>
  </section>
  <?php
    if(isset($_SESSION['mail_exist'])){
  ?>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
  </svg>
  <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>
          <?php echo($_SESSION['mail_exist']);?>
      </div>
  </div>

  <?php
  unset($_SESSION['mail_exist']);
}   
?>
<?php

if(isset($_SESSION['erreur'])){
  ?>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
  </svg>
  <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>
          <?php echo($_SESSION['erreur']);?>
      </div>
  </div>

  <?php
  unset($_SESSION['erreur']);
}   
?>

<div class="row">
  
    <div class="card border-light shadow-sm p-3 mb-5 bg-body rounded" style="width: 18rem; height:100%;">
      <div class="card-header fw-bold">
        DASHBOARD PANEL
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><p class="nav-header" style="text-transform:uppercase;">procédures des papiers</p>
          <p><i class="bi bi-file-earmark-plus"></i> <a href="add_paper.php" class="link-primary"> Ajouter une publication</a></p>
          <p><i class="bi bi-archive"></i> <a href="view_paper.php" class="link-primary"> Gérer mes publication(s)  </a></p>
        </li>
        <li class="list-group-item">
          <p><i class="bi bi-file-earmark-plus"></i> <a href="projet.php" class="link-primary"> Ajouter une production </a></p>
          <p><i class="bi bi-archive"></i> <a href="view_projet.php" class="link-primary"> Gérer mes production(s)  </a></p>
        </li>
          <li class="list-group-item">
          <p><i class="bi bi-person"></i> <a href="update_profile.php" class="link-primary"> Mettre à jour mon profil</a></p>
          <p><i class="bi bi-lock"></i> <a href="logout.php" class="link-primary">Déconnecter</a></p>
        </li>
      </ul>
    </div>
 
  <div class="col-9 mt-1">
  <div class="card border-secondary mb-3 shadow p-3 mb-5" >
  <div class="card-header text-center fs-3 fw-bold" style="color:#22577E">Mis à jour de mon profile</div>
  
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-sm-8">
        <h5 class="card-title mt-4">Données personnelles pour l'utilisateur (<?php echo ($prenom.' '.$nom);?>)</h5>
      </div>
      <div class="col-sm-4 text-right">
      <?php echo( '<img src="data:image;base64,'.base64_encode($val_22).'" class="rounded mb-2" alt="user-avatar" style="width:120px; height="120px""') ?>
      </div>
    </div>
    <hr>
   
    
    
  
  <form action="update.php?id=<?=($id);?>" method="post">
    <div class="row">
    <div class="col-sm-6 form-group">
								<label class="fw-bold">Nom</label>
								<input type="text" name="nom" placeholder="Nom" class="form-control mt-2 "  value="<?=$val;?>">
							</div>
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Prénom</label>
								<input type="text" name="prenom" placeholder="Prénom" class="form-control mt-2" value="<?=$val_0;?>"><br>
							</div>
						</div>	
							
                <label class="mr-sm-4 fw-bold" for="inlineFormCustomSelect">Grade</label>
                <select  name="grade" class="custom-select" >
                    <option value="" selected disabled hidden>Choisir votre grade</option>
                    <option value="Professeur">Professeur</option>
                    <option value="Maître de conférence">Maître de conférence</option>
                    <option value="Docteur">Docteur</option>
                    <option value="Chercheur en thèse">Chercheur en thèse</option>
                    <option value="Chercheur en mastère">Chercheur en mastère</option>
                    <option value="Ingénieur ">Ingénieur </option>
                    <option value="Assistant">Assistant</option>
                    <option value="Maître Assistant">Maître Assistant</option>
                    <option value="Autre">Autre</option>
                  </select>
						<div class="row">
              <div class="col-sm-6 form-group"><br>
                <label class="fw-bold">Email</label>
                <input type="text" name="email" class="form-control mt-2" placeholder="Votre E-mail" value="<?=$val_6;?>" >
              </div><br>
              <div class="col-sm-6 form-group"><br>
                <label class="fw-bold" >Mot de passe</label>
                <input type="password" name="mdp" class="form-control mt-2" placeholder="Mot de passe" id="password" onkeyup="passCheck(this.value)" value="<?=$val_7;?>"><br>
                <ul>
                  <li><span class="password-check" class="fw-light ">Minimum 8 caractéres.</span></li>
                  <li><span class="password-check" class="fw-light ">Compris au minimum une lettre en majuscule et une en minuscule.</span></li>
                  <li><span class="password-check" class="fw-light ">Compris au minimum un nombre. </span></li>
                </ul>
              </div>
            </div>
            
            <div class="col-sm-6 form-group">
              <label class="fw-bold">Photo (Image JPG/PNG, Taille maximale: 1024 ko)</label>
                <input type="file" name="photo" class="form-control mt-2" value="<?=$val_20;?>" >
            </div>
						
            
            <div class="row">
              <div class="col-sm-6 form-group"><br>
								<label class="fw-bold">Spécialité</label>
								<input type="text" name="specialite" placeholder="Spécialité" class="form-control mt-2" value="<?=$val_8;?>">
							</div>	

							<div class="col-sm-6 form-group"><br>
								<label class="fw-bold">Diplome</label>
								<input type="text" name="diplome" placeholder="Diplome" class="form-control mt-2" value="<?=$val_9  ;?>">
							</div>		
            </div>    <br>

            <div class="form-group">
              <label class="fw-bold">Fonction administrative</label>
              <input type="text" name="ftadmin" placeholder="Fonction administrative" class="form-control mt-2" value="<?=$val_11;?>"><br>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="fw-bold">H-index (Scopus)</label>
                <input type="text" name="scopus" placeholder="H-index (Scopus)" class="form-control mt-2" value="<?=$val_12;?>"><br>
              </div>

              <div class="col-sm-6 form-group">
                <label class="fw-bold">Identification ORCID</label>
                <input type="text" name="orcid" placeholder="Identification ORCID" class="form-control mt-2" value="<?=$val_13;?>"><br>
              </div>
            </div>
			  	<div class="row">
				  	<div class="col-sm-6 form-group">
						  <label class="fw-bold">Téléphone Mobile</label>
              
					  	<input type="number" name="tel"placeholder="Téléphone mobile" class="form-control mt-2" value="<?=$val_14;?>"> 
				  	</div>
           <div class="col-sm-6 form-group">
						<label class="fw-bold">Téléphone Fax</label>
            
						<input type="number" name="telfax"placeholder="Téléphone Fax" class="form-control mt-2" id ="tel" value="<?=$val_15;?>"> 
				  	</div>		
          </div><br>
          
          <div class="from-group ">
              <label for="datedenaissance" class="control-label required fw-bold ">Date du dernier diplôme</label>
              <input type="date" class="form-control mt-2" name="datediplome" id="datediplome" value="<?=$val_18;?>">
            </div><br>
            <div class="d-flex justify-content-center"><br>
					    <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" name="update">mise à jour</button>	
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


<?php
  include('footer.php')
?>
<script src="scripts.js"></script>