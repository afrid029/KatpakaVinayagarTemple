<?php
include('DbConnectivity.php');



$total_received = '';

$query = "SELECT *
from programs Where date >= CURRENT_DATE
ORDER BY date asc";

$result = mysqli_query($db, $query);
// echo $result;

$html = '';


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dayNum = date('d', strtotime($row['date']));
        $monStr = date('M', strtotime($row['date']));
        $timeFmt = date('g:i A', strtotime($row['time']));
        $html .= "
<div class='dash-event-row'>
    <div class='dash-event-date'>
        <span class='der-day'>" . $dayNum . "</span>
        <span class='der-mon'>" . $monStr . "</span>
    </div>
    <div class='dash-event-info'>
        <p class='der-title'>" . htmlspecialchars($row['title']) . "</p>
        <p class='der-time'>
            <svg xmlns='http://www.w3.org/2000/svg' height='13px' viewBox='0 -960 960 960' width='13px' fill='currentColor'><path d='M520-496v-184h-80v216l86 86 56-56-62-62Zm-40 416q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z'/></svg>
            " . $timeFmt . "
        </p>
        <p class='der-desc'>" . htmlspecialchars($row['description'] ?? '') . "</p>
    </div>
    <div class='dash-row-actions'>
        <button onclick='EditEvent(" . json_encode($row) . ")' class='dash-action-btn is-edit'>
            <svg xmlns='http://www.w3.org/2000/svg' height='13px' viewBox='0 -960 960 960' width='13px' fill='currentColor'><path d='M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Z'/></svg>
            Edit
        </button>
        <button onclick='DeleteEvent(" . json_encode($row) . ")' class='dash-action-btn is-del'>
            <svg xmlns='http://www.w3.org/2000/svg' height='13px' viewBox='0 -960 960 960' width='13px' fill='currentColor'><path d='M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Z'/></svg>
            Delete
        </button>
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
