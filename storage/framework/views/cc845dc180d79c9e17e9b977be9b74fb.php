<?php ( $percentDone = format($project['progress']['percent'])->decimal()); ?>

    <div class="row">
        <div class="col-md-7">
            <?php echo e(__("subtitles.project_progress")); ?>

        </div>
        <div class="col-md-5" style="text-align:right">
            <?php echo e(sprintf(__("text.percent_complete"), $percentDone)); ?>

        </div>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-success"
             role="progressbar"
             aria-valuenow="<?php echo e($percentDone); ?>"
             aria-valuemin="0"
             aria-valuemax="100"
             style="width: <?php echo e($percentDone); ?>%">
            <span class="sr-only"><?php echo e(sprintf(__("text.percent_complete"), $percentDone)); ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if($project['status'] !== null && $project['status'] != ''): ?>
                <span class="label label-<?php echo e($project['status']); ?>">
                                <?php echo e(__("label.project_status_" . $project['status'])); ?>

                            </span><br />
            <?php else: ?>
                <span class="label label-grey"><?php echo e(__("label.no_status")); ?></span><br />
            <?php endif; ?>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="team">
                <?php $__currentLoopData = $project['team']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="commentImage" style="margin-right:-10px;" data-tippy-content="<?php echo e($member['firstname']); ?> <?php echo e($member['lastname']); ?>">
                        <img
                            style=""
                            src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($member['id']); ?>&v=<?php echo e(format($member['modified'])->timestamp()); ?>" data-tippy-content="<?php echo e($member['firstname'] . ' ' . $member['lastname']); ?>" />
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="clearall"></div>
        </div>
    </div>

<script>
    // Idempotent init (see milestoneCard) — avoids re-instancing all tooltips
    // every time a project progress bar renders.
    window.leantime?.initTooltips?.();
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/partials/projectCardProgressBar.blade.php ENDPATH**/ ?>