<?php

include('DbConnectivity.php');

$query = "SELECT ID, MAX(event) as event , GROUP_CONCAT(image SEPARATOR ' ,') as images, MAX(uploadedDate) AS uploadedDate FROM gallery
group by ID
Order by uploadedDate desc
LIMIT 4";

$result = mysqli_query($db, $query);

// echo $result;

// var_dump($result);
// exit();

$html = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $event = $row['event'];
        $images = $row['images'];
        if (empty($images)) continue;
        $img1 = trim(explode(" ,", $images)[0]);
        $docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
        $img1 = str_replace($docRoot, '', str_replace('\\', '/', $img1));
        if (empty(trim($img1))) continue;
        $images = str_replace($docRoot, '', str_replace('\\', '/', $images));

        ob_start();
        include(__DIR__ . '/../Components/collection.php');
        $content = ob_get_clean();

        $html .= $content;
    }
} else {
    $html .= "<div style='display: grid;justify-self: flex-start;width: 100%'>
    <div class='no-event'>No Albums Found.</div>
    </div>";
}




mysqli_close($db);

// Return the results and pagination links as JSON
echo json_encode([
    'html' => $html
]);
