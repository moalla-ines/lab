<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');

    
    require_once ("password-connection.php");  

    $query="SELECT * FROM `lrsetitcooperation` " ;
    $result=mysqli_query($con,$query);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gestion coopérations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Ajouter</h3>
                <p>Coopération</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-copy"></i>
              </div>
              <a href="ajout_cooperation.php" class="small-box-footer">AJOUT <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="container">
               
                <div class="card border-secondary shadow p-3 mb-5 bg-body rounded  ">
                    <div class="card-header text-center h4" style="color:#22577E">Coopérations</div>
                        <div class="card-body">
                            <div class="table-responsive table">
                            <table id="paper_table" class="table table-bordered table-striped">
                                <thead >
                                    <tr>
                                    <th>Réf</th>
                                    <th>Type</th>
                                    <th>Institution</th>
                                    <th>Intervenant</th>
                                    <th>Date debut</th>
                                    <th>Date fin</th>
                                    <th>Gestion</th>
                                    </tr>
                                </thead>
                                
                              <tbody >
                                <tr >
                                    <?php
                                      $i=1;
                                      while($row=mysqli_fetch_array($result)){
                                      $id=$row['0'];
                                   
                                    ?>
                                    <td ><?php echo($i)?></td>
                                    <td ><?php echo (ucfirst($row['1']) )?></td>
                                    <td><?php echo ($row['2'])?></td>
                                    <td><?php echo ($row['3'])?></td>
                                    <td><?php echo ($row['5'])?></td> 
                                    <td><?php echo ($row['6'])?></td> 
                                    <td><a href="edit_cooperation.php?id=<?=($id);?>" target="_blank"><button class="btn btn-success">Modifier</button></a>
                                    <button type="button" name="delete_paper_btn" class="btn btn-danger delete_paper_btn mx-2 mt-2" value="<?=$id;?>">Supprimer</button></td>
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
    </section>
            

           

        </div>






    </section>
</div>





</div>




<?php
    include('includes/footer.php');
?>
<script>

$(document).ready(function () {
    $('#paper_table').DataTable({
        initComplete: function () {
            this.api()
                .columns([1,2])
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
              url: "delete_cooperation.php",
              data: {
                'id':id,
                'delete_paper_btn': true
              },
              
              success: function (response) {
                if(response==200)
                {
                  Swal.fire(
                  'Supprimé!',
                  'La coopération est bien supprimé',
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
                      text: 'Coopération non supprimé!',
                    })
                }
              }
          });
  }
})
    });
  });
</script>