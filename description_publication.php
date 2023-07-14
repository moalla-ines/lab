<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    </style>
      <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="styles.css" >
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.js"></script>
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
include('function.php');

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
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$id=$_GET['id'];
$id_papier=$_GET['id_papier'];
$type=$_GET['type'];

require_once ("password-connection.php"); 

$query="SELECT * FROM `lrsetit$type` WHERE `id`='$id_papier' " ;
$result=mysqli_query($con,$query);
$query_auteur="SELECT * FROM `lrsetitauteur_publication` WHERE `id`='$id' " ;
$result_auteur=mysqli_query($con,$query_auteur);

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
  
    
}
while($row_auteur=mysqli_fetch_array($result_auteur)){
  
  if(isset($row_auteur['4'])){
    $auteur=$row_auteur['4'];
  }
}
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
<div class="container">
          
            <div class="card border-secondary mt-5 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header text-center fw-bold fs-4" style="color:#22577E"><?php echo(ucfirst($type)); ?></div>
                    <div class="card-body ">
            
                        <h3 id="title">Auteurs : </h5>
                        <p class="fw-bold "><?php echo(ucwords($auteur)); ?></p>
                        <?php
                        switch($type){
                        case "article scientifique":
                         ?>
                        <div class="row">
                          <div class="col-md-4">
                            <h3 id="title">Titre : </h5> <p class="fw-bold "><?php echo(ucfirst($val_1)); ?></p>
                            <h3 id="title">Lien DOI :</h3> <a href="<?php echo($val_2); ?>" target="_blank" class="link-dark"><p class="fw-bold "><?php echo($val_2); ?></p></a>
                            <h3 id="title">Date de publication : </h3> <p class="fw-bold "><?php echo($val_4); ?></p>
                            <h3 id="title">Titre du journal : </h3> <p class="fw-bold "><?php echo($val_5); ?></p>
                            <h3 id="title">Quartile du journal : </h3> <p class="fw-bold "><?php echo($val_6); ?></p>
                            <h3 id="title">Volume : </h3> <p class="fw-bold "><?php echo($val_7); ?></p>
                            <h3 id="title">Facteur : </h3> <p class="fw-bold "><?php echo($val_8); ?></p>
                            <h3 id="title">Indexation : </h3> <p class="fw-bold "><?php echo($val_9); ?></p>
                            <h3 id="title">Site de la revue : </h3> <p class="fw-bold "><?php echo($val_10); ?></p>
                          </div>  
                          <div class="col-md-8">
                            <?php
                            if(!isset($_SESSION['mail'])){
                            ?>
                            <h1>contact</h1>
                            <?php 
                            }else{

                              ?>
                              <embed src="article/<?php echo($val_3);?>" type="application/pdf" width="700" height="800">
                            <?php
                            
                             }
                            ?>
                          </div>
                        </div>
                        
                        
                       
                        <?php
                        break;
                        ?>
                        
                        <?php
                        case "ouvrage scientifique":
                        ?>
                        <h3 id="title" >Titre : </h3> <p class="fw-bold " class="fw-bold "><?php echo($val_1); ?></p>
                        <h3 id="title">Éditeur :</h3> <p class="fw-bold "><?php echo($val_2); ?></p>
                        <h3 id="title">Lien éditeur : </h3> <p class="fw-bold "><?php echo($val_3); ?></p>
                        <h3 id="title">Edition : </h3> <p class="fw-bold "><?php echo($val_4); ?></p>
                        <h3 id="title">ISBN/Issn : </h3> <p class="fw-bold "><?php echo($val_5); ?></p>
                        <h3 id="title">Date : </h3> <p class="fw-bold "><?php echo($val_6); ?></p>
                        
                            
                        
                        <?php
                        break;
                        ?>

                        <?php
                        case "chapitre d'ouvrage":
                        ?>
                        <h3 id="title">Titre : </h3> <p class="fw-bold "><?php echo($val_1); ?></p>
                        <h3 id="title">Éditeur :</h3> <p class="fw-bold "><?php echo($val_2); ?></p>
                        <h3 id="title">Lien éditeur : </h3> <p class="fw-bold "><?php echo($val_3); ?></p>
                        <h3 id="title">Edition : </h3> <p class="fw-bold "><?php echo($val_4); ?></p>
                        <h3 id="title">ISBN/Issn : </h3> <p class="fw-bold "><?php echo($val_5); ?></p>
                        <h3 id="title">Date : </h3> <p class="fw-bold "><?php echo($val_6); ?></p>

                        <?php
                        break;
                        ?>

                        <?php
                        case "conference":
                        ?>
                        <div class="row">
                          <div class="col-md-4">
                            <h3 id="title">Titre : </h3> <p class="fw-bold "><?php echo($val_1); ?></p>
                            <h3 id="title">Conference name :</h3> <p class="fw-bold "><?php echo($val_4); ?></p>
                            <h3 id="title">Classe : </h3> <p class="fw-bold "><?php echo($val_5); ?></p>
                            <h3 id="title">Date : </h3> <p class="fw-bold "><?php echo($val_2); ?></p>
                          </div>
                          <div class="col-md-8">
                            <embed src="conférence/<?php echo($val_3);?>" type="application/pdf" width="700" height="800">
                          </div>
                        </div>
                        
                        
                        <?php
                        break;
                        ?>

                        <?php
                        case "brevet":
                        ?>
                        <div class="row">
                          <div class="col-md-4">
                            <h3 id="title">Titre : </h3> <p class="fw-bold "><?php echo($val); ?></p>
                            <h3 id="title">Sujet :</h3> <p class="fw-bold "><?php echo($val_2); ?></p>
                            <h3 id="title">Date : </h3> <p class="fw-bold "><?php echo($val_3); ?></p>
                          </div>
                          <div class="col-md-8">
                            <embed src="brevet/<?php echo($val_1);?>" type="application/pdf" width="700" height="800">
                          </div>
                        </div>
                        
                        
                        <?php
                        break;
                        ?>
                         <?php
                                
                         }
                         ?>
                         <h1></h1>
                     </div>
                </div>
            </div>





</body>
</html>