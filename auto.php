<?php



require_once ("password-connection.php");

$output='';

$query="SELECT  `prenom`,`nom` FROM `lrsetitmembre` ORDER BY `prenom` ASC  " ;

$result=mysqli_query($con,$query);

$output= '<ul class="list-group list-group-flush">';

if(mysqli_num_rows($result) > 0){

    while($row=mysqli_fetch_array($result)){
        $output .= '<li class="list-group-item">'.$row['0'] .' '. $row['1'].'<li>';
    }
}
else{
    $output.='<li class="list-group-item"> Member not found</li>';
    
}
$output.='</ul>';
echo($output);

?>