
<div id="goalMsSection">
    <div class="gv-ms-head">
        <?php if(($milestoneSummary['total'] ?? 0) > 0): ?>
            <span class="gv-ms-summary"><b><?php echo e($milestoneSummary['total']); ?></b> <?php echo e($milestoneSummary['total'] == 1 ? __("goalcanvas.summary_milestone_one") : __("goalcanvas.summary_milestones")); ?>

                <?php if($milestoneSummary['inProgress'] > 0): ?>&middot; <?php echo e($milestoneSummary['inProgress']); ?> <?php echo e(__("goalcanvas.summary_in_progress")); ?> <?php endif; ?>
                <?php if($milestoneSummary['notStarted'] > 0): ?>&middot; <?php echo e($milestoneSummary['notStarted']); ?> <?php echo e(__("goalcanvas.summary_not_started")); ?> <?php endif; ?>
                <?php if($milestoneSummary['done'] > 0): ?>&middot; <?php echo e($milestoneSummary['done']); ?> <?php echo e(__("goalcanvas.summary_done")); ?> <?php endif; ?>
            </span>
        <?php endif; ?>
        <span class="gv-ms-actions">
            <?php if($login::userIsAtLeast($roles::$editor)): ?>
                <button type="button" class="gv-ms-act helperTooltip" onclick="leantime.goalCanvasController.toggleMilestoneSelectors('new');" data-tippy-content="<?php echo e(__('goalcanvas.ms_new')); ?>" title="<?php echo e(__('goalcanvas.ms_new')); ?>" aria-label="<?php echo e(__('goalcanvas.ms_new')); ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <?php if(count($milestones) > 0): ?>
                    <button type="button" class="gv-ms-act helperTooltip" onclick="leantime.goalCanvasController.toggleMilestoneSelectors('existing');" data-tippy-content="<?php echo e(__('goalcanvas.ms_link')); ?>" title="<?php echo e(__('goalcanvas.ms_link')); ?>" aria-label="<?php echo e(__('goalcanvas.ms_link')); ?>"><i class="fa fa-link" aria-hidden="true"></i></button>
                <?php endif; ?>
            <?php endif; ?>
            <i class="fa fa-question-circle-o helperTooltip" aria-hidden="true" data-tippy-content="<?php echo e(__("tooltip.link_milestones_tooltip")); ?>"></i>
        </span>
    </div>

    <?php if(count($goalMilestones) > 0): ?>
        <div class="gv-ms-list">
            <?php $__currentLoopData = $goalMilestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $msDue = trim((string) ($ms['editTo'] ?? ''));
                    $msDue = ($msDue === '' || str_starts_with($msDue, '0000-00-00')) ? null : $msDue;
                ?>
                
                <div class="gv-ms-item">
                    <a class="gv-ms-name" href="#/tickets/editMilestone/<?php echo e((int) $ms['id']); ?>" title="<?php echo e(__('links.edit_milestone')); ?>: <?php echo e($ms['headline']); ?>"><?php echo e($ms['headline']); ?></a>
                    <?php if($msDue !== null): ?>
                        <span class="gv-ms-due"><?php echo e(__('label.due')); ?> <?php echo e(format($msDue)->date()); ?></span>
                    <?php endif; ?>
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                        <button type="button"
                                hx-post="<?php echo e(BASE_URL); ?>/goalcanvas/editCanvasItem/<?php echo e($id); ?>"
                                hx-vals='{"removeMilestone": <?php echo e((int) $ms['id']); ?>}'
                                hx-headers='{"X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"}'
                                hx-target="#goalMsSection"
                                hx-swap="outerHTML"
                                class="delete gv-ms-remove"
                                aria-label="<?php echo e(__("links.remove")); ?>: <?php echo e($ms['headline']); ?>" title="<?php echo e(__("links.remove")); ?>"><i class="fa fa-close" aria-hidden="true"></i></button>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Goalcanvas/Templates/partials/milestonesSection.blade.php ENDPATH**/ ?>