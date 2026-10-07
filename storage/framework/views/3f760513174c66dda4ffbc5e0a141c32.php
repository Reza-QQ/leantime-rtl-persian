<input type="hidden" value="<?php echo e($ticket->id); ?>" name="id" autocomplete="off" readonly/>

<div class="row">
    <div class="col-md-9">
        <div class="row marginBottom">
            <div class="col-md-12">

                <div class="form-group">
                    <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['value' => ''.e($ticket->headline).'','name' => 'headline','variant' => 'headline','autocomplete' => 'off','style' => 'width:99%; margin-bottom:10px;','placeholder' => ''.e(__('input.placeholders.enter_title_of_todo')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => ''.e($ticket->headline).'','name' => 'headline','variant' => 'headline','autocomplete' => 'off','style' => 'width:99%; margin-bottom:10px;','placeholder' => ''.e(__('input.placeholders.enter_title_of_todo')).'']); ?>
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
                <!-- Status -->
                <div class="form-group tw-flex tw-w-3/5">
                    <label class="control-label tw-mx-m tw-w-[100px]"><?php echo __('label.todo_status'); ?></label>
                    <div class="">
                        <select
                            id="status-select"
                            class=""
                            name="status"
                            data-placeholder="<?php echo e(isset($ticket->status) ? $statusLabels[$ticket->status]['name'] ?? '' : ''); ?>"
                        >
                            <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"
                                    <?php if($ticket->status == $key): ?> selected='selected' <?php endif; ?>
                                ><?php echo e($label['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <!-- Priority -->
                <div class="form-group tw-flex tw-w-3/5">
                    <label class="control-label tw-mx-m tw-w-[100px]"><?php echo __('label.priority'); ?></label>
                    <div class="">
                        <select id='priority' name='priority' class="">
                            <option value=""><?php echo __('label.priority_not_defined'); ?></option>
                            <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priorityKey => $priorityValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($priorityKey); ?>"
                                    <?php if($priorityKey == $ticket->priority): ?> selected='selected' <?php endif; ?>
                                ><?php echo e($priorityValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <!-- Effort -->
                <div class="form-group tw-flex tw-w-3/5">
                    <label class="control-label tw-mx-m tw-w-[100px]"><?php echo __('label.effort'); ?></label>
                    <div class="">
                        <select id='storypoints' name='storypoints' class="">
                            <option value=""><?php echo __('label.effort_not_defined'); ?></option>
                            <?php $__currentLoopData = $efforts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $effortKey => $effortValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($effortKey); ?>"
                                    <?php if($effortKey == $ticket->storypoints): ?> selected='selected' <?php endif; ?>
                                ><?php echo e($effortValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <!-- Editor -->
                <div class="form-group tw-flex tw-w-3/5">
                    <label class="control-label tw-mx-m tw-w-[100px]"><?php echo __('label.editor'); ?></label>
                    <div class="">

                        <select data-placeholder="<?php echo e(__('label.filter_by_user')); ?>" style="width:175px;"
                                name="editorId" id="editorId" class="user-select tw-mr-sm">
                            <option value=""><?php echo __('label.not_assigned_to_user'); ?></option>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($userRow['id']); ?>"
                                    <?php if($ticket->editorId == $userRow['id']): ?> selected='selected' <?php endif; ?>
                                ><?php echo e($userRow['firstname'] . ' ' . $userRow['lastname']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>&nbsp;
                    </div>
                    <div style="padding-top:6px;">
                        <?php if($login::userIsAtLeast($roles::$editor)): ?>
                           <a href="javascript:void(0);" onclick="jQuery('#editorId').val(<?php echo e(session('userdata.id')); ?>).trigger('chosen:updated');"><?php echo __('label.assign_to_me'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Collaborators -->
                <div class="form-group tw-flex tw-w-3/5">
                    <label class="control-label tw-mx-m tw-w-[100px]"><?php echo __('label.collaborators'); ?></label>
                    <div class="">
                        <select data-placeholder="<?php echo e(__('label.filter_by_user')); ?>"
                                style="width:175px;"
                                name="collaborators[]"
                                id="collaborators"
                                class="user-select tw-mr-sm"
                                multiple>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($userRow['id']); ?>"
                                    <?php if(in_array($userRow['id'], $ticket->collaborators ?? [])): ?> selected='selected' <?php endif; ?>
                                >
                                    <?php echo e($userRow['firstname'] . ' ' . $userRow['lastname']); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <!-- Due Date -->
                <div class="form-group tw-flex tw-w-3/5">
                    <label class="control-label tw-mx-m tw-w-[100px]"><?php echo __('label.due_date'); ?></label>
                    <div class="">
                        <input type="text" class="dates" style="width:110px;" id="deadline" autocomplete="off"
                               value="<?php echo e(format($ticket->dateToFinish)->date()); ?>"
                               name="dateToFinish" placeholder="<?php echo e(__('language.dateformat')); ?>"/>

                        <input type="time" class="timepicker tw-mr-sm" style="width:120px;" id="dueTime" autocomplete="off"
                               value="<?php echo e(format($ticket->dateToFinish)->time24()); ?>"
                               name="timeToFinish"/>
                    </div>
                    <div style="padding-top:6px;">
                        <?php $tpl->dispatchTplEvent('afterDates', ['ticket' => $ticket]); ?>
                    </div>
                </div>

                <div class="form-group tw-flex tw-w-3/5">
                    <label class="control-label tw-mx-m tw-w-[100px]"><?php echo __('label.tags'); ?></label>
                    <div class="">
                        <input type="text" value="<?php echo e($ticket->tags); ?>" name="tags" id="tags" />
                    </div>
                </div>
                <br />

                <div class="form-group" id="descriptionEditor">
                    <textarea name="description" id="ticketDescription"
                              class="tiptapComplex"><?php echo $ticket->description !== null ? htmlentities($ticket->description) : ''; ?></textarea><br/>
                </div>
                <input type="hidden" name="acceptanceCriteria" value=""/>

            </div>
        </div>

        <div class="sticky-modal-footer">
            <div class="row">
                <div class="col-md-12" style="margin-top:15px;">
                    <input type="hidden" name="saveTicket" value="1" />
                    <input type="hidden" id="saveAndCloseButton" name="saveAndCloseTicket" value="0" />

                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'saveTicket','class' => 'saveTicketBtn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'saveTicket','class' => 'saveTicketBtn']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','variant' => 'outline','name' => 'saveAndCloseTicket','onclick' => 'jQuery(\'#saveAndCloseButton\').val(\'1\');','labelText' => __('buttons.save_and_close')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','variant' => 'outline','name' => 'saveAndCloseTicket','onclick' => 'jQuery(\'#saveAndCloseButton\').val(\'1\');','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save_and_close'))]); ?>
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

        <?php if($ticket->id): ?>
            <br />
            <hr />
            <?php $tpl->dispatchTplEvent('beforeSubtasks', ['ticketId' => $ticket->id]); ?>
            <h4 class="widgettitle title-light"><i class="fa-solid fa-sitemap"></i> <?php echo __('subtitles.subtasks'); ?></h4>

            <?php if (isset($component)) { $__componentOriginal1b26571f6dd0a57446a927b1ecd01186 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b26571f6dd0a57446a927b1ecd01186 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.hx','data' => ['wrapperId' => 'ticketSubtasks','for' => \Leantime\Domain\Tickets\Hxcontrollers\Subtasks::class,'id' => $ticket->id,'trigger' => 'load','indicator' => '.subtaskIndicator']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::hx'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wrapperId' => 'ticketSubtasks','for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Leantime\Domain\Tickets\Hxcontrollers\Subtasks::class),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->id),'trigger' => 'load','indicator' => '.subtaskIndicator']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b26571f6dd0a57446a927b1ecd01186)): ?>
<?php $attributes = $__attributesOriginal1b26571f6dd0a57446a927b1ecd01186; ?>
<?php unset($__attributesOriginal1b26571f6dd0a57446a927b1ecd01186); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b26571f6dd0a57446a927b1ecd01186)): ?>
<?php $component = $__componentOriginal1b26571f6dd0a57446a927b1ecd01186; ?>
<?php unset($__componentOriginal1b26571f6dd0a57446a927b1ecd01186); ?>
<?php endif; ?>
            <div class="htmx-indicator subtaskIndicator">
                Loading Subtasks ...<br /><br />
            </div>

        <h4 class="widgettitle title-light"><span
                    class="fa-solid fa-comments"></span><?php echo __('subtitles.discussion'); ?></h4>

        <div class="row-fluid">
        <form method="post" action="<?php echo e(BASE_URL); ?>/tickets/showTicket/<?php echo e($ticket->id); ?>" class="formModal">
            <input type="hidden" name="comment" value="1" />
            <?php echo $__env->make('comments::submodules.generalComment', ['formUrl' => BASE_URL . '/tickets/showTicket/' . $ticket->id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </form>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-3">

        <div class="row marginBottom">
            <div class="col-md-12">
                <h5 class="accordionTitle" id="accordion_link_tickets-organization" style="padding-bottom:15px; font-size:var(--font-size-l)">
                    <a href="javascript:void(0)"
                       class="accordion-toggle"
                       id="accordion_toggle_tickets-organization"
                       onclick="leantime.snippets.accordionToggle('tickets-organization');">
                            <i class="fa fa-angle-down"></i>
                            <span class="fa fa-folder-open"></span>
                            <?php echo __('subtitles.organization'); ?>

                    </a>
                </h5>
                <div class="simpleAccordionContainer" id="accordion_content-tickets-organization" style="padding-left:0">

                    <!-- Type -->
                    <div class="form-group">
                        <label class="control-label"><?php echo __('label.todo_type'); ?></label>
                        <div class="">
                            <select id='type' name='type' class="span11">
                                <?php $__currentLoopData = $ticketTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(strtolower($types)); ?>"
                                        <?php if(strtolower($types) == strtolower($ticket->type ?? '')): ?> selected='selected' <?php endif; ?>
                                    ><?php echo __('label.' . strtolower($types)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select><br/>
                        </div>
                    </div>

                    <!-- Project -->
                    <div class="form-group">
                        <label class="control-label"><?php echo __('label.project'); ?></label>
                        <select name="projectId" class="tw-w-full">
                            <?php $__currentLoopData = $allAssignedprojects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($project['id']); ?>"
                                    <?php if($ticket->projectId == $project['id']): ?>
                                        selected
                                    <?php elseif(session('currentProject') == $project['id']): ?>
                                        selected
                                    <?php endif; ?>
                                ><?php echo e($tpl->escape($project['name'])); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Milestones -->
                    <div class="form-group">
                        <label class="control-label"><?php echo __('label.milestone'); ?></label>
                        <div class="">
                            <div class="form-group">
                                <select  name="milestoneid"  class="span11" >
                                    <option value=""><?php echo __('label.not_assigned_to_milestone'); ?></option>
                                    <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestoneRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($milestoneRow->id); ?>"
                                            <?php if($ticket->milestoneid == $milestoneRow->id): ?> selected='selected' <?php endif; ?>
                                        ><?php echo e($tpl->escape($milestoneRow->headline)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Sprint -->
                    <div class="form-group">
                        <label class="control-label"><?php echo __('label.sprint'); ?></label>
                        <div class="">

                            <select id="sprint-select" class="span11" name="sprint"
                                    data-placeholder="<?php echo e($ticket->sprint); ?>">
                                <option value=""><?php echo __('label.backlog'); ?></option>
                                <?php if($sprints): ?>
                                    <?php $__currentLoopData = $sprints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprintRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sprintRow->id); ?>"
                                            <?php if($ticket->sprint == $sprintRow->id): ?> selected='selected' <?php endif; ?>
                                        ><?php echo e($sprintRow->name); ?><?php if(! empty($sprintRow->isInherited)): ?> — <?php echo e(__('label.program_sprint')); ?> <?php endif; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Related -->
                    <div class="form-group">
                        <label class="control-label"><?php echo __('label.related_to'); ?></label>
                        <div class="">
                            <div class="form-group">
                                <select  name="dependingTicketId"  class="span11" >
                                    <option value=""><?php echo __('label.not_related'); ?></option>
                                    <?php if(is_array($ticketParents)): ?>
                                        <?php $__currentLoopData = $ticketParents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ticketRow->id); ?>"
                                                <?php if($ticket->dependingTicketId == $ticketRow->id): ?> selected='selected' <?php endif; ?>
                                            ><?php echo e($tpl->escape($ticketRow->headline)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="row marginBottom">
            <div class="col-md-12">
                <h5 class="accordionTitle" id="accordion_link_tickets-dates" style="padding-bottom:15px; font-size:var(--font-size-l)">
                    <a href="javascript:void(0)"
                       class="accordion-toggle"
                       id="accordion_toggle_tickets-dates"
                       onclick="leantime.snippets.accordionToggle('tickets-dates');">
                        <i class="fa fa-angle-down"></i>
                        <span class="fa fa-calendar"></span>
                        <?php echo __('subtitles.schedule'); ?>

                    </a>
                </h5>
                <div class="simpleAccordionContainer" id="accordion_content-tickets-dates" style="padding-left:0">
                    <div class="form-group">
                        <label class=" control-label"><?php echo __('label.working_date_from'); ?></label>
                        <div class="">
                            <input type="text" class="editFrom" style="width:100px;" name="editFrom" autocomplete="off"
                                   value="<?php echo e(format($ticket->editFrom)->date()); ?>" placeholder="<?php echo e(__('language.dateformat')); ?>"/>
                            <input type="time" class="timepicker" style="width:120px;" id="timeFrom" autocomplete="off"
                                   value="<?php echo e(format($ticket->editFrom)->time24()); ?>"
                                   name="timeFrom"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label"><?php echo __('label.working_date_to'); ?></label>
                        <div class="">
                            <input type="text" class="editTo" style="width:100px;" name="editTo" autocomplete="off"
                                   value="<?php echo e(format($ticket->editTo)->date()); ?>" placeholder="<?php echo e(__('language.dateformat')); ?>"/>
                            <input type="time" class="timepicker" style="width:120px;" id="timeTo" autocomplete="off"
                                   value="<?php echo e(format($ticket->editTo)->time24()); ?>"
                                   name="timeTo"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label"><?php echo __('label.planned_hours'); ?> / <?php echo __('label.estimated_hours_remaining'); ?></label>
                        <div class="">
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['value' => ''.e($ticket->planHours).'','name' => 'planHours','style' => 'width:45px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => ''.e($ticket->planHours).'','name' => 'planHours','style' => 'width:45px;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>&nbsp;/&nbsp;
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['value' => ''.e($ticket->hourRemaining).'','name' => 'hourRemaining','style' => 'width:45px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => ''.e($ticket->hourRemaining).'','name' => 'hourRemaining','style' => 'width:45px;']); ?>
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
                            <a href="javascript:void(0)" class="infoToolTip" data-placement="left" data-toggle="tooltip" data-tippy-content="<?php echo e(__('tooltip.how_many_hours_remaining')); ?>">
                                &nbsp;<i class="fa fa-question-circle"></i>&nbsp;
                            </a>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <?php $tpl->dispatchTplEvent('beforeEndRightColumn', ['ticket' => $ticket]); ?>
    </div>
</div>

<script>

    jQuery(document).ready(function(){
        //Set accordion states
        //All accordions start open
        if (window.leantime && window.leantime.tiptapController) {
            leantime.tiptapController.initComplexEditor();
        }

        Prism.highlightAll();
    });

</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/submodules/ticketDetails.blade.php ENDPATH**/ ?>