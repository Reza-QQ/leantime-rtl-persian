<?php
    use Leantime\Core\Controller\Frontcontroller;
    use Leantime\Domain\Sprints\Models\Sprints;

    $currentUrlPath = BASE_URL . '/' . str_replace('.', '/', Frontcontroller::getCurrentRoute());

    $currentSprintId = $currentSprint;
    $searchSprint = $searchCriteria['sprint'] ?? '';

    $sprint = false;

    $currentSprintId = $currentSprintId == '' ? 'all' : $currentSprintId;
    if ($currentSprintId == 'all') {
        $sprint = new Sprints;
        $sprint->id = 'all';
        $sprint->name = __('links.all_todos');
    }

    if ($currentSprintId == 'backlog') {
        $sprint = new Sprints;
        $sprint->id = 'backlog';
        $sprint->name = __('links.backlog');
    }

    if (is_array($sprints)) {
        foreach ($sprints as $sprintRow) {
            if ($sprintRow->id == $currentSprintId) {
                $sprint = $sprintRow;
                break;
            }
        }
    }
?>

<?php $tpl->dispatchTplEvent('beforePageHeaderOpen'); ?>
<div class="pageheader">
    <?php $tpl->dispatchTplEvent('afterPageHeaderOpen'); ?>
    <div class="pageicon">
        <span class="fa fa-fw fa-thumb-tack"></span>
    </div>
    <div class="pagetitle">
        
        <?php
            $headerParts = array_filter(
                [session('currentProjectClient'), session('currentProjectName')],
                fn ($part) => $part !== null && $part !== ''
            );
        ?>
        <h5><?php echo e(implode(' / ', $headerParts)); ?></h5>

        
        <?php if (isset($component)) { $__componentOriginaled82c7bef028765b9b2b447066c3673c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled82c7bef028765b9b2b447066c3673c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.subjectSwitcher','data' => ['parent' => __('headlines.todos'),'current' => $sprint !== false ? $sprint->name : __('dropdown.choose_sprint')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::subjectSwitcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['parent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('headlines.todos')),'current' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sprint !== false ? $sprint->name : __('dropdown.choose_sprint'))]); ?>
            <li><a class="wikiModal inlineEdit" href="#/sprints/editSprint/"><i class="fa-solid fa-plus"></i> <?php echo __('links.create_sprint_no_icon'); ?></a></li>
            <li class='nav-header border'></li>
            <li>
                <a href="javascript:void(0);" onclick="jQuery('#sprintSelect').val('all'); leantime.ticketsController.initTicketSearchUrlBuilder('<?php echo e($currentUrlPath); ?>')"><?php echo __('links.all_todos'); ?></a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="jQuery('#sprintSelect').val('backlog'); leantime.ticketsController.initTicketSearchUrlBuilder('<?php echo e($currentUrlPath); ?>')"><?php echo __('links.backlog'); ?></a>
            </li>
            <?php $__currentLoopData = $sprints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprintRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="javascript:void(0);" onclick="jQuery('#sprintSelect').val(<?php echo e($sprintRow->id); ?>); leantime.ticketsController.initTicketSearchUrlBuilder('<?php echo e($currentUrlPath); ?>')"><?php echo e($tpl->escape($sprintRow->name)); ?><?php if(! empty($sprintRow->isInherited)): ?> <span class="label label-info"><?php echo e(__('label.program_sprint')); ?></span><?php endif; ?><br /><small><?php echo sprintf(__('label.date_from_date_to'), format($sprintRow->startDate)->date(), format($sprintRow->endDate)->date()); ?></small></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled82c7bef028765b9b2b447066c3673c)): ?>
<?php $attributes = $__attributesOriginaled82c7bef028765b9b2b447066c3673c; ?>
<?php unset($__attributesOriginaled82c7bef028765b9b2b447066c3673c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled82c7bef028765b9b2b447066c3673c)): ?>
<?php $component = $__componentOriginaled82c7bef028765b9b2b447066c3673c; ?>
<?php unset($__componentOriginaled82c7bef028765b9b2b447066c3673c); ?>
<?php endif; ?>
        <input type="hidden" name="sprintSelect" id="sprintSelect" value="<?php echo e($currentSprintId); ?>" />

    </div>

    
    <div class="pageheader-right">
        
        <?php if(isset($boardSummary)): ?>
            <?php
                // Board metrics as a one-line meta string; segments join with a
                // single " · " so it reads cleanly no matter which are present.
                $summaryParts = [sprintf(__('label.board_task_count'), $boardSummary->total)];
                if ($boardSummary->unassigned > 0) {
                    $summaryParts[] = sprintf(__('label.board_unassigned'), $boardSummary->unassigned);
                }
                if ($boardSummary->dueThisWeek > 0) {
                    $summaryParts[] = sprintf(__('label.board_due_this_week'), $boardSummary->dueThisWeek);
                }
                if ($boardSummary->lastUpdated !== null) {
                    $summaryParts[] = sprintf(__('label.board_updated'), $boardSummary->lastUpdated->setToUserTimezone()->diffForHumans());
                }
            ?>
            <div class="pageheader-meta"><?php echo e(implode(' · ', $summaryParts)); ?></div>
        <?php endif; ?>
        <?php if(
            ($currentSprint !== false)
                && ($currentSprint !== null)
                && count($sprints) > 0
                && $currentSprintId != 'all'
                && $currentSprintId != 'backlog'
        ): ?>
            <span class="dropdown dropdownWrapper headerEditDropdown">
                <a href="javascript:void(0)" class="dropdown-toggle btn btn-transparent" data-toggle="dropdown"><i class="fa-solid fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu editCanvasDropdown">
                    
                    <?php if($login::userIsAtLeast($roles::$editor) && (! is_object($sprint) || empty($sprint->isInherited))): ?>
                        <li><a href="#/sprints/editSprint/<?php echo e($currentSprint); ?>"><?php echo __('link.edit_sprint'); ?></a></li>
                        <li><a href="#/sprints/delSprint/<?php echo e($currentSprint); ?>" class="delete"><?php echo __('links.delete_sprint'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </span>
        <?php endif; ?>
    </div>
    <?php $tpl->dispatchTplEvent('beforePageHeaderClose'); ?>
</div><!--pageheader-->
<?php $tpl->dispatchTplEvent('afterPageHeaderClose'); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/submodules/ticketHeader.blade.php ENDPATH**/ ?>