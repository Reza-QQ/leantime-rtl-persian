<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'includeTitle' => true,
    'tickets' => [],
    'onTheClock' => false,
    'groupBy' => '',
    'allProjects' => [],
    'allAssignedprojects' => [],
    'projectFilter' => '',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'includeTitle' => true,
    'tickets' => [],
    'onTheClock' => false,
    'groupBy' => '',
    'allProjects' => [],
    'allAssignedprojects' => [],
    'projectFilter' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    // Helper function to count tickets recursively
    if (!function_exists('countTicketsRecursive')) {
        function countTicketsRecursive($tickets) {
            $count = count($tickets);

            foreach ($tickets as $ticket) {
                if (!empty($ticket['children'])) {
                    $count += countTicketsRecursive($ticket['children']);
                }
            }

            return $count;
        }
    }
?>

<div id="yourToDoContainer"
     hx-get="<?php echo e(BASE_URL); ?>/widgets/myToDos/get"
     hx-trigger="<?php echo e(\Leantime\Domain\Tickets\Htmx\HtmxTicketEvents::UPDATE); ?> from:body, <?php echo e(\Leantime\Domain\Tickets\Htmx\HtmxTicketEvents::SUBTASK_UPDATE); ?> from:body"
     class="clear"
     hx-swap="outerHTML"
     hx-ext="json-enc"
     hx-indicator="#todoWidgetLoader"
     data-group-by="<?php echo e($groupBy); ?>"
>

    
    <div id="todoWidgetLoader" class="htmx-indicator full-width-loader">
        <div class="indeterminate"></div>
    </div>

    <div class="clear" style="position:absolute; top:10px; right:35px;">

        <?php $tpl->dispatchTplEvent("beforeTodoWidgetGroupByDropdown"); ?>

        <div class="btn-group left">
            <button class="btn btn-link btn-round-icon dropdown-toggle f-right" type="button" data-tippy-content="<?php echo e(__('text.group_by')); ?>"
                    data-toggle="dropdown"><span class="fa-solid fa-diagram-project"></span></button>
            <ul class="dropdown-menu pull-right">
                <li class="nav-header"><?php echo __("text.group_by"); ?></li>
                <li>
                    <span class="radio">
                        <input type="radio" name="groupBy"
                               <?php if($groupBy == "time"): ?> checked='checked' <?php endif; ?>
                               value="time" id="groupByDate"
                               hx-get="<?php echo e(BASE_URL); ?>/widgets/myToDos/get"
                               hx-trigger="click"
                               hx-target="#yourToDoContainer"
                               hx-swap="outerHTML"
                               hx-indicator="#todoWidgetLoader"
                               style="margin-top:4px;"
                               hx-vals='{"projectFilter": "<?php echo e($projectFilter); ?>", "groupBy": "time" }'
                        />
                        <label for="groupByDate"><?php echo __("label.dates"); ?></label>
                    </span>
                </li>
                <li>
                    <span class="radio">
                        <input type="radio"
                               name="groupBy"
                               <?php if($groupBy == "project"): ?> checked='checked' <?php endif; ?>
                               value="project" id="groupByProject"
                               hx-get="<?php echo e(BASE_URL); ?>/widgets/myToDos/get"
                               hx-trigger="click"
                               hx-target="#yourToDoContainer"
                               hx-swap="outerHTML"
                               hx-indicator="#todoWidgetLoader"
                               style="margin-top:4px;"
                               hx-vals='{"projectFilter": "<?php echo e($projectFilter); ?>", "groupBy": "project" }'
                        />
                        <label for="groupByProject"><?php echo __("label.project"); ?></label>
                    </span>
                </li>
                <li>
                    <span class="radio">
                        <input type="radio"
                               name="groupBy"
                               <?php if($groupBy == "priority"): ?> checked='checked' <?php endif; ?>
                               value="priority" id="groupByPriority"
                               hx-get="<?php echo e(BASE_URL); ?>/widgets/myToDos/get"
                               hx-trigger="click"
                               hx-target="#yourToDoContainer"
                               hx-swap="outerHTML"
                               hx-indicator="#todoWidgetLoader"
                               style="margin-top:4px;"
                               hx-vals='{"projectFilter": "<?php echo e($projectFilter); ?>", "groupBy": "priority" }'
                        />
                        <label for="groupByPriority"><?php echo __("label.priority"); ?></label>
                    </span>
                </li>
            </ul>
        </div>
        <div class="btn-group left ">
            <button class="btn btn-link btn-round-icon dropdown-toggle f-right" type="button" data-toggle="dropdown">
                <i class="fas fa-filter"></i>
                <?php if($projectFilter != ''): ?>
                    <span class='badge badge-primary'>1</span>
                <?php endif; ?>
            </button>
            <ul class="dropdown-menu pull-right">
                <li class="nav-header"><?php echo __("text.filter"); ?></li>
                <li
                    <?php if($projectFilter == ''): ?>
                        class='active'
                    <?php endif; ?>
                ><a href=""
                    hx-get="<?php echo e(BASE_URL); ?>/widgets/myToDos/get"
                    hx-trigger="click"
                    hx-target="#yourToDoContainer"
                    hx-swap="outerHTML"
                    hx-indicator="#todoWidgetLoader"
                    hx-vals='{"projectFilter": "all", "groupBy": "<?php echo e($groupBy); ?>" }'

                    ><?php echo e(__('labels.all_projects')); ?>


                    </a></li>

                <?php if($allAssignedprojects): ?>
                    <?php $__currentLoopData = $allAssignedprojects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li
                            <?php if($projectFilter == $project['id']): ?>
                                class='active'
                            <?php endif; ?>
                        ><a href=""
                            hx-get="<?php echo e(BASE_URL); ?>/widgets/myToDos/get"
                            hx-trigger="click"
                            hx-target="#yourToDoContainer"
                            hx-swap="outerHTML"
                            hx-indicator="#todoWidgetLoader"
                            hx-vals='{"projectFilter": "<?php echo e($project['id']); ?>", "groupBy": "<?php echo e($groupBy); ?>" }'
                            ><?php echo e($project['name']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </ul>
        </div>

        <?php $tpl->dispatchTplEvent("afterTodoWidgetGroupByDropdown"); ?>

    </div>

    <div class="tw-flex tw-flex-col">

        <div class="">
            <?php if($tickets !== null && count($tickets) == 0): ?>

                <div class='center'>
                    <div style='width:30%' class='svgContainer'>
                        <?php echo file_get_contents(ROOT . "/dist/images/svg/undraw_a_moment_to_relax_bbpa.svg"); ?>

                    </div>
                    <br/>
                    <h4><?php echo e(__("text.no_tasks_assigned")); ?></h4>
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','contentRole' => 'link','class' => 'add-task-button','style' => 'margin-left:0px;','dataGroup' => 'emptyGroup']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','contentRole' => 'link','class' => 'add-task-button','style' => 'margin-left:0px;','data-group' => 'emptyGroup']); ?><i class="fa-solid fa-circle-plus"></i> <?php echo e(__('links.add_task')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>

                    <div class="quickAddForm" id="quickAddForm-emptyGroup"
                         style="display:none; margin-bottom:15px; padding-bottom:5px; padding-left:5px;">
                        <form method="post"
                              hx-post="<?php echo e(BASE_URL); ?>/widgets/myToDos/addTodo"
                              hx-target="#yourToDoContainer"
                              hx-swap="outerHTML"
                              hx-indicator="#todoWidgetLoader">
                            <div class="tw-flex tw-flex-row tw-gap-2">
                                <div class="tw-flex-grow">
                                    <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['variant' => 'headline','name' => 'headline','style' => 'font-size:var(--base-font-size)','placeholder' => ''.e(__('input.placeholders.what_are_you_working_on')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'headline','name' => 'headline','style' => 'font-size:var(--base-font-size)','placeholder' => ''.e(__('input.placeholders.what_are_you_working_on')).'']); ?>
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
                                    <input type="hidden" name="quickadd" value="true"/>
                                </div>
                                <div>
                                    <select name="projectId">
                                        <?php $__currentLoopData = $allAssignedprojects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($project['id']); ?>"

                                                <?php echo e((session('currentProject') == $project['id'] ) ? 'selected' : ''); ?>

                                            ><?php echo e($project["name"]); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div>
                                    <input type="hidden" name="milestone" value=""/>
                                    <input type="hidden" name="status" value="3"/>
                                    <input type="hidden" name="priority"
                                           value=""/>
                                    <input type="hidden" name="dateToFinish"
                                           value="<?php echo e(date('Y-m-d', strtotime('next friday'))); ?>"/>
                                    <?php if (isset($component)) { $__componentOriginal6029a3567a8faaf6e1fc536869bd9e70 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.textarea','data' => ['name' => 'description','class' => 'description-input','style' => 'display:none;','placeholder' => ''.e(__('input.placeholders.description')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','class' => 'description-input','style' => 'display:none;','placeholder' => ''.e(__('input.placeholders.description')).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70)): ?>
<?php $attributes = $__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70; ?>
<?php unset($__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6029a3567a8faaf6e1fc536869bd9e70)): ?>
<?php $component = $__componentOriginal6029a3567a8faaf6e1fc536869bd9e70; ?>
<?php unset($__componentOriginal6029a3567a8faaf6e1fc536869bd9e70); ?>
<?php endif; ?>
                                </div>
                                <div>
                                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','labelText' => __('buttons.save'),'name' => 'create','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'create','contentRole' => 'primary']); ?>
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
                                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','class' => 'cancel-add-task','dataGroup' => 'emptyGroup']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','class' => 'cancel-add-task','data-group' => 'emptyGroup']); ?><?php echo e(__('buttons.cancel')); ?> <?php echo $__env->renderComponent(); ?>
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
                        </form>
                    </div>


                </div>

            <?php endif; ?>

            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupKey => $ticketGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    //Get first duedate if exist
                    $firstDueDate = null;
                    foreach($ticketGroup['tickets'] as $ticket) {
                        if($ticket['dateToFinish'] != '0000-00-00' && $ticket['dateToFinish'] != '1969-12-31 00:00:00') {
                            if($firstDueDate == null || $ticket['dateToFinish'] < $firstDueDate) {
                                $firstDueDate = $ticket['dateToFinish'];
                            }
                        }
                    }
                ?>

                <?php if (isset($component)) { $__componentOriginalb42738ebdee3365d3e140e48fd37e95c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb42738ebdee3365d3e140e48fd37e95c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.accordion','data' => ['id' => 'ticketBox1-'.e($groupKey).'-'.e($loop->index).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'ticketBox1-'.e($groupKey).'-'.e($loop->index).'']); ?>
                     <?php $__env->slot('title', null, []); ?> 
                        <?php echo __($ticketGroup["labelName"]); ?>

                        <span class="task-count" id="task-count-<?php echo e($groupKey); ?>">
                            (<?php echo e(count($ticketGroup["tickets"])); ?>)
                        </span>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('actionlink', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','contentRole' => 'link','class' => 'add-task-button','style' => 'padding:0px; padding-left:1px; width:31px; line-height:31px; height:31px; font-weight:bold; text-align: center; font-size:var(--font-size-l);','dataGroup' => ''.e($groupKey).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','contentRole' => 'link','class' => 'add-task-button','style' => 'padding:0px; padding-left:1px; width:31px; line-height:31px; height:31px; font-weight:bold; text-align: center; font-size:var(--font-size-l);','data-group' => ''.e($groupKey).'']); ?>
                            <i class="fa-solid fa-circle-plus"></i> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, []); ?> 
                        <!-- Quick Add Form for this group -->
                        <div class="quickAddForm" id="quickAddForm-<?php echo e($groupKey); ?>"
                             style="display:none; margin-bottom:15px; padding-bottom:5px; padding-left:5px;">
                            <form method="post"
                                  hx-post="<?php echo e(BASE_URL); ?>/widgets/myToDos/addTodo"
                                  hx-target="#yourToDoContainer"
                                  hx-swap="outerHTML"
                                  hx-indicator="#todoWidgetLoader">
                                <div class="tw-flex tw-flex-row tw-gap-2">
                                    <div class="tw-flex-grow">
                                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['variant' => 'headline','name' => 'headline','style' => 'font-size:var(--base-font-size)','placeholder' => ''.e(__('input.placeholders.what_are_you_working_on')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'headline','name' => 'headline','style' => 'font-size:var(--base-font-size)','placeholder' => ''.e(__('input.placeholders.what_are_you_working_on')).'']); ?>
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
                                        <input type="hidden" name="quickadd" value="true"/>
                                    </div>
                                    <div>
                                        <select name="projectId">
                                            <?php $__currentLoopData = $allAssignedprojects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($project['id']); ?>"

                                                    <?php echo e((($groupBy === "project" && $project['id'] == $groupKey) || ($groupBy !== "project" && session('currentProject') == $groupKey)) ? 'selected' : ''); ?>

                                                ><?php echo e($project["name"]); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div>
                                        <input type="hidden" name="milestone" value=""/>
                                        <input type="hidden" name="status" value="3"/>
                                        <input type="hidden" name="priority"
                                               value="<?php echo e($groupBy === "priority" ? $groupKey : ''); ?>"/>

                                        <?php
                                            $dueDate = '';
                                            if($groupKey === 'thisWeek'){
                                                $dueDate = dtHelper()->userNow()->next('Friday')->formatDateForUser();
                                            }else if($groupKey === 'overdue'){
                                                $dueDate = dtHelper()->userNow()->subtract("3 days")->formatDateForUser();
                                            }
                                        ?>
                                        <input type="hidden" name="dateToFinish"
                                               value="<?php echo e($dueDate); ?>"/>
                                        <?php if (isset($component)) { $__componentOriginal6029a3567a8faaf6e1fc536869bd9e70 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.textarea','data' => ['name' => 'description','class' => 'description-input','style' => 'display:none;','placeholder' => ''.e(__('input.placeholders.description')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','class' => 'description-input','style' => 'display:none;','placeholder' => ''.e(__('input.placeholders.description')).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70)): ?>
<?php $attributes = $__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70; ?>
<?php unset($__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6029a3567a8faaf6e1fc536869bd9e70)): ?>
<?php $component = $__componentOriginal6029a3567a8faaf6e1fc536869bd9e70; ?>
<?php unset($__componentOriginal6029a3567a8faaf6e1fc536869bd9e70); ?>
<?php endif; ?>
                                    </div>
                                    <div>
                                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','labelText' => __('buttons.save'),'name' => 'create','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'create','contentRole' => 'primary']); ?>
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
                                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','class' => 'cancel-add-task','dataGroup' => ''.e($groupKey).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','class' => 'cancel-add-task','data-group' => ''.e($groupKey).'']); ?><?php echo e(__('buttons.cancel')); ?> <?php echo $__env->renderComponent(); ?>
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
                            </form>
                        </div>

                        <div class="sortable-list" data-container-type="section" data-group-key="<?php echo e($groupKey); ?>" style="padding-left:5px;">
                            <?php $__currentLoopData = $ticketGroup['tickets']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('widgets::partials.todoItem', ['ticket' => $row, 'statusLabels' => $statusLabels, 'onTheClock' => $onTheClock, 'tpl' => $tpl, 'level' => 0, 'groupKey' => $groupKey], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     <?php $__env->endSlot(); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb42738ebdee3365d3e140e48fd37e95c)): ?>
<?php $attributes = $__attributesOriginalb42738ebdee3365d3e140e48fd37e95c; ?>
<?php unset($__attributesOriginalb42738ebdee3365d3e140e48fd37e95c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb42738ebdee3365d3e140e48fd37e95c)): ?>
<?php $component = $__componentOriginalb42738ebdee3365d3e140e48fd37e95c; ?>
<?php unset($__componentOriginalb42738ebdee3365d3e140e48fd37e95c); ?>
<?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <?php if(isset($hasMoreTickets) && $hasMoreTickets === true): ?>
            <!-- Global Load more trigger for infinite scroll -->
            <div id="global-load-more"
                 class="load-more-trigger"
                 hx-get="<?php echo e(BASE_URL); ?>/widgets/myToDos/loadMore"
                 hx-trigger="intersect once"
                 hx-target="#yourToDoContainer"
                 hx-swap="outerHTML"
                 hx-vals='{"limit": <?php echo e($limit); ?>, "groupBy": "<?php echo e($groupBy); ?>", "projectFilter": "<?php echo e($projectFilter); ?>"}'>
                <div class="tw-text-center tw-py-4">
                    <div class="htmx-indicator">
                        <div class="indeterminate"></div>
                    </div>
                    <div class="tw-text-sm tw-text-gray-500">
                        <?php echo e(__('text.loading_more_tasks')); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <?php $tpl->dispatchTplEvent('afterTodoListWidgetBox'); ?>


    <script type="text/javascript">

        <?php $tpl->dispatchTplEvent('scripts.afterOpen'); ?>


        jQuery(document).ready(function () {

            console.debugging = true;
            console.debug = function () {
                if (!console.debugging) return;
                console.log.apply(this, arguments);
            };

            var sortableEnabled = <?php echo e($tpl->dispatchFilter('todoWidgetSortableEnabled', 'true') ? 'true' : 'false'); ?>;

            <?php if(session('userdata.id') != null): ?>
                leantime.ticketsController.initMilestoneDropdown();
                leantime.ticketsController.initStatusDropdown();
                leantime.ticketsController.initDueDateTimePickers();


                if(sortableEnabled) {

                    // Initialize the sortable lists for hierarchical tasks
                    jQuery('.sortable-list').nestedSortable();

                }

            <?php else: ?>
                if(sortableEnabled) {
                    leantime.authController.makeInputReadonly(".maincontentinner");
                }
            <?php endif; ?>
        });

        // Register once: this script lives inside #yourToDoContainer, which re-swaps on
        // every ticket event, so an unguarded htmx.onLoad stacked a new handler per refresh.
        if (!window.leantime._todoSortableOnLoadRegistered) {
            window.leantime._todoSortableOnLoadRegistered = true;
            htmx.onLoad(function () {
                jQuery('.sortable-list').nestedSortable();
            });
        }


    </script>

    <script>

        // Quick Add Task functionality
        jQuery(document).ready(function () {
            initAddTaskBtns();
        });

        // Register once (see note above — same re-swap handler-leak applies here).
        if (!window.leantime._todoAddBtnsOnLoadRegistered) {
            window.leantime._todoAddBtnsOnLoadRegistered = true;
            htmx.onLoad(function () {
                initAddTaskBtns();
            });
        }

        function initAddTaskBtns() {
            // Show the quick add form when the + button is clicked
            jQuery('.add-task-button').on('click', function () {
                var groupKey = jQuery(this).data('group');
                jQuery('#quickAddForm-' + groupKey).show();
                jQuery('#quickAddForm-' + groupKey + ' .main-title-input').focus();
            });

            // Hide the quick add form when cancel is clicked
            jQuery('.cancel-add-task').on('click', function () {
                var groupKey = jQuery(this).data('group');
                jQuery('#quickAddForm-' + groupKey).hide();
                jQuery('#quickAddForm-' + groupKey + ' .main-title-input').val('');
                jQuery('#quickAddForm-' + groupKey + ' .description-input').val('');
            });

            jQuery('.ticket-title').each(function(){

                let currentTitle = jQuery(this);
                jQuery(this).hover(function () {
                    jQuery(this).find(".edit-button").show();
                },
                    function(){
                        jQuery(this).find(".edit-button").hide();

                });

                jQuery(this).find(".edit-button").click(function() {
                    currentTitle.find(".edit-button").hide();
                    currentTitle.find('.title-text').hide();
                    currentTitle.find('.edit-form').show();
                });

                jQuery(this).find(".edit-form .cancel-edit-task").click(function() {
                    currentTitle.find('.title-text').show();
                    currentTitle.find('.edit-form').hide();
                });

            });

        }

    </script>

</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Widgets/Templates/partials/myToDos.blade.php ENDPATH**/ ?>