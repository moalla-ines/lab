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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />    
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
  include('nav_login.php');
  $nom=$_SESSION['nom'];
  $prenom=$_SESSION['prenom'];
  $etat=$_SESSION['etat'];
?>

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
    <h1 class="container "style="text-color:white;">
      Dashboard
    </h1>
  </section>
 
<div class="row row-cols-1 row-cols-md-2 g-4 mt-2">
  <div class="col">
    <div class="card border-secondary shadow p-3 mb-5 bg-body rounded animate__animated animate__fadeIn">
      <div class="d-flex position-relative">
       
        <div class="card-body">
          <h5 class="card-title fs-4 mt-0" style="color:#0d47a1"><i class="bi bi-journal-arrow-up"></i> </i>Ajouter un papier</h5><hr>
          <p class="card-text">Vous pouvez ajouter du papier tel que publication (article , ouvrage scietifique ..) ou production scientifique (thèse , habilitation ..)</p>
          <div class="d-flex justify-content-center"><br>
            <a href="add_paper.php" target="_blank"><button type="button" class="btn btn-outline-success">Ajouter publication</button></a>
            <a href="projet.php" target="_blank"><button type="button" class="btn btn-outline-success mx-2">Ajouter production scientifique</button></a>	
          </div>
      </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-secondary shadow p-3 mb-5 bg-body rounded animate__animated animate__fadeIn">
      <div class="d-flex position-relative">
       
        <div class="card-body">
          <h5 class="card-title fs-4" style="color:#0d47a1"><i class="bi bi-view-list"> </i>Gérer mes papier(s)</h5><hr>
          <p class="card-text">Vous pouvez gérer les papiers tel que publication (article , ouvrage scietifique ..) ou production scientifique (thèse , habilitation ..)</p>
          <div class="d-flex justify-content-center"><br>
          <a href="view_paper.php" target="_blank"><button type="button" class="btn btn-outline-primary">Gérer mes publication(s)</button></a>	
          <a href="view_projet.php" target="_blank"><button type="button" class="btn btn-outline-primary mx-2">Gérer mes production(s)</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-secondary shadow p-3 mb-5 bg-body rounded animate__animated animate__fadeIn">
      <div class="d-flex position-relative">
        
        <div class="card-body">
          <h5 class="card-title fs-4" style="color:#0d47a1"><i class="bi bi-person-check"></i> Mettre à jour mon profil</h5><hr>
          <p class="card-text">Vous pouvez mettre à jour votre profil.</p>
          <div class="d-flex justify-content-center"><br>
            <a href="update_profile.php" target="_blank"><button type="button" class="btn btn-outline-warning" style="color:black">Mis à jour</button></a>	
          </div>
      </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-secondary shadow p-3 mb-5 bg-body rounded animate__animated animate__fadeIn">
      <div class="d-flex position-relative">
        
        <div class="card-body">
          <h5 class="card-title fs-4" style="color:#0d47a1"><i class="bi bi-shield-lock"></i> Déconnecter</h5><hr>
          <p class="card-text">Déconnecter</p>
            <div class="d-flex justify-content-center"><br>
              <a href="logout.php" target="_blank"><button type="button" class="btn btn-outline-warning "style="color:black" >Déconnecter</button></a>	
            </div>
        </div>
      </div>
    </div>
  </div>
</div> 

<?php
  include('footer.php')
?>

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    Swal.fire(
  'Bon Retour !',
  '<?php echo (strtoupper($prenom.' '.$nom));?>',
  'success'
)
  </script>
</body>
</html>


