
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
include ('auteur_fetch.php')
?>

<?php
  if(!isset($_SESSION['mail'])){ 
    header('location: index.php');
    }
?>

<?php

require_once ("password-connection.php");
$tab=$_GET['type'];
$id_papier=$_GET['id_papier'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$id=$_GET['id'];
$etat=$_SESSION['etat'];
$query="SELECT * FROM `lrsetit$tab` WHERE `id`='$id_papier' ";
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
          <a class="nav-link active" aria-current="page" href="projet.php"  style="color:#0d47a1">
            Projets et coopération
          </a>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="evenements.php"  style="color:#0d47a1">
          Événement
          </a>
          
        </li>
        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="contact.php"  style="color:#0d47a1"> 
            Contact
          </a>
          
        </li>
        
      </ul>
      <div class="input-text mt-2">
        <span class="fw-bold"> WELCOME : <?php echo strtoupper(strtoupper($prenom.' '.$nom));?></span>
      </div>
      <div class="dropdown mx-2">
        
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
      Update paper
    </h1>
    
  </section>
<div class="row">
  <div class="card border-light  shadow-sm p-3 mb-5 bg-body rounded" style="width: 18rem; height:100%;">
    <div class="card-header fw-bold">
      DASHBOARD PANEL
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><p class="nav-header" style="text-transform:uppercase;">procédures des papiers</p>
          <p><i class="bi bi-file-earmark-plus"></i> <a href="add_paper.php" class="link-primary"> Ajouter une publication</a></p>
          <p><i class="bi bi-archive"></i> <a href="view_paper.php" class="link-primary"> Voir mes publication(s)  </a></p>
        </li>
        <li class="list-group-item">
          <p><i class="bi bi-file-earmark-plus"></i> <a href="projet.php" class="link-primary"> Ajouter un projet</a></p>
          <p><i class="bi bi-archive"></i> <a href="view_projet.php" class="link-primary"> Voir mes projet(s)  </a></p>
        </li>
          <li class="list-group-item">
          <p><i class="bi bi-person"></i> <a href="update_profile.php" class="link-primary"> Mettre à jour mon profil</a></p>
          <p><i class="bi bi-lock"></i> <a href="logout.php" class="link-primary">Déconnecter</a></p>
        </li>
      </ul>
    

  </div>
  <div class="col-9">
    <div class="card border-dark shadow p-3 mb-5 bg-body rounded" >
    <?php
          if($tab=='brevet'){
            ?>
          <div id="brevet" >
            <form action="update_brevet.php?id_papier=<?=($id_papier);?>&id=<?=($id);?>" method="post" enctype="multipart/form-data" >  
            <div class="col-sm-10 mt-3 mx-2">
                <h1>Mis à jour brevet</h1>
                <hr>
                <div class="form-group">
                  <label class="fw-bold">Titre</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="titre" class="form-control mt-2" placeholder="Titre" value="<?=$val;?>">
                </div><br>
                <div class="form-group">
                    <label class="fw-bold">Année</label>
                    <span class="obligatoryFieldMark">*</span>
                    <select name="annee" class="form-select mt-2">
                      <option value="2022">2022</option>
                    </select>
                </div><br>
                        <legend>
                            <span>
                              <i class="bi bi-person-fill"></i>
                              Auteur(s) Interne :
                            </span>
                          </legend>   
                      <hr>
                      <div class="from-group">
                        <div id="auteur_brevet">
                          <div class="row">
                            <div class="col-sm-6 form-group">
                            <label class="control-label fw-bold">Auteur 1</label>
                              <span class="obligatoryFieldMark">*</span>
                              <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                            </div>
                            <div class="col-sm-6 form-group">
                              <label class="control-label fw-bold">Mail auteur 1</label>
                              <span class="obligatoryFieldMark">*</span>
                              <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Mail 1">
                            </div>
                          </div>
                        </div>
                      </div><br>

                      <button type="button" class="btn btn-primary" id="add_brevet_btn"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
                      <br><br>
                      <legend>
                          <span>
                            <i class="bi bi-person-fill"></i>
                                            Auteur(s) Externe :
                          </span>
                      </legend>   
                      <hr>

                      <div class="form-group">
                        <div id="externe_brevet">
                          <div class="row">
                            <div class="col-sm-6 form-group">
                              <label class="control-label fw-bold">Auteur externe 1</label>
                              <span class="obligatoryFieldMark">*</span>
                              <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                            </div>
                            <div class="col-sm-6 form-group">
                              <label class="control-label fw-bold">Mail externe 1</label>
                              <span class="obligatoryFieldMark">*</span>
                              <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <button type="button" class="btn btn-primary" id="btn_externe_brevet"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
                  <br><br>

                <div class="form-group">
                  <label class="fw-bold">Fichier (taille maximale 1MO)</label>
                  <input type="file" name="these" class="form-control mt-2  " value="<?= $val_1;?>">
                </div><br>

                <div class="form-group">
                  <label class="fw-bold">Sujet</label>
                  <textarea name="sujet" class="form-control mt-2" cols="20" rows="5" value="<?=$val_2;?>"><?php echo($val_2); ?></textarea>
                </div><br>
                <div class="form-group">
                  <label class="fw-bold">Date</label>
                  <input type="date" class="form-control mt-2"  name="date"  value="<?=$val_3;?>">
                </div><br>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="update"  onclick="sweet()">Update</button> 
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
          <?php
              }
                ?>
          <?php
          if($tab=='conference'){
            ?>
          <div id="conference" >
            <form action="update_conference.php?id_papier=<?=($id_papier);?>&id=<?=($id);?>" method="post" enctype="multipart/form-data">
            <div class="col-sm-10 mt-3 mx-2">
                            <h1>Mis à d'une Conférence</h1>
                            <legend>
                                    <span>
                                      <i class="bi bi-file-earmark-fill"></i>
                                        Informations conférence :
                                    </span>
                                  </legend> 
                                  <hr>
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Année</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <select name="annee" class="form-select mt-2 ">
                                            <option value="2022">2022</option>
                                        </select>
                                  </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Titre</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="text" name="titre" placeholder="Titre" class="form-control mt-2 " value="<?=$val_1;?>" >
                                    </div>
                                </div><br>
                                <div></div>
                                <div class="col-sm-12 mt-2">
                                    <div class="row ">
                                        <div class="col-sm-6 form-group ">
                                            <label class="fw-bold ">Date</label>
                                            <span class="obligatoryFieldMark">*</span>
                                            <input type="date" class="form-control mt-2 " name="date" id="datediplome" value="<?=$val_2;?>" >
                                        </div><br>
                                        <div class="col-sm-6 form-group">
                                          <label class="fw-bold ">Fichier (PDF, Taille maximale: 1024 ko)</label>
                                          <input type="file" name="conference" class="form-control mt-2" >
                                        </div><br>

                                    </div><br>
                                   

                                    <legend>
                                      <span>
                                        <i class="bi bi-person-fill"></i>
                                        Auteur(s) Interne:
                                      </span>
                                    </legend>   
                              <hr>
                            
                            <div class="from-group">
                              <div id="auteur_conference">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Auteur 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                                  </div>     
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail auteur 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Mail 1">
                                  </div>    
                                      
                                </div><br> 
                                          
                              </div>
                            </div>
                            
                          
                                      
                                      
              <button type="button" class="btn btn-primary" id="conf_btn"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
              <br><br>
                                    <legend>
                                      <span>
                                        <i class="bi bi-person-fill"></i>
                                        Auteur(s) Externe :
                                      </span>
                                    </legend>   
                              <hr>
                            <div class="from-group">
                              <div id="conference_externe">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Auteur externe 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                                  </div>     
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail externe 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                                  </div>    
                                      
                                </div><br> 
                                          
                              </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="conf_externe"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
              <br><br>
                                      
                              
                                            <legend><br>
                                                <span>
                                                <i class="bi bi-book-fill"></i>
                                                Informations conférence :
                                            </span>
                                            </legend>   
                                            <hr>
                                            <div class="form-group"><br>
                                              <label class="control-label fw-bold">Conference name</label>
                                              <span class="obligatoryFieldMark">*</span>
                                              <input type="text" class="form-control mt-2" name="name" placeholder="Titre du conférence" value="<?=$val_4;?>">
                                             </div>

                                             <div class="form-group"><br>
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
          <?php
              }
                ?>

          <?php
          if($tab=='chapitre d\'ouvrage'){
            ?>
          <div id="chapitre_ouvrage" >  
            <form action="update_chapitre.php?id_papier=<?=($id_papier);?>&id=<?=($id);?>" method="post">  
                <div class="col-sm-10 mt-3 mx-2">
                <h1>Mis à jour d'un chapitre d'ouvrage</h1>
                <hr>
                <div class="form-group">
                  <label class="fw-bold">Année</label>
                  <span class="obligatoryFieldMark">*</span>
                  <select name="annee" class="form-select mt-2 ">
                    <option value="2022">2022</option>
                  </select>
                </div><br>
                <legend>
                  <span>
                    <i class="bi bi-person-fill"></i>
                    Auteur(s) Interne :
                  </span>
                </legend>   
                <hr>
                            
                <div class="from-group">
                  <div id="auteur_chapitre_ouvrage">
                  <div class="row">
                    <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Auteur 1</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                  </div> 
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Auteur 1</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Auteur 1">
                  </div>                    
                </div><br> 
                                          
              </div>
              <button type="button" class="btn btn-primary" id="add_chapitre_btn"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
              <br><br>
              <legend>
                                      <span>
                                        <i class="bi bi-person-fill"></i>
                                        Auteur(s) Externe :
                                      </span>
                                    </legend>   
                              <hr>
                            <div class="from-group">
                              <div id="externe_chapitre">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Auteur externe 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                                  </div>     
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail externe 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                                  </div>    
                                      
                                </div><br> 
                                          
                              </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="btn_chap"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
              <br><br>
                                      
                                      
            
              
                <div class="form-group">
                  <label  class="fw-bold">Titre</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="titre" value="<?=$val_1;?>" placeholder="Titre ">
                </div><br>

                <div class="form-group">
                  <label  class="fw-bold">Éditeur</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="editeur" value="<?=$val_2;?>"  placeholder="Éditeur ">
                </div><br>

                <div class="form-group">
                  <label  class="fw-bold">Lien éditeur</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="lien" value="<?=$val_3;?>" placeholder="Lien éditeur ">
                </div><br>

                <div class="form-group">
                  <label  class="fw-bold">Édition</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="edition" value="<?=$val_4;?>" placeholder="Édition ">
                </div><br>

                <div class="form-group">
                  <label  class="fw-bold">ISBN/Issn</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="isbn" value="<?=$val_5;?>" placeholder="ISBN/Issn">
                </div><br>

                <div class="form-group">
                  <label  class="fw-bold">Date</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="date" class="form-control mt-2" name="date" value="<?=$val_6;?>" >
                </div><br>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="update">Submit</button>  
                </div>
                    </div>
                
                    
            </form>           
          </div>
                <?php
              }
                ?>


          <?php
          if($tab=='ouvrage scientifique'){
            ?>
          <div id="ouvrage_scientifique" >
              <form action="update_ouvrage.php?id_papier=<?=($id_papier);?>&id=<?=($id);?>" method="post" >
                <div class="col-sm-10 mt-3 mx-2">
                    <h1>Mis à jour d'un ouvrage scientifique</h1>
                    <hr>
                      <div class="form-group">
                        <label class="fw-bold">Année</label>
                        <span class="obligatoryFieldMark">*</span>
                        <select name="annee" class="form-select mt-2 ">
                            <option value="2022">2022</option>
                        </select>
                      </div><br>
                      <legend>
                        <span>
                          <i class="bi bi-person-fill"></i>
                          Auteur(s) Interne :
                        </span>
                      </legend>   
                  <hr>
                            
                <div class="from-group">
                  <div id="auteur_ouvrage">
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label class="control-label fw-bold">Auteur 1</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                    </div>  
                    <div class="col-sm-6 form-group">
                      <label class="control-label fw-bold">Mail auteur 1</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Mail 1">
                    </div>  


                </div><br> 
                                          
              </div>
                                      
                                      
              <button type="button" class="btn btn-primary" id="add_ouvrage_btn"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
              <br><br>
              <legend>
                                      <span>
                                        <i class="bi bi-person-fill"></i>
                                        Auteur(s) Externe :
                                      </span>
                                    </legend>   
                              <hr>
                            <div class="from-group">
                              <div id="externe_ouvrage">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Auteur externe 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                                  </div>     
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail externe 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                                  </div>    
                                      
                                </div><br> 
                                          
                              </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="btn_externe"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
              <br><br>

                                      <div class="form-group">
                                        <label  class="fw-bold">Titre</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="text" class="form-control mt-2" name="titre" value="<?=$val_1;?>" placeholder="Titre ">
                                      </div><br>
                                      <div class="form-group">
                                        <label  class="fw-bold">Éditeur</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="text" class="form-control mt-2" name="editeur" value="<?=$val_2;?>" placeholder="Éditeur ">
                                      </div><br>
                                      <div class="form-group">
                                        <label  class="fw-bold">Lien éditeur</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="text" class="form-control mt-2" name="lien" value="<?=$val_3;?>" placeholder="Lien éditeur ">
                                      </div><br>
                                      <div class="form-group">
                                        <label  class="fw-bold">Édition</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="text" class="form-control mt-2" name="edition" value="<?=$val_4;?>" placeholder="Édition ">
                                      </div><br>
                                      <div class="form-group">
                                        <label  class="fw-bold">ISBN/Issn</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="text" class="form-control mt-2" name="isbn" value="<?=$val_5;?>" placeholder="ISBN/Issn">
                                      </div><br>
                                      <div class="form-group">
                                        <label  class="fw-bold">Date</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="date" class="form-control mt-2" name="date" value="<?=$val_6;?>">
                                      </div><br>
                                      <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="update">Submit</button>	
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
            <?php
          }
            ?>
  

          <?php
          if($tab=='article scientifique'){
            ?>
            <div id="article_scientifique" >
                <form action="update_article.php?id_papier=<?=($id_papier);?>&id=<?=($id);?>" method="post" enctype="multipart/form-data">
                            <div class="col-sm-10 mt-3 mx-2">
                            <h1>Mis à jour d'un article scientifique</h1>
                            <legend>
                                    <span>
                                      <i class="bi bi-file-earmark-fill"></i>
                                        Informations article :
                                    </span>
                                  </legend> 
                                  <hr>
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Année</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <select name="annee" class="form-select mt-2 ">
                                            <option value="2022">2022</option>
                                        </select>
                                  </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="fw-bold">Titre</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="text" name="titre" value="<?=$val_1;?>" class="form-control mt-2 " >
                                    </div>
                                </div><br>
                                <div></div>
                                <div class="col-sm-12 mt-2">
                                    <div class="row ">
                                        <div class="col-sm-6 form-group ">
                                            <label class="fw-bold">Lien DOI de l'article scientifique</label>
                                            <input type="text" name="doi" placeholder="Lien DOI" value="<?=$val_2;?>" class="form-control mt-2 " >
                                        </div>
                                        <div class="col-sm-6 form-group">
                                          <label class="fw-bold ">Fichier (PDF, Taille maximale: 1024 ko)</label>
                                          <input type="file" name="article" class="form-control mt-2" >
                                        </div><br>

                                    </div><br>
                                    <div class="col-sm-6 form-group ">
                                        <label class="fw-bold ">Date publication</label>
                                        <span class="obligatoryFieldMark">*</span>
                                        <input type="date" class="form-control mt-2 " value="<?=$val_4;?>" name="date" id="datediplome" >
                                    </div><br>

                                    <legend>
                                      <span>
                                        <i class="bi bi-person-fill"></i>
                                        Auteur(s) Interne:
                                      </span>
                                    </legend>   
                              <hr>
                            
                            <div class="from-group">
                              <div id="auteur_article">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Auteur 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                                  </div>     
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail auteur 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Mail 1">
                                  </div>    
                                      
                                </div><br> 
                                          
                              </div>
                            </div>
                            
                          
                                      
                                      
              <button type="button" class="btn btn-primary" id="add_btn"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
              <br><br>
                                    <legend>
                                      <span>
                                        <i class="bi bi-person-fill"></i>
                                        Auteur(s) Externe :
                                      </span>
                                    </legend>   
                              <hr>
                            <div class="from-group">
                              <div id="auteur_externe">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Auteur externe 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                                  </div>     
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail externe 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                                  </div>    
                                      
                                </div><br> 
                                          
                              </div>
                            </div>
                             <button type="button" class="btn btn-primary" id="add_externe"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
                                  <br><br>
                                      
                              
                                            <legend><br>
                                                <span>
                                                <i class="b i bi-book-fill"></i>
                                                Informations journal :
                                            </span>
                                            </legend>   
                                            <hr>
                                            <span class="fw-bold">Recherche journal</span>
                                            <div class="form-group"><br>
                                                <label class="control-label fw-bold">Titre du journal</label>
                                                <span class="obligatoryFieldMark">*</span>
                                                <input type="text" class="form-control mt-2" name="titre_journal" value="<?=$val_5;?>" placeholder="Titre du journal">
                                            </div>
                                            
                                            <div class="form-group"><br>
                                                <label class="control-label fw-bold">Liste des journaux (Chercher et séléctionner un titre existant)</label>
                                                <select id="revues" size="10" tabindex="2" class="form-control mt-2"></select>
                                            </div>
                                            <div class="form-group"><br>
                                                <label class="control-label fw-bold">Quartile du journal: 0%----Q1----25----Q2----50----Q3----75----Q4----100% <span class="fw-normal">(Cliquer ici pour plus d'informations)</span></label>
                                                <select name="quartile" id="" class="form-select mt-2">
                                                    <option value="Q1">Q1: Top 25% de la distribution des facteurs d'impact</option>
                                                    <option value="Q2">Q2: Entre top 50% et 25% de la distribution des facteurs d'impact</option>
                                                    <option value="Q3">Q3: Entre top 75% to top 50% de la distribution des facteurs d'impact</option>
                                                    <option value="Q4">Q4: Moins de 25% de la distribution des facteurs d'impact </option>
                                                    <option value="Autre">Autre</option>
                                                </select>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label fw-bold">Volume</label>
                                                        <input type="text" class="form-control mt-2" value="<?=$val_7;?>" name="volume" placeholder="Volume">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label fw-bold">Facteur d'impact</label>
                                                        <input type="text" class="form-control mt-2" value="<?=$val_8;?>" name="impact" placeholder="Facteur d'impact">
                                                    </div>
                                                </div>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label fw-bold">Indexation</label>
                                                        <span class="obligatoryFieldMark">*</span>
                                                        <select name="indexation" class="form-select mt-2">
                                                            <option value="WOS">WOS</option>
                                                            <option value="SCOPUS">SCOPUS</option>
                                                            <option value="Elsevier">Elsevier</option>
                                                            <option value="Non indexé">Non indexé</option>
                                                            <option value="Autres">Autres</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label fw-bold">Site de la revue</label>
                                                        <input type="text" class="form-control mt-2" name="site_revue" value="<?=$val_10 ;?>" placeholder="Site de la revue">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="d-flex justify-content-center">
                                              <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="update">Submit</button>	
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
                                                            
                                                  
                                    </div><br>
                                  
                                </div>

                                
                            </div>
                        </form>
                        
            
          </div>
            <?php
            }
            ?>
        
    </div>

    

    
     
  </div>

</div>

<?php
  include('footer.php')
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="scripts.js"></script>
  <script>

$(document).ready(function(){
      $(".dropdown").hover(function(){
        var dropdownMenu = $(this).children(".dropdown-menu");
        if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("open");
        }
    });
});     

$(document).ready(function () {
    var i = 1 ;
    $("#add_btn").click(function (e) { 
        e.preventDefault();
        i++;
        $("#auteur_article").prepend(`<div class="from-group">
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`">
          </div>
          <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail auteur `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
          </div>    
                             
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
$(document).ready(function () {
    var i = 1 ;
    $("#add_ouvrage_btn").click(function (e) { 
        e.preventDefault();
        i++;
        $("#auteur_ouvrage").prepend(`
        <div class="from-group">
        
        <div class="row">
          <div class="col-sm-6 form-group">
          <label class="control-label fw-bold">Auteur `+i+`</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`"> 
        </div>             
        <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Auteur `+i+`</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
                </div>         
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
$(document).ready(function () {
    var i = 1 ;
    $("#add_chapitre_btn").click(function (e) { 
        e.preventDefault();
        i++;
        $("#auteur_chapitre_ouvrage").prepend(`<div class="from-group">
        
        <div class="row">
          <div class="col-sm-6 form-group">
          <label class="control-label fw-bold">Auteur `+i+`</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`">
            
        </div>    
        <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Auteur `+i+`</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
                </div>                   
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
$(document).ready(function () {
    var i = 1 ;
    $("#conf_btn").click(function (e) { 
        e.preventDefault();
        i++;
        $("#auteur_conference").prepend(`<div class="from-group">
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`">
          </div>
          <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail auteur `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
          </div>    
                             
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
$(document).ready(function () {
    var i = 1 ;
    $("#add_brevet_btn").click(function (e) { 
        e.preventDefault();
        i++;
        $("#auteur_brevet").prepend(`<div class="from-group">
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`">
          </div>
          <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail auteur `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
          </div>    
                             
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});

$(document).ready(function () {
    var i = 1 ;
    $("#add_externe").click(function (e) { 
        e.preventDefault();
        i++;
        $("#auteur_externe").prepend(`<div class="from-group">
        
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur_externe `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
          </div>
          <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
          </div>    
                             
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
$(document).ready(function () {
    var i = 1 ;
    $("#btn_externe").click(function (e) { 
        e.preventDefault();
        i++;
        $("#externe_ouvrage").prepend(`<div class="from-group">
        
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur_externe `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
          </div>
          <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
          </div>    
                             
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
$(document).ready(function () {
    var i = 1 ;
    $("#btn_chap").click(function (e) { 
        e.preventDefault();
        i++;
        $("#externe_chapitre").prepend(`<div class="from-group">
        
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur_externe `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
          </div>
          <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
          </div>    
                             
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
$(document).ready(function () {
    var i = 1 ;
    $("#conf_externe").click(function (e) { 
        e.preventDefault();
        i++;
        $("#conference_externe").prepend(`<div class="from-group">
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur_externe `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
          </div>
          <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
          </div>    
                             
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
$(document).ready(function () {
    var i = 1 ;
    $("#btn_externe_brevet").click(function (e) { 
        e.preventDefault();
        i++;
        $("#externe_brevet").prepend(`<div class="from-group">
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur_externe `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
          </div>
          <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
          </div>    
                             
      </div><br> 
      <div class="col-sm-6 form-group">
        <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
      </div>
    </div>`);
        
    });
});
</script>

</body>
</html>


