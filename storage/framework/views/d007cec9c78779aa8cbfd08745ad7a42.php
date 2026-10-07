
<ul class="sortableTicketList" style="margin-bottom:120px;">
    <li class="">
        <a href="javascript:void(0);" class="quickAddLink" id="subticket_new_link" onclick="jQuery('#subticket_new').toggle('fast', function() {jQuery(this).find('input[name=headline]').focus();}); jQuery(this).toggle('fast');"><i class="fas fa-plus-circle"></i> <?php echo e(__("links.add_task")); ?></a>
        <div class="ticketBox hideOnLoad" id="subticket_new" >

            <form method="post" class="form-group"
                  hx-post="<?php echo e(BASE_URL); ?>/tickets/subtasks/save?ticketId=<?php echo e($ticket->id); ?>"
                hx-indicator=".htmx-indicator-small"
                hx-target="#ticketSubtasks">
                <input type="hidden" value="new" name="subtaskId" />
                <input type="hidden" value="1" name="subtaskSave" />
                <input name="headline" type="text" title="<?php echo e(__("label.headline")); ?>" style="width:100%" placeholder="<?php echo e(__("input.placeholders.what_are_you_working_on")); ?>" />
                <input type="submit" value="<?php echo e(__("buttons.save")); ?>" name="quickadd"  />
                <div class="htmx-indicator-small">
                    <?php if (isset($component)) { $__componentOriginal67b3362d3ad76506ff5c626421fd5524 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67b3362d3ad76506ff5c626421fd5524 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.loader','data' => ['id' => 'loadingthis','size' => '25px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loadingthis','size' => '25px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67b3362d3ad76506ff5c626421fd5524)): ?>
<?php $attributes = $__attributesOriginal67b3362d3ad76506ff5c626421fd5524; ?>
<?php unset($__attributesOriginal67b3362d3ad76506ff5c626421fd5524); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67b3362d3ad76506ff5c626421fd5524)): ?>
<?php $component = $__componentOriginal67b3362d3ad76506ff5c626421fd5524; ?>
<?php unset($__componentOriginal67b3362d3ad76506ff5c626421fd5524); ?>
<?php endif; ?>
                </div>
                <input type="hidden" name="dateToFinish" id="dateToFinish" value="" />
                <input type="hidden" name="status" value="3" />
                <input type="hidden" name="sprint" value="<?php echo e(session("currentSprint")); ?>" />
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'jQuery(\'#subticket_new\').toggle(\'fast\'); jQuery(\'#subticket_new_link\').toggle(\'fast\');','contentRole' => 'tertiary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'jQuery(\'#subticket_new\').toggle(\'fast\'); jQuery(\'#subticket_new_link\').toggle(\'fast\');','contentRole' => 'tertiary']); ?>
                    <?php echo e(__("links.cancel")); ?>

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
            </form>

            <div class="clearfix"></div>
        </div>
    </li>


    <?php

        $sumPlanHours = 0;
        $sumEstHours = 0;

    ?>


    <?php $__currentLoopData = $ticketSubtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
            $sumPlanHours = $sumPlanHours + $subticket['planHours'];
            $sumEstHours = $sumEstHours + $subticket['hourRemaining'];

            if ($subticket['dateToFinish'] == "0000-00-00 00:00:00" || $subticket['dateToFinish'] == "1969-12-31 00:00:00") {
                $date = $tpl->__("text.anytime");
            } else {
                $date = format($subticket['dateToFinish'])->date();
            }

        ?>

    <li class="ui-state-default" id="ticket_<?php echo e($subticket['id']); ?>" >
        <div class="ticketBox fixed priority-border-<?php echo e($subticket['priority']); ?>" data-val="<?php echo e($subticket['id']); ?>" >

            <div class="row">
                <div class="col-md-12" style="padding:0 15px;">
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                        <div class="inlineDropDownContainer" >
                            <a href="javascript:void(0)" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0);" hx-delete="<?php echo e(BASE_URL); ?>/tickets/subtasks/delete?ticketId=<?php echo e($subticket["id"]); ?>&parentTicket=<?php echo e($ticket->id); ?>" hx-target="#ticketSubtasks" class="delete"><i class="fa fa-trash"></i> <?php echo e(__("links.delete_todo")); ?></a></li>
                            </ul>
                        </div>
                   <?php endif; ?>

                    <a href="#/tickets/showTicket/<?php echo e($subticket['id']); ?>"><?php echo e($subticket['headline']); ?></a>

                </div>
            </div>
            <div class="row">
                <div class="col-md-9" style="padding:0 15px;">
                    <div class="row">
                        <div class="col-md-4">
                                <?php echo e(__("label.due")); ?><input type="text" title="<?php echo e(__("label.due")); ?>" value="<?php echo e($date); ?>" class="duedates secretInput quickDueDates" data-id="<?php echo e($subticket['id']); ?>" name="date" />
                        </div>
                        <div class="col-md-4">
                                <?php echo e(__("label.planned_hours")); ?><input type="text" value="<?php echo e($subticket['planHours']); ?>" name="planHours" data-label="planHours-<?php echo e($subticket['id']); ?>" class="small-input secretInput asyncInputUpdate" style="width:40px"/>
                        </div>
                        <div class="col-md-4">
                                <?php echo e(__("label.estimated_hours_remaining")); ?><input type="text" value="<?php echo e($subticket['hourRemaining']); ?>" name="hourRemaining" data-label="hourRemaining-<?php echo e($subticket['id']); ?>" class="small-input secretInput asyncInputUpdate" style="width:40px"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="padding-top:3px;" >
                    <div class="right">
                        <div class="dropdown ticketDropdown effortDropdown show">
                            <a class="dropdown-toggle f-left  label-default effort" href="javascript:void(0);" role="button" id="effortDropdownMenuLink<?php echo e($subticket['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text"><?php if($subticket['storypoints'] != '' && $subticket['storypoints'] > 0 && isset($efforts[$subticket['storypoints']])): ?>
                                                                                        <?php echo e($efforts[$subticket['storypoints']]); ?>

                                                                                   <?php else: ?>
                                                                                           <?php echo e(__("label.story_points_unkown")); ?>

                                                                                    <?php endif; ?>
                                                                </span>
                                &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="effortDropdownMenuLink<?php echo e($subticket['id']); ?>">
                                <li class="nav-header border"><?php echo e(__("dropdown.how_big_todo")); ?></li>
                                <?php $__currentLoopData = $efforts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $effortKey => $effortValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class='dropdown-item'>
                                        <a href='javascript:void(0);' data-value='<?php echo e($subticket['id']); ?>_<?php echo e($effortKey); ?>' id='ticketEffortChange<?php echo e($subticket['id'] . $effortKey); ?>'> <?php echo e($effortValue); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                            <?php
                                if (isset($statusLabels[$subticket['status']])) {
                                    $class = $statusLabels[$subticket['status']]["class"];
                                    $name = $statusLabels[$subticket['status']]["name"];
                                } else {
                                    $class = 'label-important';
                                    $name = 'new';
                                }
                             ?>
                        <div class="dropdown ticketDropdown statusDropdown colorized show">
                            <a class="dropdown-toggle f-left status <?php echo e($class); ?>" href="javascript:void(0);" role="button" id="statusDropdownMenuLink<?php echo e($subticket['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text"><?php echo e($name); ?>

                                                                </span>
                                &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="statusDropdownMenuLink<?php echo e($subticket['id']); ?>">
                                <li class="nav-header border"><?php echo e(__('dropdown.choose_status')); ?></li>

                                    <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class='dropdown-item'>
                                            <a href='javascript:void(0);' class='<?php echo e($label["class"]); ?>' data-label='<?php echo e($label["name"]); ?>' data-value='<?php echo e($subticket['id']); ?>_<?php echo e($key); ?>_<?php echo e($label["class"]); ?>' id='ticketStatusChange<?php echo e($subticket['id'] . $key); ?>' ><?php echo e($label["name"]); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<script>
    jQuery(document).ready(function(){
        <?php if ($login::userIsAtLeast($roles::$editor)) { ?>

            leantime.ticketsController.initAsyncInputChange();
            leantime.ticketsController.initDueDateTimePickers();

            leantime.ticketsController.initEffortDropdown();
            leantime.ticketsController.initStatusDropdown();

        <?php } else { ?>

            leantime.authController.makeInputReadonly(".nyroModalCont");

        <?php } ?>

    });

</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/partials/subtasks.blade.php ENDPATH**/ ?>