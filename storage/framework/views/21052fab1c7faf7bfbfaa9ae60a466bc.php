<ul class="level-0 noGroup">
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(
           !session()->exists("usersettings.projectSelectFilter.client")
            || session("usersettings.projectSelectFilter.client") == $project["clientId"]
            || session("usersettings.projectSelectFilter.client") == 0
            || session("usersettings.projectSelectFilter.client") == ""
           ): ?>

            <li class="projectLineItem hasSubtitle <?php echo e(session("currentProject") ?? 0  == $project['id'] ? "active" : ''); ?>" >
                <?php echo $__env->make('menu::partials.projectLink', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="clear"></div>
            </li>

        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Menu/Templates/partials/noGroup.blade.php ENDPATH**/ ?>