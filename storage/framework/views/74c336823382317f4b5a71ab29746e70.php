<?php
    use Leantime\Core\Controller\Frontcontroller;

    $currentRoute = Frontcontroller::getCurrentRoute();
    $currentUrlPath = BASE_URL . '/' . str_replace('.', '/', $currentRoute);
    // Program boards render this partial under a /pgmPro/* route and can pass an explicit
    // self-redirect target. Default to the current route for normal per-project views.
    $searchFormUrl = $searchFormUrl ?? $currentUrlPath;
    $groupBy = $groupByOptions;
    $sortBy = $sortOptions;
    $statusLabels = $allTicketStates;
    $taskToggle = $enableTaskTypeToggle ?? false;
    // Multi-project (program) context: show the project filter + the "project" group-by.
    $showProjectFilter = isset($availableProjects);
    // Kanban shows status as columns, so the status group-by is suppressed. Program kanban
    // templates set $isKanbanView; per-project views derive it from the route.
    $isKanbanView = $isKanbanView ?? ($currentRoute === 'tickets.showKanban');
?>

<form action="" method="get" id="ticketSearch">

    <input type="hidden" value="1" name="search"/>
    <?php if (! ($showProjectFilter)): ?>
        <input type="hidden" value="<?php echo e(session('currentProject')); ?>" name="projectId" id="projectIdInput"/>
    <?php endif; ?>

    <div class="filterWrapper" style="display:inline-block; position:relative; vertical-align: bottom; margin-bottom:20px;">
        
        <a class="btn btn-link" onclick="leantime.ticketsController.toggleFilterBar();" style="margin-right:5px;"
           data-tippy-content="<?php echo e(__('popover.filter')); ?>">
            <i class="fas fa-filter"></i> فیلتر<?php echo $numOfFilters > 0 ? "  <span class='badge badge-primary'>" . $numOfFilters . '</span> ' : ''; ?>

            
        </a><?php if($currentRoute !== 'tickets.roadmap' && $currentRoute != 'tickets.showProjectCalendar'): ?><div class="btn-group viewDropDown">
<button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown" data-tippy-content="<?php echo e(__('popover.group_by')); ?>">
                <span class="fa-solid fa-diagram-project"></span> گروه‌بندی بر اساس
                <?php if($searchCriteria['groupBy'] != 'all' && $searchCriteria['groupBy'] != ''): ?>
                    <span class="badge badge-primary">1</span>
                <?php endif; ?>
            </button>
            <ul class="dropdown-menu">
                <?php $__currentLoopData = $groupBy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($input['field'] === 'status' && $isKanbanView): ?>
                        <?php continue; ?>
                    <?php endif; ?>
                    
                    <?php if($input['field'] === 'projectId' && ! $showProjectFilter): ?>
                        <?php continue; ?>
                    <?php endif; ?>
                    <li>
                        <span class="radio">
                            <input
                                type="radio"
                                name="groupBy"
                                <?php if($searchCriteria['groupBy'] == $input['field']): ?> checked='checked' <?php endif; ?>
                                value="<?php echo e($input['field']); ?>"
                                id="<?php echo e($input['id']); ?>"
                                onclick="leantime.ticketsController.initTicketSearchUrlBuilder('<?php echo e($searchFormUrl); ?>')"
                            />
                            <label for="<?php echo e($input['id']); ?>"><?php echo __("label.{$input['label']}"); ?></label>
                        </span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
            <?php endif; ?>
        <div class="filterBar hideOnLoad" style="width:250px;">

            <div class="row-fluid">

                <?php $tpl->dispatchTplEvent('filters.beforeFirstBarField'); ?>

                <?php if($showProjectFilter): ?>
                    <div class="">
                        <label class="inline"><?php echo __('label.project'); ?></label>
                        <div class="form-group">
                            <select data-placeholder="<?php echo e(__('label.project')); ?>" title="<?php echo e(__('label.project')); ?>" name="projects" multiple="multiple" class="project-select" id="projectsSelect">
                                <option value="" data-placeholder="true"><?php echo __('label.project'); ?></option>
                                <?php $__currentLoopData = $availableProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectFilterId => $projectFilterName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($projectFilterId); ?>"
                                        <?php if(isset($searchCriteria['projects']) && in_array((string) $projectFilterId, explode(',', (string) $searchCriteria['projects']), true)): ?> selected='selected' <?php endif; ?>
                                    ><?php echo e($tpl->escape($projectFilterName)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="">
                    <label class="inline"><?php echo __('label.user'); ?></label>
                    <div class="form-group">
                        <select data-placeholder="<?php echo e(__('input.placeholders.filter_by_user')); ?>"  title="<?php echo e(__('input.placeholders.filter_by_user')); ?>" name="users" multiple="multiple" class="user-select" id="userSelect">
                            <option value="" data-placeholder="true">All Users</option>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($userRow['id']); ?>"
                                    <?php if($searchCriteria['users'] !== false && $searchCriteria['users'] !== null && array_search($userRow['id'], explode(',', $searchCriteria['users'])) !== false): ?> selected='selected' <?php endif; ?>
                                ><?php echo sprintf(__('text.full_name'), $tpl->escape($userRow['firstname']), $tpl->escape($userRow['lastname'])); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="">
                    <label class="inline"><?php echo __('label.milestone'); ?></label>
                    <div class="form-group">
                        <select data-placeholder="<?php echo e(__('input.placeholders.filter_by_milestone')); ?>" multiple="multiple" title="<?php echo e(__('input.placeholders.filter_by_milestone')); ?>" name="milestone" id="milestoneSelect">
                            <option value="" data-placeholder="true"><?php echo __('label.all_milestones'); ?></option>
                            <option value="0" <?php if(isset($searchCriteria['milestone']) && in_array('0', explode(',', (string) $searchCriteria['milestone']), true)): ?> selected='selected' <?php endif; ?>><?php echo __('label.not_assigned_to_milestone'); ?></option>
                            <?php if(is_array($milestones)): ?>
                                <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestoneRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($milestoneRow->id); ?>"
                                        <?php if(isset($searchCriteria['milestone']) && ($searchCriteria['milestone'] == $milestoneRow->id) && array_search($milestoneRow->id, explode(',', $searchCriteria['milestone'])) !== false): ?> selected='selected' <?php endif; ?>
                                    ><?php echo e($tpl->escape($milestoneRow->headline)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="">
                    <label class="inline"><?php echo __('label.todo_type'); ?></label>
                    <div class="form-group">
                        <select multiple="multiple"  data-placeholder="<?php echo e(__('input.placeholders.filter_by_type')); ?>" title="<?php echo e(__('input.placeholders.filter_by_type')); ?>" name="type" id="typeSelect">
                            <option value="" data-placeholder="true"><?php echo __('label.all_types'); ?></option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>"
                                    <?php if(isset($searchCriteria['type']) && array_search($type, explode(',', $searchCriteria['type'])) !== false): ?> selected='selected' <?php endif; ?>
                                ><?php echo e($type); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="">
                    <label class="inline"><?php echo __('label.todo_priority'); ?></label>
                    <div class="form-group">
                        <select multiple="multiple"  data-placeholder="<?php echo e(__('input.placeholders.filter_by_priority')); ?>" title="<?php echo e(__('input.placeholders.filter_by_priority')); ?>" name="priority" id="prioritySelect">
                            <option value="" data-placeholder="true"><?php echo __('label.all_priorities'); ?></option>
                            <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priorityKey => $priorityValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($priorityKey); ?>"
                                    <?php if(isset($searchCriteria['priority']) && array_search($priorityKey, explode(',', $searchCriteria['priority'])) !== false): ?> selected='selected' <?php endif; ?>
                                ><?php echo e($priorityValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="">
                    <label class="inline"><?php echo __('label.todo_status'); ?></label>
                    <div class="form-group">
                        <select multiple="multiple"  data-placeholder="<?php echo e(__('input.placeholders.filter_by_status')); ?>" name="status"  multiple="multiple" class="status-select" id="statusSelect">
                            <option value="" data-placeholder="true">همه وضعیت‌ها</option>
                            <option value="not_done" <?php if($searchCriteria['status'] !== false && str_contains($searchCriteria['status'], 'not_done')): ?> selected='selected' <?php endif; ?>><?php echo __('label.not_done'); ?></option>
                            <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"
                                    <?php if($searchCriteria['status'] !== false && array_search((string) $key, explode(',', $searchCriteria['status'])) !== false): ?> selected='selected' <?php endif; ?>
                                ><?php echo e($tpl->escape($label['name'])); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="">
                    <div class="form-group">
                        <label class="inline"><?php echo __('label.search_term'); ?></label>
                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'termInput','id' => 'termInput','style' => 'width: 230px','value' => ''.e($searchCriteria['term']).'','placeholder' => ''.e(__('label.search_term')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'termInput','id' => 'termInput','style' => 'width: 230px','value' => ''.e($searchCriteria['term']).'','placeholder' => ''.e(__('label.search_term')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
                    </div>
                </div>

                <div class="" style="margin-top:15px;">
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','labelText' => __('buttons.search'),'name' => 'search','class' => 'form-control','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.search')),'name' => 'search','class' => 'form-control','contentRole' => 'primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                </div>

            </div>

        </div>

        <?php if(isset($taskToggle) && $taskToggle === true): ?>
            <div class="" style="float:right; margin-left:5px; ">
                <input type="checkbox" class="toggle" id="taskTypeToggle" onchange="jQuery('#ticketSearch').submit();" name="showTasks" value="true" <?php echo e(($showTasks === 'true') ? 'checked="checked"' : ''); ?> style="margin-right:5px;" />
                <label style="text-wrap: nowrap; float:right;">نمایش کارها</label>
            </div>
        <?php endif; ?>



    </div>



    <div class="clearall"></div>

    <?php $tpl->dispatchTplEvent('filters.beforeBar'); ?>



    <?php $tpl->dispatchTplEvent('filters.beforeFormClose'); ?>
</form>

<script>
    jQuery(document).ready(function() {

        new SlimSelect({
            select: '#userSelect',
            settings: {
                placeholderText: 'All Users',
            },
        });
        new SlimSelect({
            select: '#milestoneSelect',
            settings: {
                placeholderText: 'All Milestones',
            },
        });
        new SlimSelect({
            select: '#prioritySelect',
            settings: {
                placeholderText: 'All Priorities',
            },
        });
        new SlimSelect({
            select: '#typeSelect',
            settings: {
                placeholderText: 'All Types',
            },
        });
        new SlimSelect({
            select: '#statusSelect',
            settings: {
                placeholderText: 'All Statuses',
            },
        });
        <?php if($showProjectFilter): ?>
        new SlimSelect({
            select: '#projectsSelect',
            settings: {
                placeholderText: <?php echo \Illuminate\Support\Js::from(__('label.project'))->toHtml() ?>,
            },
        });
        <?php endif; ?>

        leantime.ticketsController.initTicketSearchSubmit('<?php echo e($searchFormUrl); ?>');

    })
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/submodules/ticketFilter.blade.php ENDPATH**/ ?>