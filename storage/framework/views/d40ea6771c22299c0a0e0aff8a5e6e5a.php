<?php $__env->startSection('content'); ?>

<?php
    $allTicketGroups = $allTickets;
    $todoTypeIcons = $ticketTypeIcons;
    $statusLabels = $allTicketStates;
    $newField = $newField ?? [];
    $numberofColumns = count($allTicketStates) - 1;
    $size = floor(100 / $numberofColumns);
?>

<?php echo $tpl->displayNotification(); ?>


<?php echo $__env->make('tickets::submodules.ticketHeader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="maincontent">

    <?php echo $__env->make('tickets::submodules.ticketBoardTabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="maincontentinner">

        
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <?php $tpl->dispatchTplEvent('filters.afterRighthandSectionOpen'); ?>
                    <div id="tableButtons" style="display:inline-block"></div>
                    <?php $tpl->dispatchTplEvent('filters.beforeRighthandSectionClose'); ?>
                </div>
            </div>

        </div>

        <div class="clearfix" style="margin-bottom: 20px;"></div>

        <?php if(isset($availableProjects)): ?>
            
            <form action="" method="post" class="tw-mb-m" style="display:flex; gap:10px; align-items:flex-start; flex-wrap:wrap;">
                <input type="text" name="headline" placeholder="<?php echo e(__('input.placeholders.create_task')); ?>" style="flex:1 1 280px; min-width:240px;" />
                <select name="quickaddProjectId" class="form-control" required style="width:auto;" aria-label="<?php echo e(__('label.project')); ?>">
                    <option value=""><?php echo e(__('label.project')); ?>…</option>
                    <?php $__currentLoopData = $availableProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quickAddProjectId => $quickAddProjectName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($quickAddProjectId); ?>"><?php echo e($tpl->escape($quickAddProjectName)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="hidden" name="sprint" value="<?php echo e($currentSprint); ?>" />
                <input type="hidden" name="milestone" value="<?php echo e(htmlspecialchars((string) ($searchCriteria['milestone'] ?? ''), ENT_QUOTES, 'UTF-8')); ?>" />
                <input type="hidden" name="quickadd" value="1" />
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'saveTicket']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'saveTicket']); ?>
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
        <?php endif; ?>

        <?php if(isset($allTicketGroups['all'])): ?>
            <?php $allTickets = $allTicketGroups['all']['items']; ?>
        <?php endif; ?>

        <?php $__currentLoopData = $allTicketGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($group['label'] != 'all'): ?>
                <h5 class="accordionTitle <?php echo e($group['class']); ?>" <?php if(!empty($group['color'])): ?> style="color:<?php echo e(htmlspecialchars($group['color'])); ?>" <?php endif; ?> id="accordion_link_<?php echo e($group['id']); ?>">
                    <a href="javascript:void(0)" class="accordion-toggle" id="accordion_toggle_<?php echo e($group['id']); ?>" onclick="leantime.snippets.accordionToggle('<?php echo e($group['id']); ?>');">
                        <i class="fa fa-angle-down"></i><?php echo $group['label']; ?>(<?php echo e(count($group['items'])); ?>)
                    </a><br />
                    <small style="padding-left:20px; color:var(--primary-font-color); font-size:var(--font-size-s);"><?php echo e($group['more-info']); ?></small>
                </h5>

                <div class="simpleAccordionContainer" id="accordion_content-<?php echo e($group['id']); ?>">
            <?php endif; ?>

                <?php $allTickets = $group['items']; ?>

                <?php $tpl->dispatchTplEvent('allTicketsTable.before', ['tickets' => $allTicketGroups]); ?>
                <table class="table table-bordered display ticketTable " style="width:100%">
                <colgroup>
                    <col class="con1">
                    <col class="con0" style="max-width:200px;">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                </colgroup>
                <?php $tpl->dispatchTplEvent('allTicketsTable.beforeHead', ['tickets' => $allTickets]); ?>
                <thead>
                    <?php $tpl->dispatchTplEvent('allTicketsTable.beforeHeadRow', ['tickets' => $allTickets]); ?>
                    <tr>
                        <th class="id-col"><?php echo __('label.id'); ?></th>
                        <th style="max-width: 350px;"><?php echo __('label.title'); ?></th>
                        <th class="status-col"><?php echo __('label.todo_status'); ?></th>
                        <th class="milestone-col"><?php echo __('label.milestone'); ?></th>
                        <th class="effort-col"><?php echo __('label.effort'); ?></th>
                        <th class="priority-col"><?php echo __('label.priority'); ?></th>
                        <th class="user-col"><?php echo __('label.editor'); ?>.</th>
                        <th class="sprint-col"><?php echo __('label.sprint'); ?></th>
                        <th class="tags-col"><?php echo __('label.tags'); ?></th>
                        <th class="duedate-col"><?php echo __('label.due_date'); ?></th>
                        <th class="planned-hours-col"><?php echo __('label.planned_hours'); ?></th>
                        <th class="remaining-hours-col"><?php echo __('label.estimated_hours_remaining'); ?></th>
                        <th class="booked-hours-col"><?php echo __('label.booked_hours'); ?></th>
                        <th class="no-sort"></th>
                    </tr>
                    <?php $tpl->dispatchTplEvent('allTicketsTable.afterHeadRow', ['tickets' => $allTickets]); ?>
                </thead>
                <?php $tpl->dispatchTplEvent('allTicketsTable.afterHead', ['tickets' => $allTickets]); ?>
                <tbody>
                    <?php $tpl->dispatchTplEvent('allTicketsTable.beforeFirstRow', ['tickets' => $allTickets]); ?>
                    <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowNum => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="height:1px;">
                            <?php $tpl->dispatchTplEvent('allTicketsTable.afterRowStart', ['rowNum' => $rowNum, 'tickets' => $allTickets]); ?>
                            <td data-order="<?php echo e($row['id']); ?>">
                                #<?php echo e($row['id']); ?>

                            </td>

                        <td data-order="<?php echo e($row['headline']); ?>">
                            <?php if($row['dependingTicketId'] > 0): ?>
                                <small><a href="#/tickets/showTicket/<?php echo e($row['dependingTicketId']); ?>" preload="mouseover"><?php echo e($row['parentHeadline']); ?></a></small> //<br />
                            <?php endif; ?>
                            <a class='ticketModal' href="#/tickets/showTicket/<?php echo e($row['id']); ?>" preload="mouseover"><?php echo e($row['headline']); ?></a></td>

                            <?php
                            // On a program (cross-project) board each row must render and edit
                            // with statuses from ITS OWN project, never a shared set, so a status
                            // change always writes a key valid in that project.
                            $rowStatusLabels = (isset($statusLabelsByProject) && isset($statusLabelsByProject[$row['projectId']]))
                                ? $statusLabelsByProject[$row['projectId']]
                                : $statusLabels;

                            if (isset($rowStatusLabels[$row['status']])) {
                                $class = $rowStatusLabels[$row['status']]['class'];
                                $name = $rowStatusLabels[$row['status']]['name'];
                                $sortKey = $rowStatusLabels[$row['status']]['sortKey'];
                            } else {
                                $class = 'label-important';
                                $name = 'new';
                                $sortKey = 0;
                            }
                            ?>
                            <td data-order="<?php echo e($name); ?>">
                                <div class="dropdown ticketDropdown statusDropdown colorized show ">
                                    <a class="dropdown-toggle status <?php echo e($class); ?>  f-left" href="javascript:void(0);" role="button" id="statusDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text"><?php echo e($name); ?></span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="statusDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_status'); ?></li>
                                        <?php
                                        foreach ($rowStatusLabels as $key => $label) {
                                            echo "<li class='dropdown-item'>
                                                <a href='javascript:void(0);' class='".$label['class']."' data-label='".$tpl->escape($label['name'])."' data-value='".$row['id'].'_'.$key.'_'.$label['class']."' id='ticketStatusChange".$row['id'].$key."' >".$tpl->escape($label['name']).'</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>

                            <?php
                            if ($row['milestoneid'] != '' && $row['milestoneid'] != 0) {
                                $milestoneHeadline = $tpl->escape($row['milestoneHeadline']);
                            } else {
                                $milestoneHeadline = __('label.no_milestone');
                            }
                            ?>

                            <td data-order="<?php echo e($milestoneHeadline); ?>">
                                <div class="dropdown ticketDropdown milestoneDropdown colorized show">
                                    <a style="background-color:<?php echo e($tpl->escape($row['milestoneColor'])); ?>" class="dropdown-toggle label-default milestone  f-left" href="javascript:void(0);" role="button" id="milestoneDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text"><?php echo e($milestoneHeadline); ?></span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="milestoneDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_milestone'); ?></li>
                                        <li class='dropdown-item'><a style='background-color:#b0b0b0' href='javascript:void(0);' data-label="<?php echo __('label.no_milestone'); ?>" data-value='<?php echo e($row['id'].'_0_#b0b0b0'); ?>'> <?php echo __('label.no_milestone'); ?> </a></li>

                                        <?php
                                        foreach ($milestones as $milestone) {
                                            echo "<li class='dropdown-item'>
                                                <a href='javascript:void(0);' data-label='".$tpl->escape($milestone->headline)."' data-value='".$row['id'].'_'.$milestone->id.'_'.$tpl->escape($milestone->tags)."' id='ticketMilestoneChange".$row['id'].$milestone->id."' style='background-color:".$tpl->escape($milestone->tags)."'>".$tpl->escape($milestone->headline).'</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>
                            <td  data-order="<?php echo e($row['storypoints'] ? $efforts[''.$row['storypoints'].''] ?? '?' : __('label.story_points_unkown')); ?>">
                                <div class="dropdown ticketDropdown effortDropdown show">
                                    <a class="dropdown-toggle label-default effort  f-left" href="javascript:void(0);" role="button" id="effortDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text"><?php if($row['storypoints'] != '' && $row['storypoints'] > 0): ?><?php echo e($efforts[''.$row['storypoints']] ?? $row['storypoints']); ?><?php else: ?><?php echo __('label.story_points_unkown'); ?><?php endif; ?></span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="effortDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.how_big_todo'); ?></li>
                                        <?php
                                        foreach ($efforts as $effortKey => $effortValue) {
                                            echo "<li class='dropdown-item'>
                                                                            <a href='javascript:void(0);' data-value='".$row['id'].'_'.$effortKey."' id='ticketEffortChange".$row['id'].$effortKey."'>".$effortValue.'</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>

                            <td  data-order="<?php if ($row['priority'] != '' && $row['priority'] > 0) { echo $priorities[$row['priority']] ?? __('label.priority_unkown'); } else { echo __('label.priority_unkown'); } ?>">
                                <div class="dropdown ticketDropdown priorityDropdown show">
                                    <a class="dropdown-toggle label-default priority priority-bg-<?php echo e($row['priority']); ?>  f-left" href="javascript:void(0);" role="button" id="priorityDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text"><?php if ($row['priority'] != '' && $row['priority'] > 0) { echo $priorities[$row['priority']] ?? __('label.priority_unkown'); } else { echo __('label.priority_unkown'); } ?></span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="priorityDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.select_priority'); ?></li>
                                        <?php
                                        foreach ($priorities as $priorityKey => $priorityValue) {
                                            echo "<li class='dropdown-item'>
                                                 <a href='javascript:void(0);' class='priority-bg-".$priorityKey."' data-value='".$row['id'].'_'.$priorityKey."' id='ticketPriorityChange".$row['id'].$priorityKey."'>".$priorityValue.'</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>
                            <td data-order="<?php echo e($row['editorFirstname'] != '' ? $tpl->escape($row['editorFirstname']) : __('dropdown.not_assigned')); ?>">
                                <div class="dropdown ticketDropdown userDropdown noBg show f-left">
                                    <a class="dropdown-toggle" href="javascript:void(0);" role="button" id="userDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text" style="display:inline-flex; align-items:center; gap:6px;">
                                                                    <?php
                                                                    if ($row['editorFirstname'] != '') {
                                                                        echo "<span id='userImage".$row['id']."'><img src='".BASE_URL.'/api/users?profileImage='.$row['editorId']."' width='25' style='vertical-align: middle; margin-right:5px;'/></span><span id='user".$row['id']."'>".$tpl->escape($row['editorFirstname']).'</span>';
                                                                    } else {
                                                                        echo "<span id='userImage".$row['id']."'><img src='".BASE_URL."/api/users?profileImage=false' width='25' style='vertical-align: middle; margin-right:5px;'/></span><span id='user".$row['id']."'>".__('dropdown.not_assigned').'</span>';
                                                                    }

                                                                    if (! empty($row['collaboratorPreview'])) {
                                                                        echo "<span class='ticket-collaborators' style='display:inline-flex; align-items:center; margin-left:4px;'>";
                                                                        foreach ($row['collaboratorPreview'] as $index => $collaboratorId) {
                                                                            $offset = $index > 0 ? 'margin-left:-8px;' : '';
                                                                            echo "<span class='ticket-collaborator-avatar' title='".__('label.collaborators')."' style='display:inline-flex; width:20px; height:20px; border-radius:999px; border:2px solid var(--main-background-color, #fff); overflow:hidden; ".$offset."'><img src='".BASE_URL.'/api/users?profileImage='.$collaboratorId."' width='20' height='20' style='display:block; width:20px; height:20px;'/></span>";
                                                                        }
                                                                        if (($row['collaboratorOverflow'] ?? 0) > 0) {
                                                                            echo "<span class='ticket-collaborator-more' title='".__('label.collaborators')."' style='display:inline-flex; align-items:center; justify-content:center; min-width:20px; height:20px; padding:0 5px; margin-left:4px; border-radius:999px; background:var(--accent-color, #e9ecef); color:var(--secondary-font-color, #333); font-size:11px; line-height:20px;'>+".(int) $row['collaboratorOverflow'].'</span>';
                                                                        }
                                                                        echo '</span>';
                                                                    }
                                                                    ?>
                                                                </span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="userDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_user'); ?></li>
                                        <li class='dropdown-item'>
                                            <a href='javascript:void(0);' data-label='<?php echo __('label.not_assigned_to_user'); ?>' data-value='<?php echo e($row['id'].'_0_0'); ?>' id='userStatusChange<?php echo e($row['id']); ?>0' ><?php echo __('label.not_assigned_to_user'); ?></a>
                                        </li>
                                        <?php
                                        foreach ($users as $user) {
                                            echo "<li class='dropdown-item'>";
                                            echo "<a href='javascript:void(0);' data-label='".sprintf(__('text.full_name'), $tpl->escape($user['firstname']), $tpl->escape($user['lastname']))."' data-value='".$row['id'].'_'.$user['id'].'_'.$user['profileId']."' id='userStatusChange".$row['id'].$user['id']."' ><img src='".BASE_URL.'/api/users?profileImage='.$user['id']."' width='25' style='vertical-align: middle; margin-right:5px;'/>".sprintf(__('text.full_name'), $tpl->escape($user['firstname']), $tpl->escape($user['lastname'])).'</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>
                            <?php
                            if ($row['sprint'] != '' && $row['sprint'] != 0 && $row['sprint'] != -1) {
                                $sprintHeadline = $tpl->escape($row['sprintName']);
                            } else {
                                $sprintHeadline = __('label.not_assigned_to_sprint');
                            }
                            ?>

                            <td  data-order="<?php echo e($sprintHeadline); ?>">

                                <div class="dropdown ticketDropdown sprintDropdown show">
                                    <a class="dropdown-toggle label-default sprint f-left" href="javascript:void(0);" role="button" id="sprintDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text"><?php echo e($sprintHeadline); ?></span>
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="sprintDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_sprint'); ?></li>
                                        <li class='dropdown-item'><a href='javascript:void(0);' data-label="<?php echo __('label.not_assigned_to_sprint'); ?>" data-value='<?php echo e($row['id'].'_0'); ?>'> <?php echo __('label.not_assigned_to_sprint'); ?> </a></li>
                                        <?php if($sprints): ?>
                                            <?php $__currentLoopData = $sprints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class='dropdown-item'>
                                                    <a href='javascript:void(0);' data-label='<?php echo e($sprint->name); ?>' data-value='<?php echo e($row['id'].'_'.$sprint->id); ?>' id='ticketSprintChange<?php echo e($row['id']); ?><?php echo e($sprint->id); ?>' ><?php echo e($sprint->name); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>

                            <td data-order="<?php echo e($row['tags']); ?>">
                                <?php if($row['tags'] != ''): ?>
                                    <?php $tagsArray = explode(',', $row['tags']); ?>
                                    <div class='tagsinput readonly'>
                                        <?php $__currentLoopData = $tagsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class='tag'><span><?php echo e($tag); ?></span></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </td>

                            <?php
                            if ($row['dateToFinish'] == '0000-00-00 00:00:00' || $row['dateToFinish'] == '1969-12-31 00:00:00') {
                                $date = __('text.anytime');
                            } else {
                                $date = new DateTime($row['dateToFinish']);
                                $date = $date->format(__('language.dateformat'));
                            }
                            ?>
                            <td data-order="<?php echo e($row['dateToFinish']); ?>" >
                                <input type="text" title="<?php echo e(__('label.due')); ?>" value="<?php echo e($date); ?>" class="quickDueDates secretInput" data-id="<?php echo e($row['id']); ?>" name="date" />
                            </td>
                            <td data-order="<?php echo e($row['planHours']); ?>">
                                <input type="text" value="<?php echo e($row['planHours']); ?>" name="planHours" class="small-input secretInput" onchange="leantime.ticketsController.updatePlannedHours(this, '<?php echo e($row['id']); ?>'); jQuery(this).parent().attr('data-order',jQuery(this).val());" />
                            </td>
                            <td data-order="<?php echo e($row['hourRemaining']); ?>">
                                <input type="text" value="<?php echo e($row['hourRemaining']); ?>" name="remainingHours" class="small-input secretInput" onchange="leantime.ticketsController.updateRemainingHours(this, '<?php echo e($row['id']); ?>');" />
                            </td>

                            <td data-order="<?php echo e(($row['bookedHours'] === null || $row['bookedHours'] == '') ? '0' : $row['bookedHours']); ?>">
                                <?php echo e(($row['bookedHours'] === null || $row['bookedHours'] == '') ? '0' : $row['bookedHours']); ?>

                            </td>
                            <td>
                                <?php echo $__env->make('tickets::partials.ticketsubmenu', ['ticket' => $row, 'onTheClock' => $onTheClock], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </td>
                            <?php $tpl->dispatchTplEvent('allTicketsTable.beforeRowEnd', ['tickets' => $allTickets, 'rowNum' => $rowNum]); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $tpl->dispatchTplEvent('allTicketsTable.afterLastRow', ['tickets' => $allTickets]); ?>
                </tbody>
                <?php $tpl->dispatchTplEvent('allTicketsTable.afterBody', ['tickets' => $allTickets]); ?>
                    <tfoot align="right">
                        <tr><td colspan="9"></td><td></td><td></td><td></td><td></td><td></td></tr>
                    </tfoot>

                </table>
                <?php $tpl->dispatchTplEvent('allTicketsTable.afterClose', ['tickets' => $allTickets]); ?>

            <?php if($group['label'] != 'all'): ?>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




    </div>
</div>

<?php if (! $__env->hasRenderedOnce('c3027a31-9061-44d6-8943-ee16c75251db')): $__env->markAsRenderedOnce('c3027a31-9061-44d6-8943-ee16c75251db'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    jQuery(document).ready(function() {
        <?php $tpl->dispatchTplEvent('scripts.afterOpen'); ?>


        <?php if($login::userIsAtLeast($roles::$editor)): ?>
            leantime.ticketsController.initDueDateTimePickers();
            leantime.ticketsController.initUserDropdown();
            leantime.ticketsController.initMilestoneDropdown();
            leantime.ticketsController.initEffortDropdown();
            leantime.ticketsController.initPriorityDropdown();
            leantime.ticketsController.initSprintDropdown();
            leantime.ticketsController.initStatusDropdown();

        <?php else: ?>
        leantime.authController.makeInputReadonly(".maincontentinner");
        <?php endif; ?>



        leantime.ticketsController.initTicketsTable("<?php echo e($searchCriteria['groupBy']); ?>");

        <?php $tpl->dispatchTplEvent('scripts.beforeClose'); ?>

    });

</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/showAll.blade.php ENDPATH**/ ?>