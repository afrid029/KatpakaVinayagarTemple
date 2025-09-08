
<?php
include('DbConnectivity.php');
$query="SELECT id, title, lang FROM notices
Order by createdAt desc";

$result = mysqli_query($db, $query);
// echo $result;

$tamil = '';
$english = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $id = $row['id'];

        ob_start();
        include(__DIR__ . '/../Components/notices.php');
        $content = ob_get_clean(); 
        if($row['lang'] == 't') {
            $tamil .= $content;
        } else if($row['lang'] == 'e') {
            $english .= $content;
        }
    }
} else {
    $tamil .= "<div style='display: grid;justify-self: flex-start;width: 100%'>
    <div style='grid-column: span 5; text-align: left; font-size: 12px; font-weight:700;'>No Notices Found.</div>
    </div>";
    $english .= "<div style='display: grid;justify-self: flex-start;width: 100%'>
    <div style='grid-column: span 5; text-align: left; font-size: 12px; font-weight:700;'>No Notices Found.</div>
    </div>";
}

mysqli_close($db);

// Return the results and pagination links as JSON
echo json_encode([
    'tamil' => $tamil,
    'english' => $english,
]);

?>

