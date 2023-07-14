<?php

require_once ("password-connection.php");

$data = array();

$query="SELECT * FROM `lrsetitmanifestation` ORDER BY id";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){

    $data[] = array(
        'id' => $row["id"],
        'title' => $row["titre"],
        'start' => $row["date_debut"],
        'end' => $row["date_fin"],
    );
}

echo json_encode($data);
?>