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
        <span class="fa fa-fw fa-chart-gantt"></span>
    </div>
    <div class="pagetitle">
        <?php if(($sprints !== false) && ($sprints !== null) && count($sprints) > 0): ?>
            <?php if (isset($component)) { $__componentOriginaled82c7bef028765b9b2b447066c3673c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled82c7bef028765b9b2b447066c3673c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.subjectSwitcher','data' => ['parent' => __('headline.milestones'),'current' => $sprint !== false ? $sprint->name : __('label.select_board')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::subjectSwitcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['parent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('headline.milestones')),'current' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sprint !== false ? $sprint->name : __('label.select_board'))]); ?>
                <li><a class="wikiModal inlineEdit" href="#/sprints/editSprint/"><i class="fa-solid fa-plus"></i> <?php echo __('links.create_sprint_no_icon'); ?></a></li>
                <li class='nav-header border'></li>
                <li>
                    <a href="javascript:void(0);" onclick="jQuery('#sprintSelect').val('all'); leantime.ticketsController.initTicketSearchUrlBuilder('<?php echo e($currentUrlPath); ?>')"><?php echo __('links.all_todos'); ?></a>
                </li>
                <li>
                    <a href="javascript:void(0);" onclick="jQuery('#sprintSelect').val('backlog'); leantime.ticketsController.initTicketSearchUrlBuilder('<?php echo e($currentUrlPath); ?>')"><?php echo __('label.backlog'); ?></a>
                </li>
                <?php $__currentLoopData = $sprints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprintRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="javascript:void(0);" onclick="jQuery('#sprintSelect').val(<?php echo e($sprintRow->id); ?>); leantime.ticketsController.initTicketSearchUrlBuilder('<?php echo e($currentUrlPath); ?>')"><?php echo e($tpl->escape($sprintRow->name)); ?><br /><small><?php echo sprintf(__('label.date_from_date_to'), format($sprintRow->startDate)->date(), format($sprintRow->endDate)->date()); ?></small></a>
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
        <?php else: ?>
            <h1><?php echo __('headline.milestones'); ?></h1>
        <?php endif; ?>
        <input type="hidden" name="sprintSelect" id="sprintSelect" value="<?php echo e($currentSprintId); ?>" />
    </div>
    <?php if(
        ($currentSprint !== false)
            && ($currentSprint !== null)
            && count($sprints) > 0
            && $currentSprintId != 'all'
            && $currentSprintId != 'backlog'
    ): ?>
        <div class="pageheader-right">
            <span class="dropdown dropdownWrapper headerEditDropdown">
                <a href="javascript:void(0)" class="dropdown-toggle btn btn-transparent" data-toggle="dropdown"><i class="fa-solid fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu editCanvasDropdown">
                    
                    <?php if($login::userIsAtLeast($roles::$editor) && (! is_object($sprint) || empty($sprint->isInherited))): ?>
                        <li><a href="#/sprints/editSprint/<?php echo e($currentSprint); ?>"><?php echo __('link.edit_sprint'); ?></a></li>
                        <li><a href="#/sprints/delSprint/<?php echo e($currentSprint); ?>" class="delete"><?php echo __('links.delete_sprint'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </span>
        </div>
    <?php endif; ?>
    <?php $tpl->dispatchTplEvent('beforePageHeaderClose'); ?>
</div><!--pageheader-->
<?php $tpl->dispatchTplEvent('afterPageHeaderClose'); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/submodules/timelineHeader.blade.php ENDPATH**/ ?>