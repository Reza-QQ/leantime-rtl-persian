
<?php
    $showProjects = $showProjects ?? false;
?>

<?php if(!empty($slippage['pushedOut']) || !empty($slippage['addedMidPeriod'])): ?>
    <div class="reportSlippage">
        <strong class="tw-block tw-mb-1"><i class="fa fa-fw fa-arrows-left-right tw-opacity-60"></i> <?php echo e(__('subtitles.changed_this_period')); ?></strong>

        <?php $__currentLoopData = $slippage['pushedOut']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <strong><?php echo e($tpl->escape($milestone->headline)); ?></strong>
                <?php if($showProjects): ?><span class="tw-opacity-70">(<?php echo e($tpl->escape($milestone->projectName)); ?>)</span><?php endif; ?>
                <?php echo e(sprintf(__('text.slippage_moved_out'), $milestone->dueDateMoves, $milestone->dueDate?->formatDateForUser() ?? '—')); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $slippage['addedMidPeriod']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <strong><?php echo e($tpl->escape($milestone->headline)); ?></strong>
                <?php if($showProjects): ?><span class="tw-opacity-70">(<?php echo e($tpl->escape($milestone->projectName)); ?>)</span><?php endif; ?>
                <?php echo e(__('text.slippage_added_mid_period')); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/partials/changedThisPeriod.blade.php ENDPATH**/ ?>