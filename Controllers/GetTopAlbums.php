<?php

include('DbConnectivity.php');

$query="SELECT ID, MAX(event) as event , GROUP_CONCAT(image SEPARATOR ' ,') as images, MAX(uploadedDate) AS uploadedDate FROM gallery
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
        $img1 = explode(" ,", $images)[0];
        $img1 = explode($_SERVER['DOCUMENT_ROOT'] , $img1)[1];
        $img2 = explode(" ,", $images)[1];
         $img2 = explode($_SERVER['DOCUMENT_ROOT'] , $img2)[1];

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

?>

