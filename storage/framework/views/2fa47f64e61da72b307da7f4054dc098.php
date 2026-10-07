<?php $__env->startSection('content'); ?>

<?php
    $allTicketGroups = $allTickets;
    $statusLabels = $allTicketStates;
    $groupBy = $groupBy ?? [];
    $newField = $newField ?? [];
    $numberofColumns = count($allTicketStates) - 1;
    $size = floor(100 / $numberofColumns);
?>

<?php echo $tpl->displayNotification(); ?>


<?php echo $__env->make('tickets::submodules.ticketHeader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="maincontent">

    <?php echo $__env->make('tickets::submodules.ticketBoardTabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="maincontentinner">

        
        <div class="clearfix"></div>

        <?php $tpl->dispatchTplEvent('allTicketsTable.before', ['tickets' => $allTickets]); ?>

        <div class="row">
            <div class="col-md-3">
                <div class="quickAddForm" style="margin-top:15px;">
                    <form action="" method="post">
                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'headline','autofocus' => true,'placeholder' => ''.e(__('input.placeholders.create_task')).'','style' => 'width: 100%;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'headline','autofocus' => true,'placeholder' => ''.e(__('input.placeholders.create_task')).'','style' => 'width: 100%;']); ?>
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
                        <?php if(isset($availableProjects)): ?>
                            
                            <select name="quickaddProjectId" class="form-control tw-mb-s" required aria-label="<?php echo e(__('label.project')); ?>">
                                <option value=""><?php echo e(__('label.project')); ?>…</option>
                                <?php $__currentLoopData = $availableProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quickAddProjectId => $quickAddProjectName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($quickAddProjectId); ?>"><?php echo e($tpl->escape($quickAddProjectName)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php endif; ?>
                        <input type="hidden" name="sprint" value="<?php echo e($currentSprint); ?>" />
                        <input type="hidden" name="milestone" value="<?php echo e(htmlspecialchars((string) ($searchCriteria['milestone'] ?? ''), ENT_QUOTES, 'UTF-8')); ?>" />
                        <input type="hidden" name="groupBy" value="<?php echo e(htmlspecialchars((string) ($searchCriteria['groupBy'] ?? ''), ENT_QUOTES, 'UTF-8')); ?>" />
                        <input type="hidden" name="quickadd" value="1"/>
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','class' => 'tw-mb-m','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'saveTicket','style' => 'vertical-align: top; ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','class' => 'tw-mb-m','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'saveTicket','style' => 'vertical-align: top; ']); ?>
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


                        <table class="table display listStyleTable" style="width:100%">

                            <?php $tpl->dispatchTplEvent('allTicketsTable.beforeHead', ['tickets' => $allTickets]); ?>
                            <thead>
                            <?php $tpl->dispatchTplEvent('allTicketsTable.beforeHeadRow', ['tickets' => $allTickets]); ?>
                            <tr style="display:none;">

                                <th style="width:20px" class="status-col"><?php echo __('label.todo_status'); ?></th>
                                <th><?php echo __('label.title'); ?></th>
                            </tr>

                            <?php $tpl->dispatchTplEvent('allTicketsTable.afterHeadRow', ['tickets' => $allTickets]); ?>
                            </thead>

                            <?php $tpl->dispatchTplEvent('allTicketsTable.afterHead', ['tickets' => $allTickets]); ?>
                            <tbody>
                            <?php $tpl->dispatchTplEvent('allTicketsTable.beforeFirstRow', ['tickets' => $allTickets]); ?>
                            <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowNum => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr onclick="leantime.ticketsController.loadTicketToContainer('<?php echo e($row['id']); ?>', '#ticketContent')" id="row-<?php echo e($row['id']); ?>" class="ticketRows">
                                    <?php $tpl->dispatchTplEvent('allTicketsTable.afterRowStart', ['rowNum' => $rowNum, 'tickets' => $allTickets]); ?>
                                    <?php
                                    // Program (cross-project) board: render/edit each row with its own
                                    // project's statuses so a status change never orphans the task.
                                    $rowStatusLabels = (isset($statusLabelsByProject) && isset($statusLabelsByProject[$row['projectId']]))
                                        ? $statusLabelsByProject[$row['projectId']]
                                        : $statusLabels;
                                    ?>
                                    <td data-order="<?php echo e(isset($rowStatusLabels[$row['status']]) ? $rowStatusLabels[$row['status']]['sortKey'] : ''); ?>" data-search="<?php echo e(isset($rowStatusLabels[$row['status']]) ? $rowStatusLabels[$row['status']]['name'] : ''); ?>" class="roundStatusBtn" style="width:20px">
                                        <div class="dropdown ticketDropdown statusDropdown colorized show">
                                            <a class="dropdown-toggle status <?php echo e(isset($rowStatusLabels[$row['status']]) ? $rowStatusLabels[$row['status']]['class'] : ''); ?>" href="javascript:void(0);" role="button" id="statusDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-caret-down" aria-hidden="true"></i>
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

                                    <td data-search="<?php echo e(isset($rowStatusLabels[$row['status']]) ? $rowStatusLabels[$row['status']]['name'] : ''); ?>" data-order="<?php echo e($row['headline']); ?>" >
                                        <a href="javascript:void(0);"><strong><?php echo e($row['headline']); ?></strong></a></td>

                                    <?php $tpl->dispatchTplEvent('allTicketsTable.beforeRowEnd', ['tickets' => $allTickets, 'rowNum' => $rowNum]); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $tpl->dispatchTplEvent('allTicketsTable.afterLastRow', ['tickets' => $allTickets]); ?>
                            </tbody>
                            <?php $tpl->dispatchTplEvent('allTicketsTable.afterBody', ['tickets' => $allTickets]); ?>
                        </table>

                        <?php if($group['label'] != 'all'): ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            <div class="col-md-9 hidden-sm"  >
                <div id="ticketContent">
                    <div class="center">
                        <div class='svgContainer'>
                            <?php echo file_get_contents(ROOT.'/dist/images/svg/undraw_design_data_khdb.svg'); ?>

                        </div>

                        <h3><?php echo __('headlines.pick_a_task'); ?></h3>
                        <?php echo __('text.edit_tasks_in_here'); ?>

                    </div>
                </div>
            </div>
        </div>

        <?php $tpl->dispatchTplEvent('allTicketsTable.afterClose', ['tickets' => $allTickets]); ?>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('091c0464-8069-46bc-a91f-0016dbf695d1')): $__env->markAsRenderedOnce('091c0464-8069-46bc-a91f-0016dbf695d1'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    jQuery(document).ready(function() {
        <?php $tpl->dispatchTplEvent('scripts.afterOpen'); ?>


        <?php if($login::userIsAtLeast($roles::$editor)): ?>
        leantime.ticketsController.initStatusDropdown();
        <?php else: ?>
        leantime.authController.makeInputReadonly(".maincontentinner");
        <?php endif; ?>



        leantime.ticketsController.initTicketsList("<?php echo e($searchCriteria['groupBy']); ?>");

        <?php $tpl->dispatchTplEvent('scripts.beforeClose'); ?>

    });

</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/showList.blade.php ENDPATH**/ ?>