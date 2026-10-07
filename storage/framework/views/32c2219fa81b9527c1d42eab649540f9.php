<?php
    use Leantime\Core\Controller\Frontcontroller;

    if (!function_exists('findActive')) {
        function findActive($route): string
        {
            if (str_contains(Frontcontroller::getCurrentRoute(), $route)) {
                return 'active';
            }
            return '';
        }
    }
?>

<div class="lt-tabs lt-tabs--floating lt-tabs--links hideOnPrint">
    <nav class="lt-tabs-group" aria-label="<?php echo e(trim(strip_tags(__('links.timeline')))); ?>">
    <ul>
        <li class="<?php echo e(findActive('roadmap')); ?>">
            <a href="<?php echo e(BASE_URL); ?>/tickets/roadmap<?php echo e($searchParams); ?>" preload="mouseover">
                <?php echo __('links.timeline'); ?>

            </a>
        </li>
        <li class="<?php echo e(findActive('showAllMilestones')); ?>">
            <a href="<?php echo e(BASE_URL); ?>/tickets/showAllMilestones<?php echo e($searchParams); ?>" preload="mouseover">
                <?php echo __('links.table'); ?>

            </a>
        </li>
        <li class="<?php echo e(findActive('Calendar')); ?>">
            <a href="<?php echo e(BASE_URL); ?>/tickets/showProjectCalendar<?php echo e($searchParams); ?>" preload="mouseover">
                <?php echo __('links.calendar'); ?>

            </a>
        </li>
    </ul>
    </nav>

    
    <?php if(isset($searchCriteria)): ?>
        <div class="lt-tabs-actions">
            <?php $tpl->dispatchTplEvent('filters.afterLefthandSectionOpen'); ?>
            <?php echo $__env->make('tickets::submodules.ticketNewBtn', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('tickets::submodules.ticketFilter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php $tpl->dispatchTplEvent('filters.beforeLefthandSectionClose'); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/submodules/timelineTabs.blade.php ENDPATH**/ ?>