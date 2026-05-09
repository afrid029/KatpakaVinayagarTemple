<div onclick="editUser(<?php echo $id; ?>)" class="user-tile">
    <div class="user-avatar">
        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor">
            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 128.5-46.5T480-440q66 0 132.5 15.5T741-378q29 15 46.5 43.5T805-272v112H160Z" />
        </svg>
    </div>
    <div class="user-info">
        <span class="user-email"><?php echo htmlspecialchars($email); ?></span>
        <?php if ($isActive): ?>
            <span class="user-status active">Active</span>
        <?php else: ?>
            <span class="user-status inactive">Inactive</span>
        <?php endif; ?>
    </div>
    <svg class="user-edit-icon" xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="currentColor">
        <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
    </svg>
</div>