<div onclick="editUser(<?php echo $id; ?>)" class="bg-[#fafafa] rounded-lg p-3 flex flex-col flex-wrap shrink-1 items-start justify-center w-full gap-3">
    <span class="font-semibold w-full break-words whitespace-normal font-english text-xs lg:text-base"><?php echo $email; ?></span>
    <?php 
    if($isActive) {
        echo "<span class='flex justify-end text-xs lg:text-sm text-[green]'>Active</span>";
    } else {
        echo "<span class='flex justify-end text-xs lg:text-sm text-[red]'>Disabled</span>";
    }
    ?>
</div>