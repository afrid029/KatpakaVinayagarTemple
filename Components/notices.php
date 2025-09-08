<div class="flex !px-3 items-center justify-between !pb-2 border-b-[0.5px] border-[#C4C8C7] gap-4">
    <span><?php echo $title; ?></span>
    <div class="flex gap-4 items-center">
        <span onclick="viewNotice(<?php echo $id; ?>)" class="text-[#B34E05] cursor-pointer">View</span>
        <span onclick="deleteNotice(<?php echo $id; ?>)" class="!p-2 bg-[red] rounded-lg text-white cursor-pointer">Delete</span>
    </div>
</div>