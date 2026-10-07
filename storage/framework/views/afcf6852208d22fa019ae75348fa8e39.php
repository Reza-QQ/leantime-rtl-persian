
<?php
    $showProjects = $showProjects ?? false;
    $showTasks = $showTasks ?? true;
    $allowOutcomeEdit = $allowOutcomeEdit ?? false;
    $effortByMilestone = $effortByMilestone ?? [];
?>

<?php if(count($milestones) === 0): ?>
    <div class="tw-opacity-60 tw-text-sm tw-py-2"><?php echo e($emptyText); ?></div>
<?php else: ?>
    <ul class="reportMilestoneList">
        <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="reportMilestone" style="border-left: 3px solid <?php echo e($milestone->tags); ?>;">

                <div class="milestoneTitleRow">
                    <?php if($mode === 'completed'): ?>
                        <i class="fa fa-check-circle" style="color: var(--green);"></i>
                    <?php endif; ?>
                    <strong>
                        <a href="<?php echo e(BASE_URL); ?>/tickets/editMilestone/<?php echo e($milestone->id); ?>" class="milestoneModal hideLinkOnPrint"><?php echo e($tpl->escape($milestone->headline)); ?></a>
                    </strong>
                    <?php if($showProjects): ?>
                        <span class="milestoneProject"><?php echo e($tpl->escape($milestone->projectName)); ?></span>
                    <?php endif; ?>

                    <span class="milestoneMeta">
                        <?php if($mode === 'completed'): ?>
                            <?php echo e(__('label.completed_on')); ?> <?php echo e($milestone->completedOn?->formatDateForUser() ?? '—'); ?>

                        <?php elseif($mode === 'upcoming'): ?>
                            <?php echo e($milestone->startDate?->formatDateForUser()); ?> – <?php echo e($milestone->dueDate?->formatDateForUser() ?? '—'); ?>

                        <?php else: ?>
                            <?php $isOverdue = $milestone->dueDate !== null && $milestone->dueDate->isPast(); ?>
                            <span <?php if($isOverdue): ?> style="color: var(--red); font-weight: 600;" <?php endif; ?>>
                                <?php echo e(__('label.due')); ?> <?php echo e($milestone->dueDate?->formatDateForUser() ?? __('text.no_date_defined')); ?>

                            </span>
                        <?php endif; ?>
                        <?php if(!empty($effortByMilestone[$milestone->id])): ?>
                            · <?php echo e(\Illuminate\Support\Number::format($effortByMilestone[$milestone->id], maxPrecision: 1)); ?> <?php echo e(__('label.hours_short')); ?>

                        <?php endif; ?>
                    </span>
                </div>

                <?php if($mode === 'completed'): ?>
                    <?php echo $__env->make('reports::partials.outcome', ['milestone' => $milestone, 'canEdit' => $allowOutcomeEdit], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php if($showTasks && !empty($milestone->keyTasks)): ?>
                        <details class="reportKeyTasks">
                            <summary>
                                <?php echo e(sprintf(__('text.tasks_done_of_total'), $milestone->taskStats['done'], $milestone->taskStats['total'])); ?>

                            </summary>
                            <ul class="tw-list-none tw-pl-5 tw-pt-1 tw-m-0 tw-text-sm tw-opacity-80">
                                <?php $__currentLoopData = $milestone->keyTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <i class="fa fa-fw <?php echo e($task->isDone ? 'fa-check tw-opacity-60' : 'fa-circle-o'); ?>"></i>
                                        <?php echo e($tpl->escape($task->headline)); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($milestone->taskStats['total'] > count($milestone->keyTasks)): ?>
                                    <li class="tw-opacity-60"><?php echo e(sprintf(__('text.and_n_more'), $milestone->taskStats['total'] - count($milestone->keyTasks))); ?></li>
                                <?php endif; ?>
                            </ul>
                        </details>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if($mode === 'inflight'): ?>
                    <div class="tw-flex tw-items-center tw-gap-3 tw-mt-2">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="<?php echo e(round($milestone->percentDone)); ?>" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <?php echo e(round($milestone->percentDone)); ?>%">
                            </div>
                        </div>
                        <span class="tw-text-sm tw-opacity-70 tw-whitespace-nowrap" style="font-variant-numeric: tabular-nums;"><?php echo e(round($milestone->percentDone)); ?>%
                            <?php if($milestone->taskStats['total'] > 0): ?>
                                · <?php echo e(sprintf(__('text.tasks_done_of_total'), $milestone->taskStats['done'], $milestone->taskStats['total'])); ?>

                            <?php endif; ?>
                        </span>
                    </div>
                <?php endif; ?>

            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/partials/milestoneList.blade.php ENDPATH**/ ?>