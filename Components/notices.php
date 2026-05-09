<div class="notice-row">
    <span class="notice-row-title"><?php echo htmlspecialchars($title); ?></span>
    <div class="notice-row-actions">
        <button onclick="viewNotice(<?php echo $id; ?>)" class="btn-view">View</button>
        <button onclick="deleteNotice(<?php echo $id; ?>)" class="btn-danger">Delete</button>
    </div>
</div>
