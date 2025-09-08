<?php 
include('DbConnectivity.php');
$id = $_GET['id'];

$query = "SELECT id, email, isActive FROM user where id = $id";

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