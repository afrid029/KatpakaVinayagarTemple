<?php
include('DbConnectivity.php');

$total_received = '';

$query="SELECT *
from programs Where date >= CURRENT_DATE
ORDER BY date asc
LIMIT 10";

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
    <div class='no-event'>No Upcoming Events Found.</div>
    </div>";
}


mysqli_close($db);

// Return the results and pagination links as JSON
echo json_encode([
    'html' => $html
]);


