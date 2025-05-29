
<?php
include('DbConnectivity.php');

$results_per_page = 10;

// Get the current page from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($page - 1) * $results_per_page;

// Get the total number of records
$sql = "SELECT Count(DISTINCT ID) AS total FROM gallery";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];


$total_received = '';

$query="SELECT ID, MAX(event) as event , GROUP_CONCAT(image SEPARATOR ' ,') as images, MAX(uploadedDate) AS uploadedDate FROM gallery
group by ID
Order by uploadedDate desc
LIMIT $offset, $results_per_page";

$result = mysqli_query($db, $query);
// echo $result;

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
    <div style='grid-column: span 5; text-align: left; font-size: 12px; font-weight:700;'>No Albums Found.</div>
    </div>";
}

// $html .= '</tbody></table>';

// Calculate total pages
$total_pages = ceil($total_records / $results_per_page);

// Generate pagination links
$pagination = "<div class='pagination'>";
if ($page > 1) {
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadAlbum(" . ($page - 1) . ")'>Previous</span> ";
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $pagination .= "<strong class='selected'>$i</strong> ";
    } else if ($i == 1) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadAlbum($i)'>$i</span> ";
    } else if ($i == $total_pages) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadAlbum($i)'>$i</span> ";
    } else if (abs($i - $page) < 3) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadAlbum($i)'>$i</span> ";
    } else {
        if (substr($pagination, -3) !== '...') {
            $pagination .= ".";
        }
    }

    // if ($i == $page) {
    //     $pagination .= "<strong>$i</strong> ";
    // } else {
    //     $pagination .= "<a href='javascript:void(0);' onclick='loadPage($i)'>$i</a> ";
    // }
}

if ($page < $total_pages) {
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadAlbum(" . ($page + 1) . ")'>Next</span>";
}

$pagination .= "</div>";

mysqli_close($db);

// Return the results and pagination links as JSON
echo json_encode([
    'html' => $html,
    'pagination' => $pagination
]);

?>

