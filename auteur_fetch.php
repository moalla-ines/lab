<?php


require_once ("password-connection.php");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT  `prenom`,`nom`,`cin` FROM `lrsetitmembre` ORDER BY `prenom` ASC  ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["0"].' '.$row["1"].'">'.$row["2"].' : '.$row["0"].' '.$row["1"].'</option>';
 }
 return $output;
}

function fill_email_select_box($connect){

 $output = '';
 $query = "SELECT `email` FROM `lrsetitmembre` ORDER BY `email` ASC ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["0"].'">'.$row["0"].' </option>';
 }
 return $output;
}


?>