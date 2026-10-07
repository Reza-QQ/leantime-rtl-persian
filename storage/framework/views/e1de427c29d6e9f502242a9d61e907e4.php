
<?php
    $pillColors = [
        'green' => 'var(--green)',
        'yellow' => 'var(--yellow)',
        'red' => 'var(--red)',
    ];
    $pillLabels = [
        'green' => __('label.status_on_track'),
        'yellow' => __('label.status_at_risk'),
        'red' => __('label.status_off_track'),
    ];
?>

<?php if(!empty($status) && isset($pillColors[$status])): ?>
    <span class="reportStatusPill tw-text-sm">
        <span class="statusDot" style="background:<?php echo e($pillColors[$status]); ?>;"></span>
        <?php echo e($pillLabels[$status]); ?>

        <?php if(!empty($date)): ?>
            <span class="tw-opacity-60">· <?php echo e($date->formatDateForUser()); ?></span>
        <?php endif; ?>
    </span>
<?php else: ?>
    <span class="reportStatusPill tw-text-sm tw-opacity-60">
        <span class="statusDot" style="background:var(--grey);"></span>
        <?php echo e(__('label.status_no_update')); ?>

    </span>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/partials/statusPill.blade.php ENDPATH**/ ?>