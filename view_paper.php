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
    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.css"/>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    </style>
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
</head>
<body>
<?php
 

include ('check_login.php');

$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$etat=$_SESSION['etat'];
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$mail=$_SESSION['mail'];

require_once ("password-connection.php");  


$query="SELECT * FROM `lrsetitauteur_publication` WHERE  `soumissionnaire`= '$mail' OR `mail_auteur` LIKE '%$mail%' " ;
$result=mysqli_query($con,$query);

?>

<?php
  if(!isset($_SESSION['mail'])){ 
    header('location: index.php');
    }
?>

<nav class="navbar navbar-expand-lg navbar-light  sticky-top" style="background-color:#EEEEEE;" >
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
      <div class="input-text mt-2">
        <span class="fw-bold"> BIENVENUE : <?php echo (strtoupper($prenom.' '.$nom));?></span>
      </div>
      <div class="dropdown mx-4">
        
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
    <h1 class="container "style="text-color:white;">
      gérer publication(s)
    </h1>
  </section>

<div class="row">
  
    <div class="card border-light shadow-sm p-3 mb-5 bg-body rounded" style="width: 18rem; height:100%;">
      <div class="card-header fw-bold">
        DASHBOARD PANEL
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><p class="nav-header" style="text-transform:uppercase;">procédures des papiers</p>
          <p><i class="bi bi-file-earmark-plus"></i> <a href="add_paper.php" class="link-primary"> Ajouter une publication</a></p>
          <p><i class="bi bi-archive"></i> <a href="view_paper.php" class="link-primary"> Gérer mes publication(s)  </a></p>
        </li>
        <li class="list-group-item">
          <p><i class="bi bi-file-earmark-plus"></i> <a href="projet.php" class="link-primary"> Ajouter une production </a></p>
          <p><i class="bi bi-archive"></i> <a href="view_projet.php" class="link-primary"> Gérer mes production(s)  </a></p>
        </li>
          <li class="list-group-item">
          <p><i class="bi bi-person"></i> <a href="update_profile.php" class="link-primary"> Mettre à jour mon profil</a></p>
          <p><i class="bi bi-lock"></i> <a href="logout.php" class="link-primary">Déconnecter</a></p>
        </li>
      </ul>
    </div>
  


<div class="col-9 mt-1">
    <div class="card border-secondary shadow p-3 mb-5 bg-body rounded  ">
      <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Publications</div>
        <div class="card-body">
          <div class="table-responsive table">
            <table id="paper_table" class="table table-bordered table-striped">
              <thead class="table-primary  ">
                <tr>
                  <th>Réf</th>
                  <th>Type</th>
                  <th>Titre</th>
                  <th>Auteurs</th>
                  <th>Soumissionnaire</th>
                  <th>Date</th>
                  <th>Gestion</th>
                                  
                </tr>
              </thead>
               
              <tbody class="table-primary">
                <tr >
                  <?php
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                      $id=$row['0'];
                      $id_papier=$row['1'];
                      $tab=$row['2'];
                      
                    ?>
                    <td ><?php echo($i)?></td>
                    <td ><?php echo (ucfirst($row['2']) )?></td>
                    <td><a href="description_publication.php?id_papier=<?=($id_papier);?>&type=<?=($tab);?>&id=<?=($id);?>" class="link-dark"><?php echo ($row['3'])?></a></td>
                    <td><?php echo ucwords($row['4']) ?></td>
                    <td><?php echo ($row['6'])?></td> 
                    <td><?php echo ($row['7'])?></td> 
                    <td><a href="papier_edit.php?id_papier=<?=($id_papier);?>&type=<?=($tab);?>&id=<?=($id);?> "target="_blank"><button class="btn btn-success">Modifier</button></a><button type="button" name="delete_paper_btn" class="btn btn-danger delete_paper_btn mt-2" value="<?=$id;?>" >Supprimer</button></td>
                </tr>
                <?php
                $i++;
                }
                ?>
              </tbody>
              <tfoot>
                              <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                              </tr>
                          </tfoot>
    </table>
    </div>
   

</div> 
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



<?php
  include('footer.php')
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>

$(document).ready(function () {
    $('#paper_table').DataTable({
        initComplete: function () {
            this.api()
                .columns([1,4])
                .every(function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
 
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                });
        },
    });
});
</script>


<script>
  $(document).ready(function () {
    $('.delete_paper_btn').click(function (e) { 
      e.preventDefault();
      var id=$(this).val();

      Swal.fire({ 
        title: 'Êtes-vous sûr ?',
        text: "Vous ne pourrez pas réparer ça!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              type: "post",
              url: "delete_paper.php",
              data: {
                'id':id,
                'delete_paper_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Supprimé!',
                  'La publication est bien supprimé',
                  'success'
                ).then((result) => {
                  location.reload();
                }).catch((err) => {
                  
                });
                
                }else if(respons ==500)
                {
                  Swal.fire({
                      icon: 'error',
                      title: 'Erreur',
                      text: 'Publication non supprimé!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>

</body>
</html>