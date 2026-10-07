
<?php
    $showProjects = $showProjects ?? false;
    $goalStatusColors = [
        'status_ontrack' => 'var(--green)',
        'status_atrisk' => 'var(--yellow)',
        'status_miss' => 'var(--red)',
    ];
    $hasMilestoneLinks = false;
    foreach ($goals as $goalRow) {
        if (!empty($goalRow->milestoneHeadline)) {
            $hasMilestoneLinks = true;
            break;
        }
    }
    $fmt = fn ($n) => \Illuminate\Support\Number::format((float) $n, maxPrecision: 1);
?>

<?php if(count($goals) === 0): ?>
    <div class="tw-opacity-60 tw-text-sm tw-py-2"><?php echo e($emptyText); ?></div>
<?php else: ?>
    <table class="reportTable reportGoalTable">
        <thead>
            <tr>
                <th><?php echo e(__('label.goal')); ?></th>
                <?php if($showProjects): ?><th><?php echo e(__('label.project')); ?></th><?php endif; ?>
                <th class="numCol"><?php echo e(__('label.metric')); ?></th>
                <th style="width: 28%;"><?php echo e(__('label.progress')); ?></th>
                <?php if($hasMilestoneLinks): ?><th><?php echo e(__('label.linked_milestone')); ?></th><?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $goals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <span class="statusDot" style="background:<?php echo e($goalStatusColors[$goal->status] ?? 'var(--grey)'); ?>;"></span>
                        <strong><?php echo e($tpl->escape($goal->title)); ?></strong>
                        <?php if($goal->setting === 'linkAndReport'): ?>
                            <span class="cellNote"><i class="fa fa-sitemap tw-opacity-60"></i>
                                <?php if(!empty($goal->childGoalCount)): ?>
                                    <?php echo e(sprintf(__('text.fed_by_n_goals'), $goal->childGoalCount)); ?>

                                <?php else: ?>
                                    <?php echo e(__('text.goal_rollup_tooltip')); ?>

                                <?php endif; ?>
                            </span>
                        <?php endif; ?>
                    </td>
                    <?php if($showProjects): ?>
                        <td class="tw-opacity-70"><?php echo e($tpl->escape($goal->boardProjectName ?? $goal->projectName ?? '')); ?></td>
                    <?php endif; ?>
                    <td class="numCol">
                        <strong><?php echo e($fmt($goal->currentValue)); ?></strong> <span class="tw-opacity-60">of <?php echo e($fmt($goal->endValue)); ?> <?php echo e($tpl->escape($goal->metricType ?? '')); ?></span>
                    </td>
                    <td>
                        <div class="tw-flex tw-items-center tw-gap-2">
                            <div class="progress tw-flex-1 tw-m-0" style="height: 6px;">
                                <div class="progress-bar progress-bar-success" role="progressbar"
                                     aria-valuenow="<?php echo e(round($goal->goalProgress)); ?>" aria-valuemin="0" aria-valuemax="100"
                                     style="width: <?php echo e(round($goal->goalProgress)); ?>%">
                                </div>
                            </div>
                            <span class="tw-text-sm tw-opacity-70" style="font-variant-numeric: tabular-nums;"><?php echo e(round($goal->goalProgress)); ?>%</span>
                        </div>
                    </td>
                    <?php if($hasMilestoneLinks): ?>
                        <td class="tw-opacity-70"><?php echo e($tpl->escape($goal->milestoneHeadline ?? '')); ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/partials/goalTable.blade.php ENDPATH**/ ?>