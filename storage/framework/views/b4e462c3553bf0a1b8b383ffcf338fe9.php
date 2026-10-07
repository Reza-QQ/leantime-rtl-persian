<?php
    /**
     * @todo Move this to Composer, or find a better
     *       way to add filters for all passed variables
     */
    use Leantime\Domain\Auth\Models\Roles;
    $settingsLink = $tpl->dispatchTplFilter(
        'settingsLink',
        $settingsLink,
        ['type' => $menuType]
    );
?>


<?php $tpl->dispatchTplEvent('beforeMenu'); ?>

<ul class="nav nav-tabs nav-stacked">

    <?php $tpl->dispatchTplEvent('afterMenuOpen'); ?>

    <?php if($allAvailableProjects
        || !session()->has("currentProject")
        || $menuType == "personal"
        || $menuType == "company"): ?>

        <li class="dropdown scrollableMenu">

            <ul style="display:block;">

                <?php $__currentLoopData = $menuStructure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if ($__env->exists("menu::partials.leftnav.".$menuItem['type'], ["menuItem" => $menuItem, "module" => $module, "action" => $action])) echo $__env->make("menu::partials.leftnav.".$menuItem['type'], ["menuItem" => $menuItem, "module" => $module, "action" => $action], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($login::userIsAtLeast(Roles::$manager) && $menuType != 'company' && $menuType != 'personal' && $menuType != 'projecthub'): ?>
                    <li class="fixedMenuPoint <?php echo e($module == $settingsLink['module'] && $action == $settingsLink['action'] ? 'active' : ''); ?>">
                        <a  href="<?php echo e(BASE_URL); ?>/<?php echo e($settingsLink['module']); ?>/<?php echo e($settingsLink['action']); ?>/<?php echo e(session("currentProject")); ?>">
                            <?php echo $settingsLink['label']; ?>

                        </a>
                    </li>
                <?php endif; ?>
            </ul>

        </li>

    <?php endif; ?>

    <?php $tpl->dispatchTplEvent('beforeMenuClose'); ?>

</ul>
<?php $tpl->dispatchTplEvent('afterMenuClose'); ?>


<?php if (! $__env->hasRenderedOnce('8f8d26a1-4f88-4c12-a189-7a50a65b069e')): $__env->markAsRenderedOnce('8f8d26a1-4f88-4c12-a189-7a50a65b069e'); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            jQuery(document).ready(function () {
                leantime.menuController.initProjectSelector();
                leantime.menuController.initLeftMenuHamburgerButton();
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Menu/Templates/menu.blade.php ENDPATH**/ ?>