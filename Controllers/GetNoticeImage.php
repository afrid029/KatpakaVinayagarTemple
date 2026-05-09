<?php
include('DbConnectivity.php');
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = mysqli_prepare($db, "SELECT image FROM notices WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($db);

echo json_encode([
    'data' => $data
]);
