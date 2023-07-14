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
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-3">
                <h1 class="section-title" id="title">
                    <span>CONTACT</span>
                </h1>
                <div class="underline mr-auto ml-auto mb-2">
                    <p>Contactez-nous !</p>
                </div>
               
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-8">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.268951217937!2d10.718968499999999!3d34.7236145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13002ca377455253%3A0xdcd0e9a76b8d138e!2sHigher%20Institute%20of%20Biotechnology%20of%20Sfax!5e0!3m2!1sen!2stn!4v1654521990543!5m2!1sen!2stn" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-md-4">
                            <h2 id="title" class="mt-2">DEMANDE DE CONTACT</h2><br>
                            <form action="sendemail.php" method="post">
                                <div class="form-group">
                                    <label class="fw-bold" >Nom et Prénom</label>
                                    <input type="text" name="name" class="form-control mt-2 mb-2" placeholder="Nom et Prénom">
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control mt-2 mb-2" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" >Téléphone</label>
                                    <input type="phone" name="phone" class="form-control mt-2 mb-2" placeholder="Téléphone">
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" >Message</label>
                                    <textarea class="form-control mt-2" name="message" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>








<?php
include('footer.php');
?>