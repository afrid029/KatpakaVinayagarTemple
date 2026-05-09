<?php
$_d = date_create($date);
$dayNum = date_format($_d, 'j');
$monStr = date_format($_d, 'M');
$timeFmt = date('g:i A', strtotime($time));
?>
<div class="event">
    <div class="event-date-col">
        <span class="event-day"><?php echo $dayNum ?></span>
        <span class="event-mon"><?php echo $monStr ?></span>
    </div>
    <div class="event-body">
        <h4 class="event-name"><?php echo htmlspecialchars($name) ?></h4>
        <span class="event-chip"><?php echo $timeFmt ?></span>
        <div class="event-desc"><?php echo htmlspecialchars($desc) ?></div>
    </div>
</div>