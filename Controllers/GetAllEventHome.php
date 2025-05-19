<?php
include('DbConnectivity.php');

$total_received = '';

$query="SELECT *
from programs Where date >= CURRENT_DATE
ORDER BY date asc";

$result = mysqli_query($db, $query);
// echo $result;

$html = '';


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['title'];
        $date = $row['date'];
        $time = $row['time'];
        $desc = $row['description'];
        ob_start();
        include(__DIR__ . '/../Components/eventTile.php');
        $content = ob_get_clean(); 

        $html .= $content;
        // echo $html;
    }
} else {
    $html .= "<div style='display: grid;justify-self: flex-start;width: 100%'>
    <div style='grid-column: span 5; text-align: left; font-size: 12px; font-weight:700;'>No Upcoming Events Found.</div>
    </div>";
}

// $html .= '</tbody></table>';

// // Calculate total pages
// $total_pages = ceil($total_records / $results_per_page);

// // Generate pagination links
// $pagination = "<div class='pagination'>";
// if ($page > 1) {
//     $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(" . ($page - 1) . ")'>Previous</span> ";
// }

// for ($i = 1; $i <= $total_pages; $i++) {
//     if ($i == $page) {
//         $pagination .= "<strong class='selected'>$i</strong> ";
//     } else if ($i == 1) {
//         $pagination .= "<span href='javascript:void(0);' onclick='loadPage($i)'>$i</span> ";
//     } else if ($i == $total_pages) {
//         $pagination .= "<span href='javascript:void(0);' onclick='loadPage($i)'>$i</span> ";
//     } else if (abs($i - $page) < 3) {
//         $pagination .= "<span href='javascript:void(0);' onclick='loadPage($i)'>$i</span> ";
//     } else {
//         if (substr($pagination, -3) !== '...') {
//             $pagination .= ".";
//         }
//     }

//     // if ($i == $page) {
//     //     $pagination .= "<strong>$i</strong> ";
//     // } else {
//     //     $pagination .= "<a href='javascript:void(0);' onclick='loadPage($i)'>$i</a> ";
//     // }
// }

// if ($page < $total_pages) {
//     $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(" . ($page + 1) . ")'>Next</span>";
// }

// $pagination .= "</div>";

mysqli_close($db);

// Return the results and pagination links as JSON
echo json_encode([
    'html' => $html
]);


