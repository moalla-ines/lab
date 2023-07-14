<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');

    
    
    require_once ("password-connection.php");  
    $query="SELECT * FROM `lrsetitformation` " ;
    $result=mysqli_query($con,$query);
     
    $query_conference="SELECT * FROM `lrsetitconference_manifestation` " ;
    $result_conference=mysqli_query($con,$query_conference);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gestion Manifestation</h1><br>
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

    <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Ajouter</h3>
                <p>Formation</p>
              </div>
              <div class="icon">
                <i class="fa fa-university" aria-hidden="true"></i>
              </div>
              <a href="ajout_formation.php" class="small-box-footer" target="blank_">AJOUT <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Ajouter</h3>
                <p>Conférence</p>
              </div>
              <div class="icon">
                <i class="fa fa-university" aria-hidden="true"></i>
              </div>
              <a href="ajout_conference.php" class="small-box-footer" target="blank_">AJOUT <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                
            <div class="container">
                
                <div class="card border-secondary  shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header text-center h4" style="color:#22577E">Conférence </div>
                        <div class="card-body ">
                            <div class="table-responsive table" id="search">
                            <table id="paper_table" class="table table-bordered table-striped" >
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th>Titre</th>
                                        <th>Lieu</th>
                                        <th >Classe</th>
                                        <th>Prix  (DT)</th>
                                        <th >Date Debut</th>
                                        <th >Date Fin</th>  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <tr >
                                            <?php
                                                $i=1;
                                                while($row_conference=mysqli_fetch_array($result_conference)){
                                                    $rows[] = $row_conference;
                                                    $id=$row_conference['0'];
                                               
                                                ?>
                                                <td ><?php echo($i)?></td>
                                                <td ><?php echo (ucfirst($row_conference['1']) )?></td>
                                                <td><?php echo (ucfirst($row_conference['2']))?></td>
                                                <td><?php echo ($row_conference['6'])?></td> 
                                                <td><?php echo ($row_conference['3'])?></td> 
                                                <td><?php echo ($row_conference['4'])?></td> 
                                                <td><?php echo ($row_conference['5'])?></td> 
                                                <td><a href="edit_conference.php?id=<?=($id);?>" class="text-light" target="_blank"><button type="button" class="btn btn-success"  >Modifier</button></a><button type="button" name="delete_conference_btn" class="btn btn-danger delete_conference_btn   mt-2 mx-1" value="<?=$id;?>">Supprimer</button></td>
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
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                <div class="card border-secondary  shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header text-center h4" style="color:#22577E">Formation </div>
                        <div class="card-body ">
                            <div class="table-responsive table" id="search">
                            <table id="formation_table" class="table table-bordered table-striped" >
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th>Titre</th>
                                        <th>Lieu</th>
                                        <th>Formateur</th>
                                        <th>Prix</th>
                                        <th>Date Debut</th>
                                        <th>Date Fin</th>  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <tr >
                                            <?php
                                                $i=1;
                                                while($row=mysqli_fetch_array($result)){
                                                    $rows[] = $row;
                                                    $id=$row['0'];
                                               
                                                ?>
                                                <td ><?php echo($i)?></td>
                                                <td ><?php echo (ucfirst($row['1']) )?></td>
                                                <td><?php echo (ucfirst($row['2']))?></td>
                                                <td><?php echo  (ucfirst($row['3'])) ?></td>
                                                <td><?php echo ($row['4'])?></td> 
                                                <td><?php echo ($row['5'])?></td> 
                                                <td><?php echo ($row['6'])?></td> 
                                                <td><a href="edit_formation.php?id=<?=($id);?>" class="text-light" target="_blank"><button type="button" class="btn btn-success"  >Modifier</button></a><button type="button" name="delete_paper_btn" class="btn btn-danger delete_paper_btn  mx-2" value="<?=$id;?>">Supprimer</button></td>
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
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
   
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
    include('includes/footer.php');
?>
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
              url: "delete_formation.php",
              data: {
                'id':id,
                'delete_paper_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Supprimé!',
                  'La formation est bien supprimé',
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
                      text: 'Formation non supprimé!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>
<script>
  $(document).ready(function () {
    $('.delete_conference_btn').click(function (e) { 
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
              url: "delete_conference.php",
              data: {
                'id':id,
                'delete_conference_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Supprimé!',
                  'La conférence est bien supprimé',
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
                      text: 'Conférence non supprimé!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>
<script>
$(document).ready(function () {
    $('#paper_table').DataTable({
        initComplete: function () {
            this.api()
                .columns([1,2,5,6   ])
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
$(document).ready(function () {
    $('#formation_table').DataTable({
        initComplete: function () {
            this.api()
                .columns([1,2,3,5,6])
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
