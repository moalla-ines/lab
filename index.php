<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB-SETIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" >
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    </style>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="css/animate.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
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
include 'check_login.php';

?>


<?php
        if(isset($_SESSION['mail'])) {
            include('nav_login.php');
          ?>
        <?php
        }else{ 
          include('nav.php'); 
        }  
      ?>
  
<?php
include('erreur.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
}



require_once ("password-connection.php");
$query="SELECT * FROM `lrsetitdomaine`" ;
$result=mysqli_query($con,$query);
$query_actualite="SELECT * FROM `lrsetitactualite`" ;
$result_actualite=mysqli_query($con,$query_actualite);
?>
<?php

if(isset($_SESSION['status'])){
  ?>
 <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  </svg>
  <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>
          <?php echo($_SESSION['status']);?>
      </div>
  </div>

  <?php
  unset($_SESSION['status']);
}   
?>

<div id="demo" class="carousel slide carousel-fade " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  </div>


<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="http://www.setit.rnu.tn/Lab-SETIT/image/1.png" alt="image" class="d-block" style="width:100%">
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





<div class="container mt-4">
          <div class="row">
            <div class="col">
                <div class="title-classic">
                  <h2 class="wow fadeInLeft fs-1" id="title">Présentation : </h2>
                
                  <p class="bigger wow fadeInLeft fs-5 mt-3" id="setit" >Systèmes intelligents pour l'ingénierie et la E-santé basés sur les Technologies de l'Image et des Télécommunications .</p>
                  <p class="wow fadeInLeft" >
                    Crée en Janvier 2004, l´unité de recherche SETIT trouve ses origines au sein du laboratoire de recherche LETI de l´école Nationale d´Ingénieur de Sfax ENIS. Depuis sa création, l´unité SETIT est rattachée à l´Institut Supérieur de Biotechnologie de Sfax ISBS. Les thèmes de recherches de l´Unité SETIT sont centrés autour de l´analyse, le traitement, la sécurisation (cryptage et tatouage) la compression,la transmission des images ainsi que l'interaction Homme Machine. Nous essayons d'aborder ces thématiques en mélangeant une approche mathématique fortement algorithmique et une approche pratique basée sur les outils informatiques. Nous essayons dans le cadre des travaux de SETIT de prendre en compte les préoccupations médicaleset industrielles dans le choix des objectifs stratégiques de l´unité. Nos travaux se regroupent de façon naturelle autour des grands thèmes tel que: la Segmentation, le Tatouage, la Compression, la Crypto-Compression et la transmission. Il est cependant très important de noter que ce découpage ne partitionne nullement l'ensemble des recherches que nous entreprenons ni les chercheurs de l´unité. Au contraire, <span id="dots">...</span><span id="more"> la plupart des membres de l'unité sont impliqués dans plusieurs thèmes. Il s'agit là d'une volonté claire d'avoir un réel fonctionnement en équipe qui ne peut qu'aboutir à l'élargissement des compétences de chacun. Nos thématiques sont en effet à la fois ciblées, car centrées sur un petit nombre d'objets combinatoires classiques, et ambitieux. En effet nous voulons étudier et évaluer ces objets sous de nombreux angles, ce qui fait que seul un véritable travail d'équipe nous permet d'être réellement efficace. Toutefois, il est impératif de signaler que notre objectif n'est pas de concevoir des méthodologies fondamentales, mais plutôt de rechercher les outils théoriques les mieux appropriés aux problèmes concrets posés par les "traiteurs de l´imagerie". Notre démarche relève donc d'une activité de recherche appliquée en développant différents outils, soit par nous-mêmes (comme les méthodes de tatouage et de crypto-compression), soit en évaluant les techniques existantes afin de pouvoir et les comprendre et les améliorer (comme la segmentation par les approches contour et région)et soit en appliquant notre savoir faire dans des thématiques diverses de la vie courante: médicale (Classification des mélanomes, détection des microcalcifications, ostéoporose, élaboration de système d´archivage et de transmission d´images médicales) et industrielle (contrأ´le de qualité, Télévidéo-surveillance, Sécurité de transmission..). Globalement, les compétences fondamentales requises touchent un grand nombre de secteurs relevant d'une part du traitement d'image et d'autre part du domaine médical et industriel. A toute fin utile nous signalons que le tatouage des images et la crypto-compression constituent deux axes dans lesquels nous nous distinguons à l´échelle mondiale par l´élaboration de nouvelles approches. D´ailleurs nous sommes les premiers en Tunisie à les traiter. A ce titre nous avons Plusieurs Brevets.</span></p>
                    <button onclick="myFunction()" id="myBtn" class="btn btn-outline-primary wow fadeInRight">Lire la suite</button>
                </div>
            </div>
            <div class="col  ">
              <img src="image/test.jpg" alt="" id="image" class="wow fadeInRight rounded" >
            </div>
          </div>
</div><br>
      <hr>

<div class="container">
  <div class="row">
          <div class="col-md-6 ">
            <div class="card card-primary">
              <div class="card-body wow fadeInLeft">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <h2 class="wow fadeInRight fs-1" id="title">Thèmes de recherche : </h2><br>
            <?php
                    $i=1;
                  while($row=mysqli_fetch_array($result)){

            ?>
                  <div class="accordion wow fadeInRight " id="accordionExample">
                    <div class="accordion-item">
                      <h1 class="accordion-header " id="heading<?php echo $i;?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                          <?php echo($row['1']);?>
                        </button>
                      </h1>
                      <div id="collapse<?php echo $i;?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $i;?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>Descritpion</strong><br><br>  <?php echo($row['2']);?>
                        </div>
                      </div>
                    </div>
                  
                    </div>
                    <?php
                    $i++;
                  }
            ?>

          </div>
         

          <!-- /.col -->
  </div>
          
</div><hr>
<div class="container">
  <div class="col-md-2">
    <h2 class="wow fadeInLeft fs-1" id="title">Actualités : </h2><br>   
  </div>
  <?php
                    $i=1;
                  while($row_actualite=mysqli_fetch_array($result_actualite)){

            ?>
  
    <div class="card mb-3 wow fadeInLeft " style="max-width: 600px;">
      <div class="row g-0">
          <div class="col-md-4 mt-1 ">
           <?php echo( '<img src="data:image;base64,'.base64_encode($row_actualite['4']).'" class="img-fluid rounded-start " alt="user-avatar" style="width:150px; height="150px"') ?>
          </div>
          </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title fs-3" style="color:#0d47a1"><?php echo($row_actualite['1']);?></h5>
            <p class="card-text fs-5"><?php echo($row_actualite['2']);?></p>
            <p class="card-text"><small class="text-muted"><?php echo($row_actualite['3']);?></small></p>
          </div>
        </div>
      </div>
  </div>
    <?php
                    $i++;
                  }
            ?>    
  

</div>


<?php
include 'footer.php';

?>
 <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Lire la suite"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

</script>
<script>


    
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          themeSystem: 'bootstrap5',
          headerToolbar: {
          left  : 'prev,next today',
          center: 'title',
          right : 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: 'load.php',
          
        });
        calendar.render();
      });

</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
