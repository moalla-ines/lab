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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="css/animate.css">
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


require_once ("password-connection.php");  
$query="SELECT * FROM `lrsetitauteur_publication` " ;
$result=mysqli_query($con,$query);

$query_visiteur="SELECT * FROM `lrsetitauteur_publication` WHERE approve='1'";
$result_visiteur=mysqli_query($con,$query_visiteur);
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
          
            <div class="card border-secondary mt-5 shadow p-3 mb-5 bg-body rounded wow fadeInDown" >
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
                            <tr > <?php
                                        if(isset($_SESSION['mail'])){

                                          $i=1;
                                          while($row=mysqli_fetch_array($result)){
                                            $id=$row['0'];
                                            $id_papier=$row['1'];
                                            $tab=$row['2'];
                                          ?>
                                          <td ><?php echo($i)?></td>
                                          <td ><?php echo (ucfirst($row['2']) )?></td>
                                          <td><?php echo ($row['3'])?></td>
                                          <td><?php echo ucwords($row['4']) ?></td>
                                          <td><?php echo ($row['7'])?></td>
                                          <td><a href="description_publication.php?id_papier=<?=($id_papier);?>&type=<?=($tab);?>&id=<?=($id);?>" target="blank_"><button type="button" class="btn btn-primary openBtn" >Description</button></a></td>
                                      </tr>
                                      <?php
                                      $i++;
                                      }
                                    }else{

                                      ?>
                                        <?php
                                          $i=1;
                                          while($row_visiteur=mysqli_fetch_array($result_visiteur)){
                                            $id=$row_visiteur['0'];
                                            $id_papier=$row_visiteur['1'];
                                            $tab=$row_visiteur['2'];
                                          ?>
                                          <td ><?php echo($i)?></td>
                                          <td ><?php echo (ucfirst($row_visiteur['2']) )?></td>
                                          <td><?php echo ($row_visiteur['3'])?></td>
                                          <td><?php echo ucwords($row_visiteur['4']) ?></td>
                                          <td><?php echo ($row_visiteur['7'])?></td>
                                          <td><a href="description_publication.php?id_papier=<?=($id_papier);?>&type=<?=($tab);?>&id=<?=($id);?>" target="blank_"><button type="button" class="btn btn-primary openBtn" >Description</button></a></td>
                                      </tr>
                                      <?php
                                      $i++;
                                      }
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
       
    </body>
   
</html>




<?php

include('footer.php');
?>
<script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>

<script>
  
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script>
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
 
</script>
</body>
</html>