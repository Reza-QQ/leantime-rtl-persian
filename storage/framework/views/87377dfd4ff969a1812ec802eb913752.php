
<?php
    $summary = $report['summaries'][$projectId] ?? null;
    $stats = $report['stats'];
    $deltas = $report['deltas'];

    $inFlightMilestones = array_merge($report['milestones']['overdue'], $report['milestones']['inProgress']);
    $fmt = fn ($n) => \Illuminate\Support\Number::format((float) $n, maxPrecision: 1);
?>

<div id="reportBody">

    
    <?php if($summary !== null): ?>
        
        <div class="reportHeaderBand">
            <span>
                <strong><?php echo e(round($summary->progress['percent'] ?? 0)); ?>%</strong> <?php echo e(__('label.report_complete')); ?>

                <?php $completionState = $summary->progress['estimatedCompletionState'] ?? 'ready'; ?>
                
                <?php if($completionState === 'needs_more_data'): ?>
                    · <a href="<?php echo e(BASE_URL); ?>/tickets/showAll" class="reportHint"><i class="fa fa-thumb-tack"></i> <?php echo e(__('label.complete_more_todos')); ?></a>
                <?php elseif($completionState === 'complete'): ?>
                    · <a href="<?php echo e(BASE_URL); ?>/projects/showAll" class="reportHint"><i class="fa fa-suitcase"></i> <?php echo e(__('label.project_complete_onto_next')); ?></a>
                <?php elseif(!empty($summary->progress['estimatedCompletionDate']) && $summary->progress['estimatedCompletionDate'] !== false): ?>
                    · <?php echo e(__('label.estimated_completion')); ?> <?php echo e($summary->progress['estimatedCompletionDate']); ?>

                <?php endif; ?>
            </span>
        </div>
    <?php endif; ?>

    <?php echo $__env->make('reports::partials.statTiles', ['tiles' => [
        ['label' => __('label.milestones_completed'), 'value' => $stats['completed'], 'delta' => ['value' => $deltas['completedDelta'], 'goodWhenUp' => true, 'vs' => __('label.vs_prior_period_short')]],
        ['label' => __('label.milestones_in_flight'), 'value' => $stats['inFlight']],
        ['label' => __('label.milestones_overdue'), 'value' => $stats['overdue'], 'tone' => 'danger'],
        ['label' => __('label.hours_logged'), 'value' => $fmt($stats['hoursLogged']), 'delta' => ['value' => $deltas['hoursDelta'], 'goodWhenUp' => null, 'vs' => __('label.vs_prior_period_short')]],
    ]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('reports::partials.needsAttention', ['needsAttention' => $report['needsAttention'], 'showProjects' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="reportSection">
        <h5 class="subtitle"><?php echo e(__('subtitles.accomplished_this_period')); ?> <span class="sectionCount"><?php echo e(count($report['milestones']['completed'])); ?></span></h5>
        <?php echo $__env->make('reports::partials.milestoneList', [
            'milestones' => $report['milestones']['completed'],
            'mode' => 'completed',
            'allowOutcomeEdit' => true,
            'effortByMilestone' => $report['effort']['byMilestone'],
            'period' => $period,
            'emptyText' => __('text.report_no_completed_milestones'),
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <?php echo $__env->make('reports::partials.changedThisPeriod', ['slippage' => $report['milestones']['slippage'], 'showProjects' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <div class="reportSection">
        <h5 class="subtitle"><?php echo e(__('subtitles.in_flight')); ?> <span class="sectionCount"><?php echo e(count($inFlightMilestones)); ?></span></h5>
        <?php echo $__env->make('reports::partials.milestoneList', [
            'milestones' => $inFlightMilestones,
            'mode' => 'inflight',
            'effortByMilestone' => $report['effort']['byMilestone'],
            'period' => $period,
            'emptyText' => __('text.report_no_inflight_milestones'),
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <div class="reportSection">
        <h5 class="subtitle"><?php echo e(__('subtitles.coming_up')); ?></h5>
        <?php if(count($report['milestones']['upcomingByQuarter']) === 0): ?>
            <div class="tw-opacity-60 tw-text-sm tw-py-2"><?php echo e(__('text.report_no_upcoming_milestones')); ?></div>
        <?php else: ?>
            <?php $__currentLoopData = $report['milestones']['upcomingByQuarter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quarterLabel => $quarterMilestones): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h6 class="tw-font-bold tw-opacity-70 tw-mt-3 tw-mb-1"><?php echo e($quarterLabel); ?></h6>
                <?php echo $__env->make('reports::partials.milestoneList', [
                    'milestones' => $quarterMilestones,
                    'mode' => 'upcoming',
                    'period' => $period,
                    'emptyText' => '',
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>

    <div class="reportSection">
        <h5 class="subtitle"><?php echo e(__('subtitles.goals_kpis')); ?></h5>
        <?php echo $__env->make('reports::partials.goalTable', [
            'goals' => $report['goals']['goals'],
            'emptyText' => __('text.report_no_goals'),
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <div class="reportSection">
        <h5 class="subtitle"><?php echo e(__('subtitles.status_narrative')); ?></h5>
        <?php echo $__env->make('reports::partials.statusNarrative', [
            'updatesByProject' => $report['statusUpdates'],
            'summaries' => $report['summaries'],
            'showProjects' => false,
            'emptyText' => __('text.report_no_status_updates'),
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/partials/projectReportBody.blade.php ENDPATH**/ ?>