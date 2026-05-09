<?php
include('DbConnectivity.php');

$results_per_page = 9;

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

$query = "SELECT ID, MAX(event) as event , GROUP_CONCAT(image SEPARATOR ' ,') as images, MAX(uploadedDate) AS uploadedDate FROM gallery
group by ID
Order by uploadedDate desc
LIMIT $offset, $results_per_page";

$result = mysqli_query($db, $query);
// echo $result;

$html = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $images = $row['images'];
        $img1 = '';
        if (!empty($images)) {
            $img1raw = trim(explode(' ,', $images)[0]);
            $docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
            $img1 = str_replace($docRoot, '', str_replace('\\', '/', $img1raw));
        }
        $photoIcon = "<svg xmlns='http://www.w3.org/2000/svg' height='22px' viewBox='0 -960 960 960' width='22px' fill='currentColor'><path d='M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm40-80h480L570-480 450-320l-90-120-120 160Z'/></svg>";
        $imgTag = $img1 ? "<img src='" . htmlspecialchars($img1) . "' alt='' onerror=\"this.style.display='none'\">" : '';
        $thumbInner = "<div class='thumb-icon'>" . $photoIcon . "</div>" . $imgTag;
        $uploadedDate = !empty($row['uploadedDate']) ? date('d M Y', strtotime($row['uploadedDate'])) : '';
        $imgCount = !empty($images) ? count(explode(' ,', $images)) : 0;
        $html .= "
<div class='dash-album-row'>
    <div class='dash-album-thumb'>" . $thumbInner . "</div>
    <div class='dash-album-info'>
        <span class='dash-album-name'>" . htmlspecialchars($row['event']) . "</span>
        <span class='dash-album-meta'>" . $imgCount . " photo" . ($imgCount !== 1 ? 's' : '') . ($uploadedDate ? ' &middot; ' . $uploadedDate : '') . "</span>
    </div>
    <div class='dash-row-actions'>
        <button onclick='EditAlbum(" . json_encode($row) . ")' class='dash-action-btn is-edit'>
            <svg xmlns='http://www.w3.org/2000/svg' height='13px' viewBox='0 -960 960 960' width='13px' fill='currentColor'><path d='M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Z'/></svg>
            Edit
        </button>
        <button onclick='DeleteAlbum(" . json_encode($row) . ")' class='dash-action-btn is-del'>
            <svg xmlns='http://www.w3.org/2000/svg' height='13px' viewBox='0 -960 960 960' width='13px' fill='currentColor'><path d='M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Z'/></svg>
            Delete
        </button>
    </div>
</div>";
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
    $pagination .= "<span class='textPagi p-3' href='javascript:void(0);' onclick='loadAlbum(" . ($page - 1) . ")'>Previous</span> ";
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $pagination .= "<strong class='selected p-3'>$i</strong> ";
    } else if ($i == 1) {
        $pagination .= "<span href='javascript:void(0);' class='p-3' onclick='loadAlbum($i)'>$i</span> ";
    } else if ($i == $total_pages) {
        $pagination .= "<span href='javascript:void(0);' class='p-3' onclick='loadAlbum($i)'>$i</span> ";
    } else if (abs($i - $page) < 3) {
        $pagination .= "<span href='javascript:void(0);' class='p-3' onclick='loadAlbum($i)'>$i</span> ";
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
    $pagination .= "<span class='textPagi p-3' href='javascript:void(0);' onclick='loadAlbum(" . ($page + 1) . ")'>Next</span>";
}

$pagination .= "</div>";

mysqli_close($db);

// Return the results and pagination links as JSON
echo json_encode([
    'html' => $html,
    'pagination' => $pagination
]);
