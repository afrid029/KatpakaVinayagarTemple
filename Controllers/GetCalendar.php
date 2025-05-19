<?php 
include('DbConnectivity.php');

$query = "SELECT * FROM calendar";

$result = mysqli_query($db, $query);

$data=array();
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

mysqli_close($db);

echo json_encode([
    'data' => $data
])

?>