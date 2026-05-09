
<?php
include('DbConnectivity.php');
$query = "SELECT image, title, lang FROM notices
Order by createdAt desc";

$result = mysqli_query($db, $query);
// echo $result;

$tamil = '';
$english = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fullImage = $row['image'];
        $docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
        $fullImageNorm = str_replace('\\', '/', $fullImage);
        $image = str_contains($fullImageNorm, $docRoot)
            ? str_replace($docRoot, '', $fullImageNorm)
            : $fullImage;
        $title = $row['title'];

        ob_start();
        include(__DIR__ . '/../Components/userNotice.php');
        $content = ob_get_clean();
        if ($row['lang'] == 't') {
            $tamil .= $content;
        } else if ($row['lang'] == 'e') {
            $english .= $content;
        }
    }
}

if (strlen($tamil) < 2) {
    $tamil .= "<div style='display: grid;justify-self: flex-start;width: 100%'>
    <div style='grid-column: span 5; text-align: left; font-size: 12px; font-weight:700;'>No Notices Found.</div>
    </div>";
}

if (strlen($english) < 2) {
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

