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
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    </style>
    <link rel="stylesheet" href="sweetalert2.min.css">
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
            Thème de recherche
          </a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="papers.php"  style="color:#0d47a1"> 
            Publication
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

      
      
    <form class="d-flex" action="check_login.php" method="post">
      <div class="input-group w-50 mt-2">
          <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
            </svg>
          </span>
          <input type="email" class="form-control me-2" placeholder="E-mail" required="required" name="login" aria-label="Input group example" aria-describedby="basic-addon1">
      </div>
      <div class="input-group w-50 mt-2">
        <span class="input-group-text" id="basic-addon1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
          </svg>
        </span>
        <input class="form-control me-2" type="password" placeholder="Mot de Passe" name="password" aria-label="Input group example" aria-describedby="basic-addon1">
      </div>
        <button class="btn btn-outline-primary mt-2 " type="submit" name="submit" >Login</button>
    </form>

        <div class="pb-3 ps-2 mt-2">
          <a href="inscription.php" target="_blank"><button class="btn btn-outline-primary" type="submit" id="submit">Inscription</button></a>
        </div>
        
    </div>
  </div>
  <div >
   
   
</div>
  
</nav>


</body>
</html>