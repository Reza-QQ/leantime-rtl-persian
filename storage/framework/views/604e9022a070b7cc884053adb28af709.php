<?php if(!isset($menuItem['role']) || $login::userIsAtLeast($menuItem['role'] ?? 'editor')): ?>

    <li
        <?php if(
            $module == $menuItem['module']
            && (!isset($menuItem['active']) || in_array($action, $menuItem['active']))
        ): ?>
            class='active'
        <?php endif; ?>
    >
        <a href="<?php echo e(BASE_URL . $menuItem['href']); ?>"
           data-tippy-content="<?php echo e(strip_tags(__($menuItem['tooltip']))); ?>"
           data-tippy-placement="right"
           preload="mouseover"
           <?php if(isset($menuItem['attributes'])): ?>
               <?php $__currentLoopData = $menuItem['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php echo e($key); ?>="<?php echo e($value); ?>"
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
        >
            <?php echo $menuItem['title']; ?>

        </a>
    </li>

<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Menu/Templates/partials/leftnav/item.blade.php ENDPATH**/ ?>