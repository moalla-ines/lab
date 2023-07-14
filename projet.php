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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.min.css">
  <script src="library/autocomplete.js"></script>
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
 
</head>
<body>
<?php

include ('check_login.php');  
include ('auteur_fetch.php');
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$etat=$_SESSION['etat'];

?>

<?php
  if(!isset($_SESSION['mail'])){ 
    header('location: index.php');
    }
?>

<nav class="navbar navbar-expand-lg navbar-light  sticky-top " style="background-color:#EEEEEE;" >
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

<div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel">
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
    <h1 class="container ">
      Ajout production 
    </h1>
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
  </section>
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

  <div class="col-9">
    <div class="card border-dark shadow p-3 mb-5 bg-body rounded" >
      <div class="card-header fw-bold">
        <ul class="nav  card-header-tabs justify-content-center" >
          <li class="nav-item " id="paper">
           <button class="btn btn-outline-dark mx-2" id="show_article" onclick="showThese()"><a class="nav-link " aria-current="true" >Thèse</a></button> 
          </li>
          <li class="nav-item " id="paper">
          <button class="btn btn-outline-dark mx-2" id="show_ouvrage" onclick="showHabilitation()"><a class="nav-link " >Habilitation</a></button>
          </li>
          <li class="nav-item " id="paper">
          <button class="btn btn-outline-dark mx-2" id="show_chapitre" onclick="showPfe()"><a class="nav-link " >PFE</a></button> 
          </li>
          
          
         
        </ul>
      </div>

        <div id="these" >
          <form action="insert_these.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-10 mt-3 mx-2">
              <h1>Thèse</h1>
              <hr>
              <div class="form-group">
                <label class="fw-bold">Titre</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="titre" class="form-control mt-2" placeholder="Titre">
              </div><br>
              <div class="form-group">
                  <label class="fw-bold">Année</label>
                  <span class="obligatoryFieldMark">*</span>
                  <select name="annee" class="form-select mt-2">
                    <option value="2022">2022</option>
                  </select>
              </div><br>

              <div class="form-group">
                <label class="fw-bold">Mémoire de thèse soutenu (fichier PDF qui contient la page de garde, taille maximale 1MO)</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="file" name="these" class="form-control mt-2  " >
              </div><br>

              <div class="form-group">
                <label class="fw-bold">Sujet</label>
                <span class="obligatoryFieldMark">*</span>
                <textarea name="sujet" class="form-control mt-2" cols="20" rows="5"></textarea>
              </div><br>

              <div class="form-group">
                <label class="fw-bold">Année de la première inscription</lable>
                <span class="obligatoryFieldMark">*</span>
                <input type="number" class="form-control mt-2" name="anneeinscri">
              </div><br>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Encadrant</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="encadrant" class="form-control mt-2 " placeholder="Encadrant">
                  </div>
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Mail encadrant</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="mail_encadrant" class="form-control mt-2 " placeholder="Mail">
                  </div>
                </div>
                  
              </div><br>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Deuxième encadrant</label>
                    <input type="text" name="encadrant_2" class="form-control mt-2 " placeholder="Encadrant">
                  </div>
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Mail encadrant</label>
                    <input type="text" name="mail_encadrant_2" class="form-control mt-2 " placeholder="Mail">
                  </div>
                </div>
              </div><br>

              <div class="form-group ">
                <label class="fw-bold mb-2">Cotutelle</label>
                <span class="obligatoryFieldMark">*</span>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cotutelle"  value="non cotutelle">
                  <label class="form-check-label " for="interne" >Non cotutelle</label>                               
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cotutelle" value="cotutelle">
                  <label class="form-check-label " for="externe" >Cotutelle</label>
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
          <form action="insert_habilitation.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-10 mt-3 mx-2">
                  <h1>Habilitation</h1>
                  <hr>
                  <div class="from-group">
                    <div class="form-group">
                      <label  class="fw-bold">Titre</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" class="form-control mt-2" name="titre" placeholder="Titre ">
                    </div><br>
                    <div class="form-group">
                      <label  class="fw-bold">Nom et prénom titulaire habilitation</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="text" class="form-control mt-2" name="nom" placeholder="Nom et prénom">
                    </div><br>
                    <div class="form-group">
                        <label class="fw-bold">Année</label>
                        <span class="obligatoryFieldMark">*</span>
                        <select name="annee" class="form-select mt-2 ">
                          <option value="2022">2022</option>
                        </select>
                    </div><br>
                                          
                    <div class="col-sm-6 form-group">
                      <label class="fw-bold">Fichier (PDF, Taille maximale: 1024 ko)</label>
                      <input type="file" name="fichier" class="form-control mt-4" >
                    </div><br>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 form-group">
                          <label class="control-label fw-bold">Encadrant</label>
                          <span class="obligatoryFieldMark">*</span>
                          <input type="text" name="encadrant" class="form-control mt-2 " placeholder="Encadrant">
                        </div>
                        <div class="col-sm-6 form-group">
                          <label class="control-label fw-bold">Mail encadrant</label>
                          <span class="obligatoryFieldMark">*</span>
                          <input type="text" name="mail_encadrant" class="form-control mt-2 " placeholder="Mail">
                        </div>
                      </div>
                    </div><br>
                                            
                    <div class="form-group">
                      <label  class="fw-bold">Date</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="date" class="form-control mt-2" name="date">
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
      
        
      
        <div id="pfe" style="display:none">
          <form action="insert_pfe.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-10 mt-3 mx-2">   
                  <h1>PFE</h1>
                  <hr>
                  <div class="form-group">
                    <label class="fw-bold">Titre</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="titre" class="form-control mt-2" placeholder="Titre">
                  </div><br>

                  <div class="col-sm-6 form-group">
                    <label class="fw-bold">Fichier (PDF)</label>
                    <input type="file" name="fichier" class="form-control mt-4" >
                  </div><br>
                  
                  <div class="form-group">
                    <label class="fw-bold">Description</label>
                    <textarea name="description" class="form-control mt-2" cols="20" rows="5"></textarea>
                  </div><br>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <label class="control-label fw-bold">Encadrant</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" name="encadrant" class="form-control mt-2 " placeholder="Encadrant">
                      </div>
                      <div class="col-sm-6 form-group">
                        <label class="control-label fw-bold">Mail encadrant</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" name="mail_encadrant" class="form-control mt-2 " placeholder="Mail">
                      </div>
                    </div>
                  
                  </div><br>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <label class="control-label fw-bold">Deuxième encadrant</label>
                        <input type="text" name="encadrant_2" class="form-control mt-2 " placeholder="Encadrant">
                      </div>
                      <div class="col-sm-6 form-group">
                        <label class="control-label fw-bold">Mail encadrant</label>
                        <input type="text" name="mail_encadrant_2" class="form-control mt-2 " placeholder="Mail">
                      </div>
                    </div>
                  </div><br>

                  
                  <div class="form-group">
                    <label class="fw-bold">Institution</label>
                    <input type="text" name="institut" class="form-control mt-2" placeholder="Institution">
                  </div><br>
                  <div class="form-group">
                    <label class="fw-bold">Etudiant</label>
                    <input type="text" name="etudiant" class="form-control mt-2" placeholder="Etudiant">
                  </div><br>
                  <div class="form-group">
                  <label class="fw-bold">Date debut de PFE</label>
                  <input type="date" name="debut" id="debut" class="form-control mt-2">
                  </div><br>
                  <div class="form-group">
                  <label class="fw-bold">Date fin de PFE</label>
                  <input type="date" name="fin" id="debut" class="form-control mt-2">
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
  















<script src="scripts.js"></script>
</body>
</html>
