<?php
require_once ("password-connection.php");

 $output = '';
 $query = "SELECT * FROM `lrsetitmembre`   ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["0"].' '.$row["1"].'">'.$row["2"].' : '.$row["0"].' '.$row["1"].'</option>';
 }
 return $output;


