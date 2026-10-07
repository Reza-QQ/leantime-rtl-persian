<?php $__env->startSection('content'); ?>

<?php
    $tickets = $tickets ?? [];
    $todoTypeIcons = $ticketTypeIcons;
    $allTicketGroups = $allTickets;
    $reopenState = session()->get('quickadd_reopen', null);
    $currentGroupBy = $searchCriteria['groupBy'] ?? 'all';
    // Program (cross-project) board: columns are semantic status types and tickets are placed
    // by their computed statusType (resolved from each project) instead of the raw status key.
    $programBoard = $programBoard ?? false;
    $placementField = $programBoard ? 'statusType' : 'status';
?>

<?php echo $tpl->displayNotification(); ?>


<script>
    leantime.kanbanGroupBy = '<?php echo e($tpl->escape($currentGroupBy)); ?>';
</script>

<?php echo $__env->make('tickets::submodules.ticketHeader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="maincontent">

    <?php echo $__env->make('tickets::submodules.ticketBoardTabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="maincontentinner kanban-board-wrapper" >

        
        <div class="clearfix"></div>

        <?php if($programBoard): ?>
            <p class="tw-text-[var(--secondary-font-color)]" style="margin-bottom:15px;">
                <i class="fa fa-circle-info" aria-hidden="true"></i>
                <?php echo e(__('text.program_status_rollup')); ?>

            </p>
        <?php endif; ?>

        <?php if(isset($allTicketGroups['all'])): ?>
            <?php $allTickets = $allTicketGroups['all']['items']; ?>
        <?php endif; ?>

        <?php
            $isGroupByActive = ! empty($searchCriteria['groupBy']) && $searchCriteria['groupBy'] !== 'all';
            $columnHeaderClass = $isGroupByActive ? 'groupby-active' : '';
        ?>
        <div class="kanban-column-headers <?php echo e($columnHeaderClass); ?>" style="
            display: flex;
            position: sticky;
            top: 110px;
            justify-content: flex-start;
            z-index: 9;
            ">
        <?php $__currentLoopData = $allKanbanColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statusRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="column">
                <h4 class="widgettitle title-primary title-border-<?php echo e($statusRow['class']); ?>">
                    <?php if($login::userIsAtLeast($roles::$manager) && ! $programBoard): ?>
                        <div class="inlineDropDownContainer" style="float:right;">
                            <a href="javascript:void(0);" class="dropdown-toggle ticketDropDown editHeadline" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#/setting/editBoxLabel?module=ticketlabels&label=<?php echo e($key); ?>" class="editLabelModal"><?php echo __('headlines.edit_label'); ?></a>
                                </li>
                                <li><a href="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e(session('currentProject')); ?>#todosettings"><?php echo __('links.add_remove_col'); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <strong class="count">0</strong>
                    <?php echo e($statusRow['name']); ?>

                </h4>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php $__currentLoopData = $allTicketGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php $allTickets = $group['items']; ?>

            <?php if($group['label'] != 'all'): ?>
                <?php
                $swimlaneExpanded = ! in_array($group['id'], session('collapsedSwimlanes', []));
                $groupBy = $searchCriteria['groupBy'] ?? 'status';
                $groupId = $group['id'];
                $groupIdKey = (string) $groupId;
                $swimlaneBreakdown = $statusBreakdown[$groupIdKey] ?? $statusBreakdown[$groupId] ?? [];
                $statusCounts = $swimlaneBreakdown['statusCounts'] ?? [];
                $timeAlert = $swimlaneBreakdown['timeAlert'] ?? null;
                ?>
                <div class="kanban-swimlane-row" data-expanded="<?php echo e($swimlaneExpanded ? 'true' : 'false'); ?>" id="swimlane-row-<?php echo e($group['id']); ?>">
                    <div class="kanban-swimlane-sentinel" data-swimlane-id="<?php echo e($group['id']); ?>" aria-hidden="true"></div>

                    
                    <?php if (isset($component)) { $__componentOriginal83f37a161835596b4d874eb7522f0c73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal83f37a161835596b4d874eb7522f0c73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.kanban.swimlane-row-header','data' => ['groupBy' => $groupBy,'groupId' => $group['id'],'label' => $group['label'],'totalCount' => $swimlaneBreakdown['totalCount'] ?? count($group['items']),'statusCounts' => $statusCounts,'statusColumns' => $allKanbanColumns,'expanded' => $swimlaneExpanded,'moreInfo' => $group['more-info'] ?? null,'timeAlert' => $group['timeAlert'] ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::kanban.swimlane-row-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['groupBy' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($groupBy),'groupId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($group['id']),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($group['label']),'totalCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($swimlaneBreakdown['totalCount'] ?? count($group['items'])),'statusCounts' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statusCounts),'statusColumns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($allKanbanColumns),'expanded' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($swimlaneExpanded),'moreInfo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($group['more-info'] ?? null),'timeAlert' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($group['timeAlert'] ?? null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal83f37a161835596b4d874eb7522f0c73)): ?>
<?php $attributes = $__attributesOriginal83f37a161835596b4d874eb7522f0c73; ?>
<?php unset($__attributesOriginal83f37a161835596b4d874eb7522f0c73); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal83f37a161835596b4d874eb7522f0c73)): ?>
<?php $component = $__componentOriginal83f37a161835596b4d874eb7522f0c73; ?>
<?php unset($__componentOriginal83f37a161835596b4d874eb7522f0c73); ?>
<?php endif; ?>

                    <div class="kanban-swimlane-content<?php echo e(!$swimlaneExpanded ? ' collapsed' : ''); ?>" id="swimlane-content-<?php echo e($group['id']); ?>">
            <?php endif; ?>

                    <div class="sortableTicketList kanbanBoard" id="kanboard-<?php echo e($group['id']); ?>" style="margin-top:-5px;">

                        <div class="row-fluid">

                            <?php
                            $emptyColumns = [];
                            foreach ($allKanbanColumns as $key => $statusRow) {
                                $hasTickets = false;
                                if (isset($allTickets)) {
                                    foreach ($allTickets as $ticket) {
                                        if (isset($ticket[$placementField]) && $ticket[$placementField] == $key) {
                                            $hasTickets = true;
                                            break;
                                        }
                                    }
                                }
                                if (! $hasTickets) {
                                    $emptyColumns[$key] = true;
                                }
                            }
                            ?>

                            <?php $__currentLoopData = $allKanbanColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statusRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="column">
                                <div class="contentInner status_<?php echo e($key); ?> <?php echo e(isset($emptyColumns[$key]) ? 'empty-column' : ''); ?>"
                                     data-empty-text="<?php echo e(isset($emptyColumns[$key]) ? 'Empty' : ''); ?>"
                                     aria-label="<?php echo e(isset($emptyColumns[$key]) ? 'Empty column' : htmlspecialchars($statusRow['name']).' column items'); ?>"
                                     role="list">

                                    <?php echo $__env->make('tickets::partials.quickadd-form', [
                                        'statusId' => $key,
                                        'swimlaneKey' => $group['value'] ?? $group['id'] ?? null,
                                        'isEmpty' => isset($emptyColumns[$key]),
                                        'currentGroupBy' => $searchCriteria['groupBy'] ?? null,
                                        'programBoard' => $programBoard,
                                        'availableProjects' => $availableProjects ?? null,
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                    <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(($row[$placementField] ?? null) == $key): ?>
                                        <div class="ticketBox moveable container priority-border-<?php echo e($row['priority']); ?>" id="ticket_<?php echo e($row['id']); ?>">

                                            <div class="row" >
                                                <div class="col-md-12">

                                                    <?php echo $__env->make('tickets::partials.ticketsubmenu', ['ticket' => $row, 'onTheClock' => $onTheClock], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                                    <?php if($row['dependingTicketId'] > 0): ?>
                                                        <small><a href="#/tickets/showTicket/<?php echo e($row['dependingTicketId']); ?>" class="form-modal"><?php echo e($row['parentHeadline']); ?></a></small> //
                                                    <?php endif; ?>
                                                    <small><i class="fa <?php echo e($todoTypeIcons[strtolower($row['type'])]); ?>"></i> <?php echo __('label.'.strtolower($row['type'])); ?></small>
                                                    <small>#<?php echo e($row['id']); ?></small>
                                                    <div class="kanbanCardContent">
                                                        <h4><a href="#/tickets/showTicket/<?php echo e($row['id']); ?>" data-hx-get="<?php echo e(BASE_URL); ?>/tickets/showTicket/<?php echo e($row['id']); ?>" hx-swap="none" preload="mouseover"><?php echo e($row['headline']); ?></a></h4>

                                                        
                                                        <?php if(trim(strip_tags((string) $row['description'])) !== ''): ?>
                                                        <div class="kanbanContent">
                                                            <?php echo $tpl->escapeMinimal($row['description']); ?>

                                                        </div>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class="tw-flex">
                                                    <?php if($row['dateToFinish'] != '0000-00-00 00:00:00' && $row['dateToFinish'] != '1969-12-31 00:00:00'): ?>
                                                        <div>
                                                            <?php echo __('label.due_icon'); ?>

                                                            <input type="text" title="<?php echo e(__('label.due')); ?>" value="<?php echo e(format($row['dateToFinish'])->date()); ?>" class="duedates secretInput" style="margin-left:0px;" data-id="<?php echo e($row['id']); ?>" name="date" />
                                                        </div>
                                                        <div>
                                                            <?php $tpl->dispatchTplEvent('afterDates', ['ticket' => $row]); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clearfix" style="padding-bottom: 8px;"></div>

                                            <div class="timerContainer " id="timerContainer-<?php echo e($row['id']); ?>" >

                                                    <div class="dropdown ticketDropdown milestoneDropdown colorized show firstDropdown" >
                                                        <a style="background-color:<?php echo e($tpl->escape($row['milestoneColor'])); ?>" class="dropdown-toggle f-left  label-default milestone" href="javascript:void(0);" role="button" id="milestoneDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text"><?php if($row['milestoneid'] != '' && $row['milestoneid'] != 0): ?><?php echo e($row['milestoneHeadline']); ?><?php else: ?><?php echo __('label.no_milestone'); ?><?php endif; ?></span>
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


                                                <?php if($row['storypoints'] != '' && $row['storypoints'] > 0): ?>
                                                    <div class="dropdown ticketDropdown effortDropdown show">
                                                    <a class="dropdown-toggle f-left  label-default effort" href="javascript:void(0);" role="button" id="effortDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text"><?php echo e($efforts[''.$row['storypoints']] ?? $row['storypoints']); ?></span>
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
                                                <?php endif; ?>


                                                <div class="dropdown ticketDropdown priorityDropdown show">
                                                    <a class="dropdown-toggle f-left  label-default priority priority-bg-<?php echo e($row['priority']); ?>" href="javascript:void(0);" role="button" id="priorityDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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


                                                <div class="dropdown ticketDropdown userDropdown noBg show right lastDropdown dropRight">
                                                    <a class="dropdown-toggle f-left" href="javascript:void(0);" role="button" id="userDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text" style="display:inline-flex; align-items:center;">
                                                            <?php
                                                            if ($row['editorFirstname'] != '') {
                                                                echo "<span id='userImage".$row['id']."'><img src='".BASE_URL.'/api/users?profileImage='.$row['editorId']."' width='25' style='vertical-align: middle;'/></span>";
                                                            } else {
                                                                echo "<span id='userImage".$row['id']."'><img src='".BASE_URL."/api/users?profileImage=false' width='25' style='vertical-align: middle;'/></span>";
                                                            }

                                                            if (! empty($row['collaboratorPreview'])) {
                                                                echo "<span class='ticket-collaborators' style='display:inline-flex; align-items:center; margin-left:6px;'>";
                                                                foreach ($row['collaboratorPreview'] as $index => $collaboratorId) {
                                                                    $offset = $index > 0 ? 'margin-left:-8px;' : '';
                                                                    echo "<span class='ticket-collaborator-avatar' title='".__('label.collaborators')."' style='display:inline-flex; width:18px; height:18px; border-radius:999px; border:2px solid var(--main-background-color, #fff); overflow:hidden; ".$offset."'><img src='".BASE_URL.'/api/users?profileImage='.$collaboratorId."' width='18' height='18' style='display:block; width:18px; height:18px;'/></span>";
                                                                }
                                                                if (($row['collaboratorOverflow'] ?? 0) > 0) {
                                                                    echo "<span class='ticket-collaborator-more' title='".__('label.collaborators')."' style='display:inline-flex; align-items:center; justify-content:center; min-width:18px; height:18px; padding:0 4px; margin-left:4px; border-radius:999px; background:var(--accent-color, #e9ecef); color:var(--secondary-font-color, #333); font-size:10px; line-height:18px;'>+".(int) $row['collaboratorOverflow'].'</span>';
                                                                }
                                                                echo '</span>';
                                                            }
                                                            ?>
                                                        </span>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="userDropdownMenuLink<?php echo e($row['id']); ?>">
                                                        <li class="nav-header border"><?php echo __('dropdown.choose_user'); ?></li>
                                                        <?php
                                                        if (is_array($users)) {
                                                            foreach ($users as $user) {
                                                                echo "<li class='dropdown-item'>
                                                                    <a href='javascript:void(0);' data-label='".sprintf(__('text.full_name'), $tpl->escape($user['firstname']), $tpl->escape($user['lastname']))."' data-value='".$row['id'].'_'.$user['id'].'_'.$user['profileId']."' id='userStatusChange".$row['id'].$user['id']."' ><img src='".BASE_URL.'/api/users?profileImage='.$user['id']."' width='25' style='vertical-align: middle; margin-right:5px;'/>".sprintf(__('text.full_name'), $tpl->escape($user['firstname']), $tpl->escape($user['lastname'])).'</a>';
                                                                echo '</li>';
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>

                                            <?php if($programBoard): ?>
                                                
                                                <?php $rowProjectStatuses = $statusLabelsByProject[$row['projectId']] ?? []; ?>
                                                <?php $rowProjectStatus = $rowProjectStatuses[$row['status']] ?? null; ?>
                                                <div style="margin-top:4px;">
                                                    <div class="dropdown ticketDropdown statusDropdown colorized show" style="display:inline-block;">
                                                        <a class="dropdown-toggle status <?php echo e($rowProjectStatus['class'] ?? 'label-default'); ?> f-left" href="javascript:void(0);" role="button" id="statusDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text"><?php echo e($tpl->escape($rowProjectStatus['name'] ?? __('label.new'))); ?></span>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="statusDropdownMenuLink<?php echo e($row['id']); ?>">
                                                            <li class="nav-header border"><?php echo __('dropdown.choose_status'); ?></li>
                                                            <?php
                                                            foreach ($rowProjectStatuses as $statusKey => $statusOption) {
                                                                echo "<li class='dropdown-item'><a href='javascript:void(0);' class='".$statusOption['class']."' data-label='".$tpl->escape($statusOption['name'])."' data-value='".$row['id'].'_'.$statusKey.'_'.$statusOption['class']."' id='ticketStatusChange".$row['id'].$statusKey."'>".$tpl->escape($statusOption['name']).'</a></li>';
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <small class="tw-text-[var(--secondary-font-color)]"><?php echo e($tpl->escape($row['projectName'] ?? '')); ?></small>
                                                </div>
                                            <?php endif; ?>

                                            <?php if($row['commentCount'] > 0 || $row['subtaskCount'] > 0 || $row['tags'] != ''): ?>
                                            <div class="row">
                                                <div class="col-md-12 border-top" style="white-space: nowrap;">
                                                    <?php if($row['commentCount'] > 0): ?>
                                                        <a href="#/tickets/showTicket/<?php echo e($row['id']); ?>"><span class="fa-regular fa-comments"></span> <?php echo e($row['commentCount']); ?></a>&nbsp;
                                                    <?php endif; ?>

                                                    <?php if($row['subtaskCount'] > 0): ?>
                                                        <a id="subtaskLink_<?php echo e($row['id']); ?>" href="#/tickets/showTicket/<?php echo e($row['id']); ?>" class="subtaskLineLink"> <span class="fa fa-diagram-successor"></span> <?php echo e($row['subtaskCount']); ?></a>&nbsp;
                                                    <?php endif; ?>
                                                    <?php if($row['tags'] != ''): ?>
                                                        <?php $tagsArray = explode(',', $row['tags']); ?>
                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fa fa-tags" aria-hidden="true"></i> <?php echo e(count($tagsArray)); ?>

                                                        </a>
                                                        <ul class="dropdown-menu ">
                                                            <li style="padding:10px"><div class='tagsinput readonly'>
                                                            <?php $__currentLoopData = $tagsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span class='tag'><span><?php echo e($tag); ?></span></span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div></li></ul>
                                                    <?php endif; ?>

                                                </div>

                                            </div>
                                            <?php endif; ?>

                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="clearfix"></div>

                        </div>
                    </div>

            <?php if($group['label'] != 'all'): ?>
                </div> 
                </div> 
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

</div>

<?php if (! $__env->hasRenderedOnce('6b0c8b00-f279-4c30-82c8-ed8c17230942')): $__env->markAsRenderedOnce('6b0c8b00-f279-4c30-82c8-ed8c17230942'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    jQuery(document).ready(function(){

    <?php if(can('tickets.edit')): ?>
        leantime.ticketsController.initUserDropdown();
        leantime.ticketsController.initMilestoneDropdown();
        leantime.ticketsController.initDueDateTimePickers();
        leantime.ticketsController.initEffortDropdown();
        leantime.ticketsController.initPriorityDropdown();

        <?php if($programBoard): ?>
            
            leantime.ticketsController.initStatusDropdown();
        <?php endif; ?>


        <?php if($programBoard): ?>
            
            var ticketStatusList = [<?php $__currentLoopData = $allKanbanColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statusRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($key); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>];
            if (leantime.pgmProBoard && typeof leantime.pgmProBoard.initProgramKanban === 'function') {
                leantime.pgmProBoard.initProgramKanban(ticketStatusList);
            } else {
                console.warn('PgmPro board JS is not loaded; program kanban drag-and-drop is disabled.');
            }
        <?php else: ?>
            var ticketStatusList = [<?php $__currentLoopData = $allTicketStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statusRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($key); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>];
            leantime.ticketsController.initTicketKanban(ticketStatusList);
        <?php endif; ?>

    <?php else: ?>
        leantime.authController.makeInputReadonly(".maincontentinner");
    <?php endif; ?>

    leantime.ticketsController.setUpKanbanColumns();

        <?php if(isset($_GET['showTicketModal'])): ?>
            <?php
                $modalUrl = $_GET['showTicketModal'] == '' ? '' : '/'.(int) $_GET['showTicketModal'];
            ?>

        leantime.ticketsController.openTicketModalManually("<?php echo e(BASE_URL); ?>/tickets/showTicket<?php echo e($modalUrl); ?>");
        window.history.pushState({},document.title, '<?php echo e(BASE_URL); ?>/tickets/showKanban');

        <?php endif; ?>


        <?php
        foreach ($allTicketGroups as $group) {
            foreach ($group['items'] as $ticket) {
                if ($ticket['dependingTicketId'] > 0) {
        ?>
            var startElement =  document.getElementById('subtaskLink_<?php echo e($ticket['dependingTicketId']); ?>');
            var endElement =  document.getElementById('ticket_<?php echo e($ticket['id']); ?>');


            if ( startElement != undefined && endElement != undefined) {

                var startAnchor = LeaderLine.mouseHoverAnchor({
                    element: startElement,
                    showEffectName: 'draw',
                    style: {background: 'none', backgroundColor: 'none'},
                    hoverStyle: {background: 'none', backgroundColor: 'none', cursor: 'pointer'}
                });

                var line<?php echo e($ticket['id']); ?> = new LeaderLine(startAnchor, endElement, {
                    startPlugColor: 'var(--accent1)',
                    endPlugColor: 'var(--accent2)',
                    gradient: true,
                    size: 2,
                    path: "grid",
                    startSocket: 'bottom',
                    endSocket: 'auto'
                });

                jQuery("#ticket_<?php echo e($ticket['id']); ?>").mousedown(function () {

                })
                    .mousemove(function () {

                    })
                    .mouseup(function () {
                        line<?php echo e($ticket['id']); ?>.position();
                    });

                jQuery("#ticket_<?php echo e($ticket['dependingTicketId']); ?>").mousedown(function () {

                    })
                    .mousemove(function () {


                    })
                    .mouseup(function () {
                        line<?php echo e($ticket['id']); ?>.position();

                    });

            }

        <?php
                }
            }
        }
        ?>




    });
</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/showKanban.blade.php ENDPATH**/ ?>