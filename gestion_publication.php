<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');

    
    
    require_once ("password-connection.php");  
    $query="SELECT * FROM `lrsetitauteur_publication` WHERE `existe` = 1 " ;
    $result=mysqli_query($con,$query);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gestion Publications</h1><br>
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
            if(isset($_SESSION['status'])){
                ?>
                        <div class="alert alert-success" role="alert">
                        <?php echo($_SESSION['status']);?>
                        </div>

            <?php
                unset($_SESSION['status']);
            }   
            ?>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
           
          </div>
                
            <div class="container">
                
                <div class="card border-secondary  shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header text-center h4" style="color:#22577E">Publications</div>
                        <div class="card-body ">
                            <div class="table-responsive table" id="search">
                            <table id="paper_table" class="table table-bordered table-striped">
                                <thead  >
                                    <tr>
                                        <th >#</th>
                                        <th>Type</th>
                                        <th>Titre</th>
                                        <th>Auteurs</th>
                                        <th>Soumissionnaire</th>
                                        <th >Date</th>
                                        <th>Gestion</th>
                                        <th>Etat</th>
                                        
                                    </tr>
                                </thead>
                                <tbody >
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
                                                <td><u><a href="description_publication.php?id_papier=<?=($id_papier);?>&type=<?=($tab);?>&id=<?=($id);?>" style="color:#000000" target="blank_"><?php echo ($row['3'])?></a></u></td>
                                                <td><?php echo ucwords($row['4']) ?></td>
                                                <td><?php echo ($row['6'])?></td> 
                                                <td><?php echo ($row['7'])?></td> 
                                                <td><a href="edit_publication.php?id_papier=<?=($id_papier);?>&type=<?=($tab);?>&id=<?=($id);?>" class="text-light" target="_blank"><button type="button" class="btn btn-success"  >Modifier</button></a><button type="button" name="delete_paper_btn" class="btn btn-danger delete_paper_btn mx-2" value="<?=$id;?>">Supprimer</button></td>
                                                <td>
                                                  <?php 
                                                  if($row['approve']=="1"){
                                                    ?>
                                                    <h5 style="color:#008000">Publication approuvé</h5>
                                                    <?php
                                                  } 
                                                  else
                                                  {?>
                                                  
                                                  <button type="button" name="approve_pub_btn" class="btn btn-success approve_pub_btn mx-2" value="<?=$id;?>">Approuvé</button> <h5 style="color:#FF0000">Non approuvé</h5 >  
                                                  <?php
                                                  }
                                                  ?></td>     
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
<script>
  $(document).ready(function () {
    $('.approve_pub_btn').click(function (e) { 
      e.preventDefault();
      var id=$(this).val();

      Swal.fire({ 
        title: 'Êtes-vous sûr ?',
        text: "Vous allez approuvé cet publication!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Approuvé!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              type: "post",
              url: "approve_pub.php",
              data: {
                'id':id,
                'approve_pub_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Approuvé!',
                  'Publication est bien approuvé',
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
                      text: 'Publication non approuvé!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>