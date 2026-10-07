<?php
    $groupState = session("usersettings.submenuToggle.".$prefix.'-projectSelectorlist-group-'.$parent, 'closed');
?>
<ul id="<?php echo e($prefix); ?>-projectSelectorlist-group-<?php echo e($parent); ?>" class="level-<?php echo e($level); ?> projectGroup <?php echo e($groupState); ?>">
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(
            !session()->exists("usersettings.projectSelectFilter.client")
            || session("usersettings.projectSelectFilter.client") == $project["clientId"]
            || session("usersettings.projectSelectFilter.client") == 0
            || session("usersettings.projectSelectFilter.client") == ""
            || $project["clientId"] == ''
            ): ?>

            <li class="projectLineItem hasSubtitle <?php echo e(session("currentProject") == $project['id'] ? "active" : ''); ?>" >
                <?php
                    $parentState = session("usersettings.submenuToggle.".$prefix.'-projectSelectorlist-group-'.$project['id'], 'closed');
                ?>

                <?php if((empty($project['children']) || count($project['children']) ==0)): ?>
                    <span class="toggler"></span>
                <?php endif; ?>

                <?php if(!empty($project['children']) && count($project['children']) >0): ?>
                    <a href="javascript:void(0);" class="toggler <?php echo e($parentState); ?>" id="<?php echo e($prefix); ?>-toggler-<?php echo e($project["id"]); ?>" onclick="leantime.menuController.toggleProjectDropDownList('<?php echo e($project["id"]); ?>', '', '<?php echo e($prefix); ?>')">
                        <?php if($parentState == 'closed'): ?>
                            <i class="fa fa-angle-right"></i>
                        <?php else: ?>
                            <i class="fa fa-angle-down"></i>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
                <?php echo $__env->make('menu::partials.projectLink', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <div class="clear"></div>

                
                <?php if(!empty($project['children']) && count($project['children']) >0 && $level < 20): ?>
                    <?php echo $__env->make('menu::partials.projectGroup', ['projects' => $project['children'], 'parent' => $project['id'], 'level'=> $level+1, 'prefix' => $prefix, "currentProject"=>$currentProject], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>
            </li>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Menu/Templates/partials/projectGroup.blade.php ENDPATH**/ ?>