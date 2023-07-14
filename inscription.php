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
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include ('check_login.php');
include ('nav.php');
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
<?php

if(isset($_SESSION['success'])){
  ?>
 <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  </svg>
  <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>
          <?php echo($_SESSION['success']);?>
      </div>
  </div>

  <?php
  unset($_SESSION['success']);
}   
?>
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
<div class="container ">
  <div class="card mt-3 w-78 border-dark mx-auto " >
    <div class="card-header text-center ">
      <div id="success"></div>
  <h1 class="well" style="color:#22577E" >Inscription</h1>
  </div>
  <div class="container">
  <div class="col-lg-12 well mt-2 me-2">
	  <div class="row">
        <form action="register.php" method="post" enctype="multipart/form-data">
					<div class="col-sm-12 mt-2">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Nom</label>
                <span class="obligatoryFieldMark">*</span>
								<input type="text" name="nom" placeholder="Nom" class="form-control mt-2 " required >
							</div>
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Prénom</label>
                <span class="obligatoryFieldMark">*</span>
								<input type="text" name="prenom" placeholder="Prénom" class="form-control mt-2"  required><br>
							</div>
						</div>	

            <div class="form-group">
              <label class="fw-bold">CIN</label>
              <input type="number " name="cin" placeholder="CIN" class="form-control mt-2"  id="cin" required ><br>
             
                <span id="cin-check" class="fw-light "></span>
              
            </div>
            <div class="row">

              <div class="col-sm-6 form-group">
                <label class="fw-bold">Num passport (étranger)</label>
                <input type="number" name="numpassport" placeholder="Num passport" class="form-control mt-2" ><br>
              </div>

              <div class="col-sm-6 form-group">
                <label class="fw-bold">CNRPS</label>
                <input type="number" name="cnrps" placeholder="CNRPS" class="form-control mt-2" ><br>
              </div>
            </div>
            <label class="fw-bold">Genre</label><span class="obligatoryFieldMark">*</span><br><br>
            
            <div class="form-check">
              
                <input class="form-check-input" type="radio" name="gender" id="female" value="Féminin"  >
                <label class="form-check-label fw-light" for="female" > Féminin</label>
                <span class="obligatoryFieldMark">*</span>
            </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Masculin" >
                <label class="form-check-label fw-light" for="male" >Masculin</label>
                <span class="obligatoryFieldMark">*</span>
              </div>
              <br>
							
                <label class="mr-sm-4 fw-bold" for="inlineFormCustomSelect">Grade</label>
                <span class="obligatoryFieldMark">*</span>
                <select  name="grade" class="form-select mt-2" required>
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
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="email" class="form-control mt-2" placeholder="Votre E-mail" required>
              </div><br>
              <div class="col-sm-6 form-group"><br>
                <label class="fw-bold" >Mot de passe</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="password" name="mdp" class="form-control mt-2" placeholder="Mot de passe" id="password" onkeyup="passCheck(this.value)" required><br>
                <ul>
                  <li><span class="password-check" class="fw-light ">Minimum 8 caractéres.</span></li>
                  <li><span class="password-check" class="fw-light ">Compris au minimum une lettre en majuscule et une en minuscule.</span></li>
                  <li><span class="password-check" class="fw-light ">Compris au minimum un nombre. </span></li>
                </ul>
              </div>
            </div>
            
            <div class="col-sm-6 form-group">
              <label class="fw-bold">Photo (Image JPG/PNG, Taille maximale: 1024 ko)</label>
                <input type="file" name="photo" class="form-control mt-2" >
            </div>
						
            
            <div class="row">
              <div class="col-sm-6 form-group"><br>
								<label class="fw-bold">Spécialité</label>
								<input type="text" name="specialite" placeholder="Spécialité" class="form-control mt-2" required >
							</div>	

							<div class="col-sm-6 form-group"><br>
								<label class="fw-bold">Dernier Diplôme</label>
								<input type="text" name="diplome" placeholder="Dernier Diplôme" class="form-control mt-2" required>
							</div>		
            </div>    

            <div class="from-group "><br>
              <label for="datedenaissance" class="control-label required fw-bold ">Date de naissance</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="date" class="form-control mt-2" name="date" id="datedenaissance" required>
            </div><br>

            
            <div class="form-group">
              <label class="fw-bold">Fonction administrative</label>
              <input type="text" name="ftadmin" placeholder="Fonction administrative" class="form-control mt-2" ><br>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="fw-bold">H-index (Scopus)</label>
                <input type="text" name="scopus" placeholder="H-index (Scopus)" class="form-control mt-2" ><br>
              </div>

              <div class="col-sm-6 form-group">
                <label class="fw-bold">Identification ORCID</label>
                <input type="text" name="orcid" placeholder="Identification ORCID" class="form-control mt-2" ><br>
              </div>
            </div>
			  	<div class="row">
				  	<div class="col-sm-6 form-group">
						  <label class="fw-bold">Téléphone Mobile</label>
              
					  	<input type="number" name="tel"placeholder="Téléphone mobile" class="form-control mt-2" required > 
				  	</div>
           <div class="col-sm-6 form-group">
						<label class="fw-bold">Téléphone Fax</label>
            
						<input type="number" name="telfax" placeholder="Téléphone Fax" class="form-control mt-2" id ="tel" > 
				  	</div>		
          </div>
          
            </div>
            </div>	
            <div class="row">
				  	<div class="col-sm-6 form-group">
						  <label class="fw-bold">Lien pour LinkedIn</label>
              
					  	<input type="url" name="linkedin" placeholder="LinkedIn" class="form-control mt-2" required > 
				  	</div>
           <div class="col-sm-6 form-group">
						<label class="fw-bold"> Lien pour Google scholar</label>
            
						<input type="url" name="scholar" placeholder=" google scholar" class="form-control mt-2" id ="tel" required> 
				  	</div>		
          </div>
          
          <div class="from-group ">
              <label for="datedenaissance" class="control-label required fw-bold ">Date du dernier diplôme</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="date" class="form-control mt-2" name="datediplome" id="datediplome" required>
            </div><br>
            <div class="form-group">
              <label class="fw-bold">Description</label>
              <textarea name="Description" class="form-control mt-2" cols="20" rows="5"></textarea>
            </div><br>
            <div class="d-flex justify-content-center">
					    <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" name="submit">Submit</button>	
            </div>
            </div>
				</form> 
				</div>
	</div>
</div>
</div>
<?php
include('footer.php');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="scripts.js"></script>

</body>
</html>