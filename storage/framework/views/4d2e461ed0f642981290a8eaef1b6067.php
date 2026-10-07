<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'ticket',
    'statusLabels',
    'onTheClock',
    'tpl',
    'level' => 0
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
    'ticket',
    'statusLabels',
    'onTheClock',
    'tpl',
    'level' => 0
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $ticketDataJson = json_encode([
        'id' =>  $ticket['id'] ,
        'title' =>  $ticket['headline'],
        'color' =>   'var(--accent2)',
        'enitityType' =>  'ticket',
        'url' =>  BASE_URL.'#/tickets/showTicket/'.$ticket['id'],
    ], JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP);

    $hasChildren = !empty($ticket['children']);
?>

<div class="sortable-item draggable-todo"
     id="ticket_<?php echo e($groupKey.$ticket['id']); ?>"
     data-item-type="<?php echo e($ticket['type'] === 'milestone' ? 'milestone' : ($ticket['type'] === 'subtask' ? 'subtask' : 'task')); ?>"
     data-id="<?php echo e($ticket['id']); ?>"
     data-project="<?php echo e($ticket['projectId']); ?>"
     data-draggable="true"
     data-sort-index="<?php echo e($ticket['sortIndex'] ?? 10); ?>"
     data-event='<?php echo $ticketDataJson; ?>'>

    <?php
        $accordionId = 'task-children-'.$groupKey.$ticket['id'];
        $accordionState = $tpl->getToggleState($tpl->getToggleState("accordion_content-".$accordionId) === 'closed' ? 'closed' : 'open');
    ?>

    <div
        class="tw-relative ticketBox <?php echo e($ticket['type'] === 'milestone' ? 'milestone-box priority-border- ' : 'priority-border-'.$ticket['priority']); ?> <?php echo e($hasChildren ? 'has-children' : ''); ?>"
        data-val="<?php echo e($ticket['id']); ?>"
        data-event='<?php echo $ticketDataJson; ?>'
        <?php if($ticket['type'] === 'milestone'): ?>
            style="background: var(--secondary-background) linear-gradient(135deg, <?php echo e($ticket['tags']); ?> 0%, var(--accent1) 100%); background-repeat: no-repeat; background-size: 100% 5px; background-position: bottom;"
        <?php endif; ?>
    >
        <div class="tw-absolute full-width-loader htmx-indicator-ticket-<?php echo e($ticket['id']); ?>">
            <div class="indeterminate"></div>
        </div>

        <?php if($hasChildren): ?>
            <div id="accordion_toggle_<?php echo e($accordionId); ?>"
                 class="task-collapse-toggle accordion-toggle <?php echo e($accordionState); ?>"
                 onclick="leantime.snippets.accordionToggle('<?php echo e($accordionId); ?>');"
            >
                <i class="fa fa-angle-<?php echo e($accordionState == 'closed' ? 'right' : 'down'); ?>"></i>
            </div>
        <?php endif; ?>

        <?php if($ticket['type'] == 'milestone'): ?>
            <div class="tw-flex tw-flex-row tw-items-center tw-gap-4">
                <div class="tw-flex-grow">
                    <small style="display:inline-block; "><?php echo e($ticket['projectName']); ?></small>
                    <h4><a href="#/tickets/editMilestone/<?php echo e($ticket['id']); ?>"
                           style="font-size:var(--font-size-l);"><?php echo e($ticket['headline']); ?></a></h4>

                </div>
                <div class="tw-flex-grow">
                    <div hx-trigger="load"
                         hx-indicator=".htmx-indicator-ticket-<?php echo e($ticket['id']); ?>"
                         hx-get="<?= BASE_URL ?>/hx/tickets/milestones/progress?milestoneId=<?= $ticket['id'] ?>&progressColor=<?php echo e(trim($ticket['tags'], "#")); ?>">
                        <div class="htmx-indicator">
                                <?= $tpl->__('label.loading_milestone') ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="tw-flex tw-flex-row">
                <div class="tw-content-center">
                    <div class="tw-content-center tw-mr-[10px]">
                        <?php echo $__env->make('tickets::partials.timerButton', ['parentTicketId' => $ticket['id'], 'onTheClock' => $onTheClock], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>

                <div class="tw-flex-1 ticket-title ticket-title-wrapper">
                    <div class="title-text">
                        <small style="display:inline-block; "><?php echo e($ticket['projectName']); ?></small> <br/>
                        <strong><a href="#/tickets/showTicket/<?php echo e($ticket['id']); ?>" preload="mouseover"
                                   class="ticket-headline-<?php echo e($ticket['id']); ?>"><?php echo e($ticket['headline']); ?></a></strong>
                        &nbsp;<a href="javascript:void(0);" class="tw-hidden edit-button"
                                 data-tippy-content="<?php echo e(__('text.edit_task_headline')); ?>"><i class="fa fa-edit"></i></a>

                    </div>
                    <div class="tw-hidden edit-form">
                        <form class="tw-flex tw-flex-row tw-items-center tw-gap-2"
                              hx-post="<?php echo e(BASE_URL); ?>/hx/widgets/myToDos/updateTitle"
                              hx-target=".ticket-headline-<?php echo e($ticket['id']); ?>"
                              onsubmit="jQuery(this).closest('.edit-form').find('.cancel-edit-task').click();"
                        >
                            <input type="hidden" name="id" value="<?php echo e($ticket['id']); ?>"/>
                            <div>
                                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['variant' => 'headline','style' => 'font-size:var(--base-font-size); margin-bottom:0px','value' => ''.e($ticket['headline']).'','name' => 'headline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'headline','style' => 'font-size:var(--base-font-size); margin-bottom:0px','value' => ''.e($ticket['headline']).'','name' => 'headline']); ?>
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
                            <div>
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'submit','name' => 'edit','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'submit','name' => 'edit','contentRole' => 'primary']); ?>
                                    <i class="fa fa-check"></i>
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
                            <div>
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','class' => 'cancel-edit-task','dataGroup' => ''.e($groupKey).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','class' => 'cancel-edit-task','data-group' => ''.e($groupKey).'']); ?><i
                                        class="fa fa-x"></i> <?php echo $__env->renderComponent(); ?>
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
                        </form>
                    </div>
                </div>

                <?php $tpl->dispatchTplEvent('beforePlaceholder', ['ticket' => (object)$ticket]); ?>
                <div class="placeholder-container tw-flex-1 tw-flex tw-flex-row tw-content-center">
                    <?php $tpl->dispatchTplEvent('placeholderContainer', ['ticket' => (object)$ticket]); ?>
                </div>

                <?php $tpl->dispatchTplEvent('beforeDueDate', ['ticket' => (object)$ticket]); ?>
                <div
                    class="due-date-container tw-flex-1 tw-justify-right tw-flex tw-flex-row tw-justify-end tw-content-center due-date-wrapper">
                    <div class="tw-content-center">
                        <div class="date-picker-form-control">
                            <i class="fa-solid fa-business-time infoIcon"
                               data-tippy-content="<?php echo e(__("label.due")); ?>"></i>

                            <input id="due-date-picker-<?php echo e($ticket['id']); ?>"
                                   type="text"
                                   title="<?php echo e(__("label.due")); ?>"
                                   value="<?php echo e(format($ticket['dateToFinish'])->date(__("text.anytime"))); ?>"
                                   class="duedates secretInput"
                                   style="margin-left:0px; width:100px;"
                                   data-id="<?php echo e($ticket['id']); ?>"
                                   onchange="jQuery('#due-date-picker-trigger-<?php echo e($ticket['id']); ?>').text(this.value);"
                                   name="date"
                                   hx-post="<?php echo e(BASE_URL); ?>/widgets/myToDos/updateDueDate"
                                   hx-trigger="change"
                                   hx-vals='{"id": "<?php echo e($ticket['id']); ?>"}'
                                   hx-indicator=".htmx-indicator-ticket-<?php echo e($ticket['id']); ?>"/>
                            <button class="reset-button"
                                    data-id="<?php echo e($ticket['id']); ?>"
                                    id="reset-date-<?php echo e($ticket['id']); ?>"
                                    hx-post="<?php echo e(BASE_URL); ?>/widgets/myToDos/updateDueDate"
                                    hx-vals='{"id": "<?php echo e($ticket['id']); ?>", "date": ""}'
                                    hx-indicator=".htmx-indicator-ticket-<?php echo e($ticket['id']); ?>">
                                <span class="sr-only"><?php echo e(__("language.resetDate")); ?></span>
                                <i class="fa fa-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="tw-content-center">
                        <?php $tpl->dispatchTplEvent('afterDueDate', ['ticket' => (object)$ticket]); ?>
                    </div>
                </div>

                <?php $tpl->dispatchTplEvent('beforeStatusUpdate'); ?>
                <div
                    class="status-container tw-flex-1 tw-justify-items-end tw-flex tw-flex-row tw-justify-end tw-gap-2 tw-content-center">
                    <div class="tw-content-center tw-mr-[10px] dropdown ticketDropdown statusDropdown colorized show">
                        <a class="dropdown-toggle f-left status <?php echo e($statusLabels[$ticket['projectId']][$ticket['status']]["class"] ?? 'label-default'); ?>"
                           href="javascript:void(0);"
                           role="button"
                           id="statusDropdownMenuLink<?php echo e($ticket['id']); ?>"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            <span class="text">
                                <?php if(isset($statusLabels[$ticket['projectId']][$ticket['status']])): ?>
                                    <?php echo e($statusLabels[$ticket['projectId']][$ticket['status']]["name"]); ?>

                                <?php else: ?>
                                    unknown
                                <?php endif; ?>
                            </span>
                            &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu pull-right"
                            aria-labelledby="statusDropdownMenuLink<?php echo e($ticket['id']); ?>">
                            <li class="nav-header border"><?php echo e(__("dropdown.choose_status")); ?></li>
                            <?php $__currentLoopData = $statusLabels[$ticket['projectId']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class='dropdown-item'>
                                    <a href='javascript:void(0);'
                                       class='<?php echo e($label["class"]); ?>'
                                       data-label='<?php echo e($label["name"]); ?>'
                                       data-value='<?php echo e($ticket['id']); ?>_<?php echo e($key); ?>_<?php echo e($label["class"]); ?>'
                                       id='ticketStatusChange<?php echo e($ticket['id'] . $key); ?>'
                                       hx-post="<?php echo e(BASE_URL); ?>/widgets/myToDos/updateStatus"
                                       hx-swap="none"
                                       hx-vals='{"id": "<?php echo e($ticket['id']); ?>", "status": "<?php echo e($key); ?>"}'>
                                        <?php echo e($label["name"]); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <div class="tw-content-center">
                        <div class="scheduler">
                            <?php if( $ticket['editFrom'] != "0000-00-00 00:00:00" && $ticket['editFrom'] != "1969-12-31 00:00:00"): ?>
                                <i class="fa-solid fa-calendar-check infoIcon" style="color:var(--accent2)"
                                   data-tippy-content="<?php echo e(__('text.schedule_to_start_on')); ?> <?php echo e(format($ticket['editFrom'])->date()); ?>"></i>
                            <?php else: ?>
                                <i class="fa-regular fa-calendar-xmark infoIcon"
                                   data-tippy-content="<?php echo e(__('text.not_scheduled_drag_ai')); ?>"></i>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tw-content-center">
                        <?php echo $__env->make("tickets::partials.ticketsubmenu", ["ticket" => $ticket, "onTheClock" => $onTheClock, "allowSubtaskCreation" => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>

                </div>

            </div>
        <?php endif; ?>

    </div>

    <!-- Subtask Form -->
    <div id="subtask-form-<?php echo e($ticket['id']); ?>" class="subtask-form ticketBox"
         style="display:none; margin:10px; margin-left:40px;">
        <form class="form-group"
              hx-post="<?php echo e(BASE_URL); ?>/widgets/myToDos/addSubtask?ticketId=<?php echo e($ticket['id']); ?>"
              hx-target="#yourToDoContainer"
              hx-swap="outerHTML"
              hx-indicator=".htmx-indicator-ticket-<?php echo e($ticket['id']); ?>">
            <input type="hidden" value="new" name="subtaskId"/>
            <input type="hidden" value="1" name="subtaskSave"/>
            <input type="hidden" value="<?php echo e(format($ticket['dateToFinish'])->date()); ?>" name="dateToFinish"/>
            <div class="tw-flex tw-flex-row tw-gap-2">
                <div class="tw-flex-grow">
                    <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'headline','variant' => 'headline','style' => 'font-size:var(--base-font-size)','placeholder' => ''.e(__('input.placeholders.what_are_you_working_on')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'headline','variant' => 'headline','style' => 'font-size:var(--base-font-size)','placeholder' => ''.e(__('input.placeholders.what_are_you_working_on')).'']); ?>
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
                <div>
                    <input type="hidden" name="status" value="3"/>
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'submit','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'submit','contentRole' => 'primary']); ?><?php echo e(__('buttons.save')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'jQuery(\'#subtask-form-'.e($ticket['id']).'\').toggle();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'jQuery(\'#subtask-form-'.e($ticket['id']).'\').toggle();']); ?><?php echo e(__('buttons.cancel')); ?> <?php echo $__env->renderComponent(); ?>
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
    <!-- End Subtask Form -->

    <div id="accordion_content-<?php echo e($accordionId); ?>"
         style="<?php echo e($accordionState =='closed' ? 'display:none;' : ''); ?>"
         class="sortable-list task-children <?php echo e($tpl->getToggleState("user.".session('userdata.id').".taskCollapsed.".$ticket['id'], 'open')); ?>"
         data-container-type="<?php echo e($ticket['type'] == 'milestone' ? 'milestone' : ($ticket['type'] == 'subtask' ? 'subtask' : 'task')); ?>">

        <?php $__currentLoopData = ($ticket['children'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('widgets::partials.todoItem', ['ticket' => $childTicket, 'statusLabels' => $statusLabels, 'onTheClock' => $onTheClock, 'tpl' => $tpl, 'level' => $level + 1, 'groupKey' => $groupKey], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($level == 0 && $ticket['type'] === "milestone"): ?>

            <!-- Subtask Form -->
            <div id="task-add-form-<?php echo e($groupKey); ?>-<?php echo e($ticket['id']); ?>" class="subtask-form ticketBox"
                 style="display:none; margin:5px 0px;">
                <form class="form-group"
                      id="task-add-form-<?php echo e($groupKey); ?>-<?php echo e($ticket['id']); ?>-form"
                      hx-post="<?php echo e(BASE_URL); ?>/widgets/myToDos/addTodo"
                      hx-target="#yourToDoContainer"
                      hx-swap="outerHTML"
                      hx-indicator=".htmx-indicator-ticket-<?php echo e($ticket['id']); ?>"
                      onsubmit="jQuery(this).find('.main-title-input').attr('readonly', true);"
                >
                    <input type="hidden" name="milestone"
                           value="<?php echo e($ticket['type'] == "milestone" ? $ticket['id'] : ''); ?>"/>
                    <input type="hidden" name="status" value="3"/>
                    <input type="hidden" name="quickadd" value="true"/>
                    <input type="hidden" name="sortIndex"
                           value="<?php echo e(isset($ticket['children']) ? ((collect($ticket['children'])->last()['sortIndex'] ?? 10)+5) : 10); ?>"/>
                    <input type="hidden" name="projectId" value="<?php echo e($ticket['projectId']); ?>"/>
                    <input type="hidden" name="priority"
                           value="<?php echo e($groupBy === "priority" ? $groupKey : ''); ?>"/>
                    <input type="hidden" name="dateToFinish"
                           <?php if($groupKey === 'thisWeek'): ?>
                               value="<?php echo e(dtHelper()->userNow()->next('Friday')->formatDateForUser()); ?>"
                           <?php elseif($groupKey === 'overdue'): ?>
                               value="<?php echo e(dtHelper()->userNow()->yesterday()->formatDateForUser()); ?>"
                           <?php else: ?>
                               value=""
                        <?php endif; ?>
                    />
                    <div class="tw-flex tw-flex-row tw-gap-2">
                        <div class="tw-flex-grow">
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'headline','variant' => 'headline','style' => 'font-size:var(--base-font-size)','placeholder' => ''.e(__('input.placeholders.what_are_you_working_on')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'headline','variant' => 'headline','style' => 'font-size:var(--base-font-size)','placeholder' => ''.e(__('input.placeholders.what_are_you_working_on')).'']); ?>
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
                        <div>
                            <input type="hidden" name="status" value="3"/>
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'submit','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'submit','contentRole' => 'primary']); ?><?php echo e(__('buttons.save')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'jQuery(\'#task-add-form-'.e($groupKey).'-'.e($ticket['id']).'\').toggle(); jQuery(\'#task-add-form-'.e($groupKey).'-'.e($ticket['id']).'-handler\').toggle();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'jQuery(\'#task-add-form-'.e($groupKey).'-'.e($ticket['id']).'\').toggle(); jQuery(\'#task-add-form-'.e($groupKey).'-'.e($ticket['id']).'-handler\').toggle();']); ?><?php echo e(__('buttons.cancel')); ?> <?php echo $__env->renderComponent(); ?>
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
            <!-- End Subtask Form -->

            <a href="javascript:void(0);" id="task-add-form-<?php echo e($groupKey); ?>-<?php echo e($ticket['id']); ?>-handler"
               onclick="jQuery(this).toggle(); jQuery('#task-add-form-<?php echo e($groupKey); ?>-<?php echo e($ticket['id']); ?>').toggle(); "><i
                    class="fa fa-plus-circle"></i> <?php echo e(__('links.add_task')); ?></a>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Widgets/Templates/partials/todoItem.blade.php ENDPATH**/ ?>