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
            <h1 class="m-0">Gestion publication</h1><br>
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
  <h1 class="well h3" style="color:#22577E">Ajouter publications </h1>
  </div>
  <div class="container">
  <div class="col mt-2 me-2">
	
        <form action="insert_publication.php" method="post" enctype="multipart/form-data">
					<div class="col-sm-10 mt-3 mx-2">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label class="fw-bold">auteur</label>
                                 <span class="obligatoryFieldMark">*</span>
								<input type="text" name="auteur" placeholder="Enter First Name Here.." class="form-control mt-2 "   >
							</div>
							<div class="col-sm-6 form-group">
								<label class="fw-bold">titre</label>
                                 <span class="obligatoryFieldMark">*</span>
								<input type="text" name="titre" placeholder="Enter title Here.." class="form-control mt-2" ><br>
							</div>
						</div>	
                        <div class="col-sm-6 form-group">
								<label class="fw-bold">type</label>
                                 <span class="obligatoryFieldMark">*</span>
								<input type="text" name="type" placeholder="Enter type Here.." class="form-control mt-2" ><br>
							</div>
                        

                                    <div class="row">
                        <div class="col-sm-6 form-group"><br>
                            <label class="fw-bold">mail_auteur</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" name="email" class="form-control mt-2" placeholder="Votre E-mail">
                        </div><br>
                        
                        </div>
                        <div class="row">
                        <div class="col-sm-6 form-group"><br>
                            <label class=" fw-bold">soumissionnaire</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" name="soumissionnaire" class="form-control mt-2" placeholder="mail">
                        </div><br>
                        
                        </div>
                        
                        <div class="form-group>

                        <div class="from-group "><br>
                        <label for="date" class="control-label required fw-bold ">Date </label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="date" class="form-control mt-2" name="date" id="date" value="<?=$val_10;?>">
                        </div><br>

                           
                              		
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
