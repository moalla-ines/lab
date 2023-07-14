<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    
    require_once ("password-connection.php");  
    $id=$_GET['id_membre'];
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
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gestion Membres</h1><br>
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


    <div class="container ">
  <div class="card mt-3 border-dark  " >
    <div class="card-header text-center ">
      <div id="success"></div>
  <h1 class="well h3" style="color:#22577E">Mis à jour du compte : <?php echo($val_0 .' '. $val); ?> </h1>
  </div>
  <div class="container">
  <div class="col mt-2 me-2">
	
        <form action="update_membre.php?&id=<?=($id);?>" method="post" enctype="multipart/form-data">
					<div class="col-sm-10 mt-3 mx-2">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Nom</label>
                                 
								<input type="text" name="nom" placeholder="Enter First Name Here.." class="form-control mt-2 " value="<?=$val;?>"  >
							</div>
							<div class="col-sm-6 form-group">
								<label class="fw-bold">Prénom</label>
                                 
								<input type="text" name="prenom" placeholder="Enter Last Name Here.." class="form-control mt-2" value="<?=$val_0;?>" ><br>
							</div>
						</div>	
                        
                        <div class="form-group">
                            <label class="fw-bold">CIN</label>
                            <input type="number" name="cin" placeholder="CIN" class="form-control mt-2"  id="cin" value="<?=$val_1;?>" ><br>
                        </div>

                        <div class="row">
                        
                            <div class="col-sm-6 form-group">
                                <label class="fw-bold">Num passport (étranger)</label>
                                <input type="number" name="numpassport" placeholder="Num passport" class="form-control mt-2" value="<?=$val_2;?>" ><br>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label class="fw-bold">CNRPS</label>
                                <input type="number" name="cnrps" placeholder="CNRPS" class="form-control mt-2" value="<?=$val_3;?>"><br>
                            </div>
                        </div>

                        <label class="fw-bold">Genre</label><br><br>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Féminin"  >
                            <label class="form-check-label fw-light" for="female" > Féminin</label>
                            
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Masculin" >
                            <label class="form-check-label fw-light" for="male" >Masculin</label>
                            
                        </div>
                        <br>
                                        
                            <label class="mr-sm-4 fw-bold" for="inlineFormCustomSelect">Grade</label>
                            
                            <select  name="grade" class="custom-select" value="<?=$val_5;?>" selected>
                              <option value="" selected disabled hidden>Choisir une grade</option>
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
                            
                            <input type="text" name="email" class="form-control mt-2" placeholder="Votre E-mail" value="<?=$val_6;?>">
                        </div><br>
                        <div class="col-sm-6 form-group"><br>
                            <label class="fw-bold" >Mot de passe</label>
                            
                            <input type="password" name="mdp" class="form-control mt-2" placeholder="Mot de passe" id="password" onkeyup="passCheck(this.value)" value="<?=$val_7;?>" ><br>
                            <ul>
                            <li><span class="password-check" class="fw-light ">Minimum 8 caractéres et maximum 15 caractéres.</span></li>
                            <li><span class="password-check" class="fw-light ">Compris au minimum une lettre en majuscule et une en minuscule.</span></li>
                            <li><span class="password-check" class="fw-light ">Compris au minimum un nombre. </span></li>
                            </ul>
                        </div>
                        </div>
                        
                        <div class="col-sm-6 form-group">
                        <label class="fw-bold">Photo (Image JPG/PNG, Taille maximale: 1024 ko)</label>
                            <input type="file" name="photo" class="form-control mt-2"  >
                        </div>
                                    
                        
                        <div class="row">
                        <div class="col-sm-6 form-group"><br>
                                            <label class="fw-bold">Spécialité</label>
                                            <input type="text" name="specialite" placeholder="Enter Designation Here.." class="form-control mt-2" value="<?=$val_8;?>" >
                                        </div>	

                                        <div class="col-sm-6 form-group"><br>
                                            <label class="fw-bold">Diplome</label>
                                            <input type="text" name="diplome" placeholder="Enter Designation Here.." class="form-control mt-2" value="<?=$val_9;?>" >
                                        </div>		
                        </div>    

                        <div class="from-group "><br>
                        <label for="datedenaissance" class="control-label required fw-bold ">Date de naissance</label>
                        
                        <input type="date" class="form-control mt-2" name="date" id="datedenaissance" value="<?=$val_10;?>">
                        </div><br>

                        <div class="form-group">
                            <label class="fw-bold">Fonction administrative</label>
                            <input type="text" name="ftadmin" placeholder="Fonction administrative" class="form-control mt-2" value="<?=$val_11;?>" ><br>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="fw-bold">H-index (Scopus)</label>
                                <input type="text" name="scopus" placeholder="H-index (Scopus)" class="form-control mt-2"value="<?=$val_12;?>" ><br>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label class="fw-bold">Identification ORCID</label>
                                <input type="text" name="orcid" placeholder="Identification ORCID" class="form-control mt-2"value="<?=$val_13;?>" ><br>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label class="fw-bold">Tél Mobile</label>
                                    <input type="number" name="tel"placeholder="Enter Phone Number Here.." class="form-control mt-2"value="<?=$val_14;?>" > 
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="fw-bold">Tél Fax</label>
                                    <input type="number" name="telfax"placeholder="Enter Phone Number Here.." class="form-control mt-2" id ="tel"value="<?=$val_15;?>" > 
                                </div>		
                             </div>
                            <div class="from-group ">
                                 <label for="datedenaissance" class="control-label required fw-bold ">Date du dernier diplôme</label>
                                
                                <input type="date" class="form-control mt-2" name="datediplome" id="datediplome" value="<?=$val_16;?>" >
                            </div><br>
                        </div>
                        </div>	
                    
                        <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" name="update">Update</button>	
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
