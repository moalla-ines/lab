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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="css/animate.css">
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



require_once ("password-connection.php");  
$id=$_GET['id'];
$mail=$_GET['mail'];
$query="SELECT * FROM `lrsetitmembre` WHERE `id`='$id' " ;
$result=mysqli_query($con,$query);

$query_pub="SELECT * FROM `lrsetitauteur_publication` WHERE  `soumissionnaire`= '$mail' OR `mail_auteur` LIKE '%$mail%' " ;
$result_pub=mysqli_query($con,$query_pub);

$query_prod="SELECT * FROM `lrsetitauteur_projet` WHERE `soumissionnaire`= '$mail' OR `mail_encadrant` LIKE '%$mail%' " ;
$result_prod=mysqli_query($con,$query_prod);
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
    while($row=mysqli_fetch_array($result)) :
    $id=$row['0'];
    ?>
    <div class="d-flex justify-content-center">
      <div class="col-md-5">
        <div class="card border-primary shadow p-3 mt-3 bg-body rounded" >
          
          <div class="card-body">
            <div class="row">
              <div class="col-sm-9">
                <h3 class="card-title" id="title"><?php echo($row['2'].' '.$row['1']); ?></h3><br>
                <p class="card-text fw-bold"><i class="bi bi-envelope-fill"></i> Mail : <?php echo($row['8']); ?></p>
                <p class="card-text fw-bold"><i class="bi bi-award-fill"></i> Grade : <?php echo($row['7']); ?></p>
                <p class="card-text fw-bold"><i class="bi bi-gear-wide-connected"></i> Spécialité : <?php echo($row['10']); ?></p>
                <p class="card-text fw-bold"><i class="bi bi-mortarboard-fill"></i> Diplome : <?php echo ($row['11']); ?></p>
                <p class="card-text fw-bold"><i class="bi bi-linkedin"></i> LinkedIn : <a href="<?php echo($row['18']); ?>" target="blank_"><?php echo($row['18']); ?></a></p>
                <p class="card-text fw-bold"><i class="bi bi-google"></i> Google Scholar : <a href="<?php echo($row['19']); ?>" target="blank_"><?php echo($row['19']); ?></a></p>
                <a  target="_blank"><button type="button" class="btn btn-primary" onclick="showPublication()">Publications</button></a>
                <a  target="_blank"><button type="button" class="btn btn-primary" onclick="showProduction()">Productions Scientifiques</button></a>
              </div>
              <div class="col-sm-3 text-right">
                <?php echo( '<img src="data:image;base64,'.base64_encode($row['22']).'" class="rounded mt-3" alt="user-avatar" style="width:100px; height="100px""') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
endwhile;
?>
</div>

<div class="d-flex justify-content-center">
  <div class="card border-secondary mt-3 shadow p-3 mb-5 bg-body rounded wow fadeInDown col-md-7" style="display:none" id="publication">
                  <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Publications</div>
                  <div class="card-body  wow fadeInDown ">
                      <div class="table-responsive table" id="search">
                          <table id="paper_table" class="table table-bordered table-striped">
                              <thead  class="table-primary  ">
                                  <tr>
                                      <th >#</th>
                                      <th>Type</th>
                                      <th>Titre</th>
                                      <th>Auteurs</th>
                                      <th >Date</th>
                                      <th>Description</th>
                                      
                                  </tr>
                              </thead>
                              <tbody class="table-primary">
                              <tr >
                                          <?php
                                            $i=1;
                                            while($row_pub=mysqli_fetch_array($result_pub)){
                                              $id=$row_pub['0'];
                                              $id_papier=$row_pub['1'];
                                              $tab=$row_pub['2'];
                                            ?>
                                            <td ><?php echo($i)?></td>
                                            <td ><?php echo (ucfirst($row_pub['2']) )?></td>
                                            <td><?php echo ($row_pub['3'])?></td>
                                            <td><?php echo ucwords($row_pub['4']) ?></td>
                                            <td><?php echo ($row_pub['7'])?></td>
                                            <td><a href="description_publication.php?id_papier=<?=($id_papier);?>&type=<?=($tab);?>&id=<?=($id);?>" target="blank_"><button type="button" class="btn btn-primary openBtn" >Description</button></a></td>
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
          
</div>
<div class="d-flex justify-content-center">
  <div class="card border-secondary shadow p-3 mb-5 bg-body rounded col-md-7 mt-3 "style="display:none" id="production">
            <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Production scientifique</div>
              <div class="card-body">
                <div class="table-responsive table">
                  <table id="production_table" class="table table-bordered table-striped">
                    <thead class="table-primary  ">
                      <tr>
                        <th>Réf</th>
                        <th>Type</th>
                        <th>Titre</th>
                        <th>Encandrants</th>
                        <th>Date</th>
                        <th>Soumissionnaire</th>
                        <th>Gestion</th>
                                        
                      </tr>
                    </thead>
                    
                    <tbody class="table-primary">
                      <tr >
                        <?php
                          $i=1;
                          while($row=mysqli_fetch_array($result)){
                            $id=$row['0'];
                            $id_projet=$row['1'];
                            $tab=$row['2'];
                            
                          ?>
                          <td ><?php echo($i)?></td>
                          <td ><?php echo (ucfirst($row['2']) )?></td>
                          <td><a href="description_production.php?id_papier=<?=($id_projet);?>&type=<?=($tab);?>&id=<?=($id);?>" class="link-dark"><?php echo ($row['3'])?></a></td>
                          <td><?php echo ucwords($row['4']) ?></td>
                          <td><?php echo ($row['6'])?></td> 
                          <td><?php echo ($row['7'])?></td> 

                          <td><a href="projet_edit.php?id_projet=<?=($id_projet);?>&type=<?=($tab);?>&id=<?=($id);?> "target="_blank"><button class="btn btn-success">Modifier</button></a><button type="button" name="delete_paper_btn" class="btn btn-danger delete_paper_btn mt-2" value="<?=$id;?> " >Supprimer</button></td>
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
                                        <th></th>
                                    </tr>
                                </tfoot>
                </table>
            </div>
        

            </div> 
          </div>
          </div>
</div>



</body>
</html>
<?php

include('footer.php');
?>

<script src="scripts.js"></script>
<script>
  new WOW().init();
</script>
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
    $('#production_table').DataTable({
        initComplete: function () {
            this.api()
                .columns([1,5])
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
