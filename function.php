<?php



require_once ("password-connection.php");



function count_all_data($con)
{
	$query = "SELECT * FROM `lrsetitauteur_publication` ";

	$result=mysqli_query($con,$query);
    $i=1;
    while($row=mysqli_fetch_array($result)){

        global $output;
        $output .= '
		<tr>
            <td>'.$i.'</td>
			<td>'.ucwords($row['2']).'</td>
			<td>'.$row['3'].'</td>
			<td>'.ucwords($row['4']).'</td>
            <td>'.$row['6'].'</td>
			<td>'.$row['7'].'</td>
		</tr>
		';
        $i++;
	}
    
	    return $output;
    
}

