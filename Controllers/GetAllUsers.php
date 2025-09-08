
<?php
include('DbConnectivity.php');
$query = "SELECT id, email, isActive FROM user
WHERE isAdmin = false
Order by id asc";

$result = mysqli_query($db, $query);
// echo $result;

$html = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row['email'];
        $id = $row['id'];
        $isActive = $row['isActive'];


        ob_start();
        include(__DIR__ . '/../Components/userTile.php');
        $content = ob_get_clean();
        $html .= $content;
    }
} else {
    $html .= "<div style='display: grid;justify-self: flex-start;width: 100%'>
    <div style='grid-column: span 5; text-align: left; font-size: 12px; font-weight:700;'>No Admins Found.</div>
    </div>";
}

mysqli_close($db);

// Return the results and pagination links as JSON
echo json_encode([
    'html' => $html
]);

?>

