
<?php
    $hasAttentionItems = !empty($needsAttention['statusAlerts'])
        || !empty($needsAttention['staleProjects'])
        || !empty($needsAttention['overdueMilestones'])
        || !empty($needsAttention['goalsAtRisk']);
    $showProjects = $showProjects ?? false;
?>

<?php if($hasAttentionItems): ?>
    <div class="reportNeedsAttention">
        <h5 class="subtitle"><i class="fa fa-triangle-exclamation" style="color: var(--red);"></i> <?php echo e(__('subtitles.needs_attention')); ?></h5>

        <ul class="tw-list-none tw-p-0 tw-m-0">
            <?php $__currentLoopData = $needsAttention['statusAlerts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <span class="statusDot" style="background:var(--<?php echo e($project->latestStatus === 'red' ? 'red' : 'yellow'); ?>);"></span>
                    <strong><?php echo e($tpl->escape($project->name)); ?></strong>
                    <?php echo e(__('text.attention_reported_status')); ?>

                    <?php if(!empty($project->latestStatusText)): ?>
                        — <span class="tw-opacity-80"><?php echo e($tpl->escape($project->latestStatusText)); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $needsAttention['overdueMilestones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <i class="fa fa-fw fa-clock" style="color: var(--red);"></i>
                    <strong><?php echo e($tpl->escape($milestone->headline)); ?></strong>
                    <?php if($showProjects): ?><span class="tw-opacity-60">(<?php echo e($tpl->escape($milestone->projectName)); ?>)</span><?php endif; ?>
                    <?php echo e(__('text.attention_overdue_since')); ?> <?php echo e($milestone->dueDate?->formatDateForUser()); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $needsAttention['goalsAtRisk']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <i class="fa fa-fw fa-bullseye" style="color: var(--yellow);"></i>
                    <strong><?php echo e($tpl->escape($goal->title)); ?></strong>
                    <?php echo e($goal->status === 'status_miss' ? __('text.attention_goal_missed') : __('text.attention_goal_at_risk')); ?>

                    <span class="tw-opacity-60">(<?php echo e(\Illuminate\Support\Number::format((float) $goal->currentValue, maxPrecision: 1)); ?> of <?php echo e(\Illuminate\Support\Number::format((float) $goal->endValue, maxPrecision: 1)); ?> <?php echo e($tpl->escape($goal->metricType ?? '')); ?>)</span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $needsAttention['staleProjects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <i class="fa fa-fw fa-comment-slash tw-opacity-60"></i>
                    <strong><?php echo e($tpl->escape($project->name)); ?></strong>
                    <?php if(!empty($project->latestStatusDate)): ?>
                        <?php echo e(sprintf(__('text.attention_no_update_since'), $project->latestStatusDate->formatDateForUser())); ?>

                    <?php else: ?>
                        <?php echo e(__('text.attention_never_updated')); ?>

                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/partials/needsAttention.blade.php ENDPATH**/ ?>