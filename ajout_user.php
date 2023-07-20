<?php
  include('includes/header.php');
  include('includes/topbar.php');
  include('includes/sidebar.php');
  include('authentification.php');
    
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gestion Utilisateurs</h1><br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <?php
            if(isset($_SESSION['erreur'])){
                ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo($_SESSION['erreur']);?>
                        </div>

            <?php
                unset($_SESSION['erreur']);
            }   
            ?>
            

    <div class="container ">
  <div class="card mt-3 border-dark  " >
    <div class="card-header text-center ">
      <div id="success"></div>
  <h1 class="well h3" style="color:#22577E">Ajout du compte utilisateur </h1>
  </div>
  <div class="container">
  <div class="col mt-2 me-2">
	
        <form action="insert_user.php" method="post" enctype="multipart/form-data">
					<div class="col-sm-10 mt-3 mx-2">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Nom</label>
                                 <span class="obligatoryFieldMark">*</span>
								<input type="text" name="nom" placeholder="Enter First Name Here.." class="form-control mt-2 "   >
							</div>
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Prénom</label>
                                 <span class="obligatoryFieldMark">*</span>
								<input type="text" name="prenom" placeholder="Enter Last Name Here.." class="form-control mt-2" ><br>
							</div>
						</div>	
                        
                        <div class="form-group">
                            <label class="fw-bold">CIN</label>
                            <input type="number" name="cin" placeholder="CIN" class="form-control mt-2"  id="cin" ><br>
                        </div>

                                    <div class="row">
                        <div class="col-sm-6 form-group"><br>
                            <label class="fw-bold">Email</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" name="email" class="form-control mt-2" placeholder="Votre E-mail">
                        </div><br>
                        <div class="col-sm-6 form-group"><br>
                            <label class="fw-bold" >Mot de passe</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="password" name="mdp" class="form-control mt-2" placeholder="Mot de passe" id="password" onkeyup="passCheck(this.value)"  ><br>
                            <ul>
                            <li><span class="password-check" class="fw-light ">Minimum 8 caractéres et maximum 15 caractéres.</span></li>
                            <li><span class="password-check" class="fw-light ">Compris au minimum une lettre en majuscule et une en minuscule.</span></li>
                            <li><span class="password-check" class="fw-light ">Compris au minimum un nombre. </span></li>
                            </ul>
                        </div>
                        </div>
                        
                        
                        <div class="form-group>

                        <div class="from-group "><br>
                        <label for="datedenaissance" class="control-label required fw-bold ">Date de naissance</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="date" class="form-control mt-2" name="date" id="datedenaissance" value="<?=$val_10;?>">
                        </div><br>

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label class="fw-bold">Téléphone</label>
                                    <input type="number" name="tel"placeholder="Enter Phone Number Here.." class="form-control mt-2" > 
                                </div>
                              		
                             </div>

                        </div>	
                    
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
    include('includes/footer.php')
?>
