<?php if(isset($action, $module)): ?>
    <?php echo $__env->make("$module::$action", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php else: ?>
    <?php echo $__env->yieldContent('content'); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/layouts/blank.blade.php ENDPATH**/ ?>