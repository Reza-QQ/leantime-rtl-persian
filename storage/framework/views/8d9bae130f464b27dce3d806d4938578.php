<?php if(!isset($menuItem['role']) || $login::userIsAtLeast($menuItem['role'] ?? 'editor')): ?>

    <li class="submenuToggle">
        <a href="javascript:void(0);"
           <?php if( $menuItem['visual'] !== 'always' ): ?>
               onclick="leantime.menuController.toggleSubmenu('<?php echo e($menuItem['id']); ?>')"
            <?php endif; ?>
        >
            <i class="submenuCaret fa fa-angle-<?php echo e($menuItem['visual'] == 'closed' ? 'right' : 'down'); ?>"
               id="submenu-icon-<?php echo e($menuItem['id']); ?>"></i>
            <strong><?php echo __($menuItem['title']); ?></strong>
        </a>
    </li>
    <ul id="submenu-<?php echo e($menuItem['id']); ?>" class="submenu <?php echo e($menuItem['visual'] == 'closed' ? 'closed' : 'open'); ?>">
        <?php $__currentLoopData = $menuItem['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkey => $submenuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php switch($submenuItem['type']):
                case ('header'): ?>
                    <?php echo $__env->make("menu::partials.leftnav.header", ["menuItem" => $submenuItem, "module" => $module, "action" => $action], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php break; ?>
                <?php case ('item'): ?>
                    <?php echo $__env->make("menu::partials.leftnav.item", ["menuItem" => $submenuItem, "module" => $module, "action" => $action], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endswitch; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

<?php endif; ?>

<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Menu/Templates/partials/leftnav/submenu.blade.php ENDPATH**/ ?>