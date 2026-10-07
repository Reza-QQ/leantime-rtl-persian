<a href="<?php echo e(BASE_URL); ?>/projects/showMy"
   class="dropdown-toggle bigProjectSelector <?php echo e($menuType == "project" ? "active" : ""); ?>"
   data-toggle="dropdown">

    <?php if($menuType == 'project' || $menuType == 'default'): ?>
        <span class="projectAvatar <?php echo e($currentProjectType); ?>">
        <?php if(isset($projectTypeAvatars[$currentProjectType]) && $projectTypeAvatars[$currentProjectType] != "avatar"): ?>
                <span class="<?php echo e($projectTypeAvatars[$currentProjectType]); ?>"></span>
            <?php else: ?>
                <img src="<?php echo e(BASE_URL); ?>/api/projects?projectAvatar=<?php echo e($currentProject['id'] ?? -1); ?>&v=<?php echo e(format($currentProject['modified'] ?? '')->timestamp()); ?>"/>
            <?php endif; ?>
        </span>
        <?php echo e($currentProject['name'] ?? ""); ?>&nbsp;

    <?php else: ?>
        <?php echo __('menu.projects'); ?>

    <?php endif; ?>

   <i class="fa fa-caret-down" aria-hidden="true"></i>
</a>
<?php echo $__env->make('menu::partials.projectSelector', [], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Menu/Templates/projectSelector.blade.php ENDPATH**/ ?>