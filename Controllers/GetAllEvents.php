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
        $html .= "


                     <div class='event-card'>
                <div class='event-title'>
                   ".$row['title']."
                </div>
                <hr>
                <div class='event-info'>
                   <div class='event-action'>
                        <p>". $row['date'] ."</p>
                        <p>". $row['time'] ."</p>
                   </div>
                    <div class='event-btn'>
                        <button onclick='EditEvent(".json_encode($row).")' class='edit'>Edit</button>
                        <button onclick='DeleteEvent(".json_encode($row).")' class='delete'>Delete</button>
                    </div>
                </div>
            </div>";
    }
} else {
    $html .= "<div style='display: grid;justify-self: flex-start;width: 100%'>
    <div style='grid-column: span 5; text-align: left; font-size: 12px; font-weight:700;'>No Upcoming Events Found.</div>
    </div>";
}



mysqli_close($db);

// Return the results and pagination links as JSON
echo json_encode([
    'html' => $html
]);


