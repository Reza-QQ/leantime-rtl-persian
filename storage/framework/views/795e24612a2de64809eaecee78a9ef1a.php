
<?php
    $showProjects = $showProjects ?? false;
    $narrativeColors = ['green' => 'var(--green)', 'yellow' => 'var(--yellow)', 'red' => 'var(--red)'];
?>

<?php if(count($updatesByProject) === 0): ?>
    <div class="tw-opacity-60 tw-text-sm tw-py-2"><?php echo e($emptyText); ?></div>
<?php else: ?>
    <div class="reportStatusNarrative tw-flex tw-flex-col tw-gap-3">
        <?php $__currentLoopData = $updatesByProject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectId => $updates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($showProjects && isset($summaries[$projectId])): ?>
                <strong class="tw-mt-1"><?php echo e($tpl->escape($summaries[$projectId]->name)); ?></strong>
            <?php endif; ?>
            <?php $__currentLoopData = $updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="reportStatusUpdate tw-pl-3 tw-py-1" style="border-left: 4px solid <?php echo e($narrativeColors[$update->status] ?? 'var(--grey)'); ?>;">
                    <div class="tw-text-xs tw-opacity-60">
                        <?php echo e($tpl->escape(trim(($update->authorFirstname ?? '').' '.($update->authorLastname ?? '')))); ?>

                        · <?php echo e($update->dateParsed?->formatDateForUser() ?? ''); ?>

                    </div>
                    <div class="tw-text-sm"><?php echo $tpl->escapeMinimal($update->text); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/partials/statusNarrative.blade.php ENDPATH**/ ?>