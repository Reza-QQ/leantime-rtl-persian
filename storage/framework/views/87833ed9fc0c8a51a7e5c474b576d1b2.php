<?php $__env->startSection('content'); ?>

<?php
    $allTicketGroups = $allTickets;
    $todoTypeIcons = $ticketTypeIcons;
    $statusLabels = $allTicketStates;
    $numberofColumns = count($allTicketStates) - 1;
    $size = floor(100 / $numberofColumns);
?>

<?php echo $__env->make('tickets::submodules.timelineHeader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="maincontent">

    <?php echo $__env->make('tickets::submodules.timelineTabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        
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

        <?php if(isset($allTicketGroups['all'])): ?>
            <?php $allTickets = $allTicketGroups['all']['items']; ?>
        <?php endif; ?>

        <?php $__currentLoopData = $allTicketGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($group['label'] != 'all'): ?>
        <h5 class="accordionTitle <?php echo e($group['class']); ?>" <?php if(!empty($group['color'])): ?> style="color:<?php echo e(htmlspecialchars($group['color'])); ?>" <?php endif; ?> id="accordion_link_<?php echo e($group['id']); ?>">
            <a href="javascript:void(0)" class="accordion-toggle" id="accordion_toggle_<?php echo e($group['id']); ?>" onclick="leantime.snippets.accordionToggle('<?php echo e($group['id']); ?>');">
                <i class="fa fa-angle-down"></i><?php echo $group['label']; ?> (<?php echo e(count($group['items'])); ?>)
            </a>
        </h5>
        <div class="simpleAccordionContainer" id="accordion_content-<?php echo e($group['id']); ?>">
            <?php endif; ?>

            <?php $allTickets = $group['items']; ?>

            <?php $tpl->dispatchTplEvent('allTicketsTable.before', ['tickets' => $allTickets]); ?>
            <table class="table table-bordered display ticketTable " style="width:100%">
                <colgroup>
                    <col class="con1" >
                    <col class="con0">
                    <col class="con1">
                    <col class="con0" >
                    <col class="con1">
                    <col class="con0">
                    <col class="con1" >
                    <col class="con0" >
                    <col class="con1" >
                    <col class="con0" >
                    <col class="con1" >

                </colgroup>
                <?php $tpl->dispatchTplEvent('allTicketsTable.beforeHead', ['tickets' => $allTickets]); ?>
                <thead>
                <?php $tpl->dispatchTplEvent('allTicketsTable.beforeHeadRow', ['tickets' => $allTickets]); ?>
                <tr>
                    <th><?php echo __('label.title'); ?></th>
                    <th><?php echo __('label.todo_type'); ?></th>
                    <th><?php echo __('label.progress'); ?></th>
                    <th class="milestone-col"><?php echo __('label.dependent_on'); ?></th>
                    <th><?php echo __('label.todo_status'); ?></th>
                    <th class="user-col"><?php echo __('label.owner'); ?></th>
                    <th><?php echo __('label.planned_start_date'); ?></th>
                    <th><?php echo __('label.planned_end_date'); ?></th>
                    <th><?php echo __('label.planned_hours'); ?></th>
                    <th><?php echo __('label.estimated_hours_remaining'); ?></th>
                    <th><?php echo __('label.booked_hours'); ?></th>
                    <th class="no-sort"></th>
                </tr>
                <?php $tpl->dispatchTplEvent('allTicketsTable.afterHeadRow', ['tickets' => $allTickets]); ?>
                </thead>
                <?php $tpl->dispatchTplEvent('allTicketsTable.afterHead', ['tickets' => $allTickets]); ?>
                <tbody>
                    <?php $tpl->dispatchTplEvent('allTicketsTable.beforeFirstRow', ['tickets' => $allTickets]); ?>
                    <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowNum => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php $tpl->dispatchTplEvent('allTicketsTable.afterRowStart', ['rowNum' => $rowNum, 'tickets' => $allTickets]); ?>
                            <td data-order="<?php echo e($row['headline']); ?>">
                                <?php if($row['type'] == 'milestone'): ?>
                                    <a href="#/tickets/editMilestone/<?php echo e($row['id']); ?>"><?php echo e($row['headline']); ?></a>
                                <?php else: ?>
                                    <a href="#/tickets/showTicket/<?php echo e($row['id']); ?>"><?php echo e($row['headline']); ?></a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo __('label.'.strtolower($row['type'])); ?></td>

                            <td>
                                <?php if($row['type'] == 'milestone'): ?>
                                    <div hx-trigger="load"
                                         hx-get="<?php echo e(BASE_URL); ?>/hx/tickets/milestones/progress?milestoneId=<?php echo e($row['id']); ?>&view=Progress">
                                        <div class="htmx-indicator">
                                            <?php echo __('label.calculating_progress'); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
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
                                    <a style="background-color:<?php echo e($tpl->escape($row['milestoneColor'])); ?>" class="dropdown-toggle label-default milestone" href="javascript:void(0);" role="button" id="milestoneDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text"><?php echo e($milestoneHeadline); ?></span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="milestoneDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_milestone'); ?></li>
                                        <li class='dropdown-item'><a style='background-color:#b0b0b0' href='javascript:void(0);' data-label="<?php echo __('label.no_milestone'); ?>" data-value='<?php echo e($row['id'].'_0_#b0b0b0'); ?>'> <?php echo __('label.no_milestone'); ?> </a></li>
                                        <?php
                                        foreach ($milestones as $milestone) {
                                            if ($milestone->id != $row['id']) {
                                                echo "<li class='dropdown-item'>
                                                    <a href='javascript:void(0);' data-label='".$tpl->escape($milestone->headline)."' data-value='".$row['id'].'_'.$milestone->id.'_'.$tpl->escape($milestone->tags)."' id='ticketMilestoneChange".$row['id'].$milestone->id."' style='background-color:".$tpl->escape($milestone->tags)."'>".$tpl->escape($milestone->headline).'</a>';
                                                echo '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>
                            <?php
                            if (isset($statusLabels[$row['status']])) {
                                $class = $statusLabels[$row['status']]['class'];
                                $name = $statusLabels[$row['status']]['name'];
                                $sortKey = $statusLabels[$row['status']]['sortKey'];
                            } else {
                                $class = 'label-important';
                                $name = 'new';
                                $sortKey = 0;
                            }
                            ?>
                            <td data-order="<?php echo e($sortKey); ?>">
                                <div class="dropdown ticketDropdown statusDropdown colorized show">
                                    <a class="dropdown-toggle status <?php echo e($class); ?>" href="javascript:void(0);" role="button" id="statusDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text"><?php echo e($name); ?></span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="statusDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_status'); ?></li>
                                        <?php
                                        foreach ($statusLabels as $key => $label) {
                                            echo "<li class='dropdown-item'>
                                                <a href='javascript:void(0);' class='".$label['class']."' data-label='".$tpl->escape($label['name'])."' data-value='".$row['id'].'_'.$key.'_'.$label['class']."' id='ticketStatusChange".$row['id'].$key."' >".$tpl->escape($label['name']).'</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>

                            <td data-order="<?php echo e($row['editorFirstname'] != '' ? $tpl->escape($row['editorFirstname']) : __('dropdown.not_assigned')); ?>">
                                <div class="dropdown ticketDropdown userDropdown noBg show ">
                                    <a class="dropdown-toggle" href="javascript:void(0);" role="button" id="userDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text">
                                                                    <?php
                                                                    if ($row['editorFirstname'] != '') {
                                                                        echo "<span id='userImage".$row['id']."'><img src='".BASE_URL.'/api/users?profileImage='.$row['editorId']."' width='25' style='vertical-align: middle; margin-right:5px;'/></span><span id='user".$row['id']."'> ".$tpl->escape($row['editorFirstname']).'</span>';
                                                                    } else {
                                                                        echo "<span id='userImage".$row['id']."'><img src='".BASE_URL."/api/users?profileImage=false' width='25' style='vertical-align: middle; margin-right:5px;'/></span><span id='user".$row['id']."'>".__('dropdown.not_assigned').'</span>';
                                                                    }
                                                                    ?>
                                                                </span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="userDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_user'); ?></li>
                                        <?php
                                        foreach ($users as $user) {
                                            echo "<li class='dropdown-item'>
                                                                <a href='javascript:void(0);' data-label='".sprintf(__('text.full_name'), $tpl->escape($user['firstname']), $tpl->escape($user['lastname']))."' data-value='".$row['id'].'_'.$user['id'].'_'.$user['profileId']."' id='userStatusChange".$row['id'].$user['id']."' ><img src='".BASE_URL.'/api/users?profileImage='.$user['id']."' width='25' style='vertical-align: middle; margin-right:5px;'/>".sprintf(__('text.full_name'), $tpl->escape($user['firstname']), $tpl->escape($user['lastname'])).'</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>

                            <td data-order="<?php echo e($row['editFrom']); ?>" >
                                <?php echo __('label.due_icon'); ?><input type="text" title="<?php echo e(__('label.planned_start_date')); ?>" value="<?php echo e(format($row['editFrom'])->date()); ?>" class="editFromDate secretInput milestoneEditFromAsync fromDateTicket-<?php echo e($row['id']); ?>" data-id="<?php echo e($row['id']); ?>" name="editFrom" class=""/>
                            </td>

                            <td data-order="<?php echo e($row['editTo']); ?>" >
                                <?php echo __('label.due_icon'); ?><input type="text" title="<?php echo e(__('label.planned_end_date')); ?>" value="<?php echo e(format($row['editTo'])->date()); ?>" class="editToDate secretInput milestoneEditToAsync toDateTicket-<?php echo e($row['id']); ?>" data-id="<?php echo e($row['id']); ?>" name="editTo" class="" />
                            </td>

                            <td data-order="<?php echo e($row['planHours']); ?>" >
                                <?php echo e($row['planHours']); ?>

                            </td>
                            <td data-order="<?php echo e($row['hourRemaining']); ?>" >
                                <?php echo e($row['hourRemaining']); ?>

                            </td>
                            <td data-order="<?php echo e($row['bookedHours']); ?>" >
                                <?php echo e($row['bookedHours']); ?>

                            </td>

                            <td>
                                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                    <div class="inlineDropDownContainer">
                                        <a href="javascript:void(0);" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-header"><?php echo __('subtitles.todo'); ?></li>
                                            <li><a href="<?php echo e(BASE_URL); ?>/tickets/editMilestone/<?php echo e($row['id']); ?>" class='ticketModal'><i class="fa fa-edit"></i> <?php echo __('links.edit_milestone'); ?></a></li>
                                            <li><a href="<?php echo e(BASE_URL); ?>/tickets/moveTicket/<?php echo e($row['id']); ?>" class="moveTicketModal sprintModal"><i class="fa-solid fa-arrow-right-arrow-left"></i> <?php echo __('links.move_milestone'); ?></a></li>
                                            <li><a href="<?php echo e(BASE_URL); ?>/tickets/delMilestone/<?php echo e($row['id']); ?>" class="delete"><i class="fa fa-trash"></i> <?php echo __('links.delete'); ?></a></li>
                                            <li class="nav-header border"></li>
                                            <li><a href="<?php echo e(BASE_URL); ?>/tickets/showAll?search=true&milestone=<?php echo e($row['id']); ?>"><?php echo __('links.view_todos'); ?></a></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <?php $tpl->dispatchTplEvent('allTicketsTable.beforeRowEnd', ['tickets' => $allTickets, 'rowNum' => $rowNum]); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $tpl->dispatchTplEvent('allTicketsTable.afterLastRow', ['tickets' => $allTickets]); ?>
                </tbody>
                <?php $tpl->dispatchTplEvent('allTicketsTable.afterBody', ['tickets' => $allTickets]); ?>
            </table>
            <?php $tpl->dispatchTplEvent('allTicketsTable.afterClose', ['tickets' => $allTickets]); ?>

            <?php if($group['label'] != 'all'): ?>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>

<?php if (! $__env->hasRenderedOnce('522820c0-4172-477d-8a6a-0ce3c6e95519')): $__env->markAsRenderedOnce('522820c0-4172-477d-8a6a-0ce3c6e95519'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    <?php $tpl->dispatchTplEvent('scripts.afterOpen'); ?>

    jQuery(document).ready(function(){

        <?php if($login::userIsAtLeast($roles::$editor)): ?>
        leantime.ticketsController.initUserDropdown();
        leantime.ticketsController.initMilestoneDropdown();
        leantime.ticketsController.initEffortDropdown();
        leantime.ticketsController.initStatusDropdown();
        leantime.ticketsController.initSprintDropdown();
        leantime.ticketsController.initMilestoneDatesAsyncUpdate();

        <?php else: ?>
            leantime.authController.makeInputReadonly(".maincontentinner");
        <?php endif; ?>

        leantime.ticketsController.initMilestoneTable("<?php echo e($searchCriteria['groupBy']); ?>");

        <?php $tpl->dispatchTplEvent('scripts.beforeClose'); ?>
    });
</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/showAllMilestones.blade.php ENDPATH**/ ?>