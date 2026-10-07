<?php $__env->startSection('content'); ?>

<?php if (! $__env->hasRenderedOnce('34b60193-cf65-4541-b53e-3dbf61e46319')): $__env->markAsRenderedOnce('34b60193-cf65-4541-b53e-3dbf61e46319'); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    function filterProjectsByClient() {
        var selectedClientId = jQuery('select[name="clientId"]').val();
        var projectSelect = jQuery('select[name="project"]');

        if (selectedClientId === '-1') {
            projectSelect.find('option[data-client-id]').show();
        } else {
            projectSelect.find('option[data-client-id]').hide();
            projectSelect.find('option[data-client-id="' + selectedClientId + '"]').show();
        }

        if (projectSelect.find('option:selected').is(':hidden')) {
            projectSelect.val('-1');
        }

        filterTicketsByProject();
    }

    function filterTicketsByProject() {
        var selectedProjectId = jQuery('select[name="project"]').val();
        var ticketSelect = jQuery('select[name="ticket"]');

        if (ticketSelect.length === 0) {
            return;
        }

        if (selectedProjectId === '-1') {
            ticketSelect.find('option[data-project-id]').show();
        } else {
            ticketSelect.find('option[data-project-id]').hide();
            ticketSelect.find('option[data-project-id="' + selectedProjectId + '"]').show();
        }

        if (ticketSelect.find('option:selected').is(':hidden')) {
            ticketSelect.val('-1');
        }
    }

    jQuery(document).ready(function(){
        jQuery("#checkAllEmpl").change(function(){
            jQuery(".invoicedEmpl").prop('checked', jQuery(this).prop("checked"));
            if (jQuery(this).prop("checked") == true) {
                jQuery(".invoicedEmpl").attr("checked", "checked");
                jQuery(".invoicedEmpl").parent().addClass("checked");
            } else {
                jQuery(".invoicedEmpl").removeAttr("checked");
                jQuery(".invoicedEmpl").parent().removeClass("checked");
            }
        });

        jQuery("#checkAllComp").change(function(){
            jQuery(".invoicedComp").prop('checked', jQuery(this).prop("checked"));
            if (jQuery(this).prop("checked") == true) {
                jQuery(".invoicedComp").attr("checked", "checked");
                jQuery(".invoicedComp").parent().addClass("checked");
            } else {
                jQuery(".invoicedComp").removeAttr("checked");
                jQuery(".invoicedComp").parent().removeClass("checked");
            }
        });

        jQuery("#checkAllPaid").change(function(){
            jQuery(".paid").prop('checked', jQuery(this).prop("checked"));
            if (jQuery(this).prop("checked") == true) {
                jQuery(".paid").attr("checked", "checked");
                jQuery(".paid").parent().addClass("checked");
            } else {
                jQuery(".paid").removeAttr("checked");
                jQuery(".paid").parent().removeClass("checked");
            }
        });

        jQuery('select[name="clientId"]').change(filterProjectsByClient);
        jQuery('select[name="project"]').change(filterTicketsByProject);

        leantime.timesheetsController.initTimesheetsTable();

        <?php if($login::userIsAtLeast($roles::$manager)): ?>
            leantime.timesheetsController.initEditTimeModal();
        <?php endif; ?>

        leantime.dateController.initDateRangePicker(".dateFrom", ".dateTo", 1)
    });
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<!-- page header -->
<div class="pageheader">
    <div class="pageicon"><span class="fa-solid fa-business-time"></span></div>
        <div class="pagetitle">
        <h1><?php echo __('headlines.all_timesheets'); ?></h1>
    </div>
</div>
<!-- page header -->


<div class="maincontent">
    <div class="maincontentinner">
        <form action="<?php echo e(BASE_URL); ?>/timesheets/showAll" method="post" id="form" name="form">

            <div class="pull-right">
                <div id="tableButtons" style="display:inline-block"></div>
            </div>
            <div class="clearfix"></div>
            <div class="headtitle" style="">

            <table cellpadding="10" cellspacing="0" width="90%" class="table dataTable filterTable">
                <tr>
                    <td>
                        <label for="clients"><?php echo __('label.client'); ?></label>
                        <select name="clientId">
                            <option value="-1"><?php echo e(strip_tags(__('menu.all_clients'))); ?></option>
                            <?php $__currentLoopData = $allClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($client['id']); ?>"
                                    <?php if($clientFilter == $client['id']): ?>
                                        selected="selected"
                                    <?php endif; ?>
                                ><?php echo e($client['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <label for="projects"><?php echo __('label.project'); ?></label>
                        <select name="project" style="max-width:120px;">
                            <option value="-1"><?php echo e(strip_tags(__('menu.all_projects'))); ?></option>
                            <?php $__currentLoopData = $allProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($project['id']); ?>" data-client-id="<?php echo e($project['clientId']); ?>"
                                    <?php if($projectFilter == $project['id']): ?>
                                        selected="selected"
                                    <?php endif; ?>
                                ><?php echo e($project['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <?php if(! empty($allTickets)): ?>
                    <td>
                        <label for="ticket"><?php echo __('label.ticket'); ?></label>
                            <select name="ticket" style="max-width:120px;">
                                <option value="-1"><?php echo e(strip_tags(__('menu.all_tickets'))); ?></option>
                                <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ticket['id']); ?>" data-project-id="<?php echo e($ticket['projectId']); ?>"
                                        <?php if($ticketFilter == $ticket['id']): ?>
                                            selected="selected"
                                        <?php endif; ?>
                                    ><?php echo e($ticket['headline']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </td>
                    <?php endif; ?>

                    <td>
                        <label for="dateFrom"><?php echo __('label.date_from'); ?></label>
                        <input type="text" id="dateFrom" class="dateFrom"  name="dateFrom" autocomplete="off"
                        value="<?php echo e(format($dateFrom)->date()); ?>" size="5" style="max-width:100px; margin-bottom:10px"/></td>
                    <td>
                        <label for="dateTo"><?php echo __('label.date_to'); ?></label>
                        <input type="text" id="dateTo" class="dateTo" name="dateTo" autocomplete="off"
                        value="<?php echo e(format($dateTo)->date()); ?>" size="5" style="max-width:100px; margin-bottom:10px" /></td>
                    <td>
                    <label for="userId"><?php echo __('label.employee'); ?></label>
                        <select name="userId" id="userId" onchange="submit();" style="max-width:120px;">
                            <option value="all"><?php echo __('label.all_employees'); ?></option>

                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row['id']); ?>"
                                    <?php if($row['id'] == $employeeFilter): ?>
                                        selected="selected"
                                    <?php endif; ?>
                                ><?php echo e(sprintf(__('text.full_name'), $tpl->escape($row['firstname']), $tpl->escape($row['lastname']))); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <label for="kind"><?php echo __('label.type'); ?></label>
                        <select id="kind" name="kind" onchange="submit();" style="max-width:120px;">
                            <option value="all"><?php echo __('label.all_types'); ?></option>
                            <?php $__currentLoopData = $kind; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"
                                    <?php if($key == $actKind): ?>
                                        selected="selected"
                                    <?php endif; ?>
                                ><?php echo __($row); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </td>
                    <td>
                        <label for="invEmpl"><?php echo __('label.invoiced'); ?></label>
                        <select name="invEmpl" id="invEmpl" style="max-width:120px;">
                            <option value="all" <?php if($invEmpl == 'all' || ! $invEmpl): ?> selected="selected" <?php endif; ?>><?php echo __('label.invoiced_all'); ?></option>
                            <option value="1" <?php if($invEmpl == '1'): ?> selected="selected" <?php endif; ?>><?php echo __('label.invoiced'); ?></option>
                            <option value="0" <?php if($invEmpl == '0'): ?> selected="selected" <?php endif; ?>><?php echo __('label.invoiced_not'); ?></option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" value="on" name="invComp" id="invComp" onclick="submit();"
                            <?php if($invComp == '1'): ?>
                                checked="checked"
                            <?php endif; ?>
                        />
                        <label for="invEmpl"><?php echo __('label.invoiced_comp'); ?></label>
                    </td>

                    <td>
                        <input type="checkbox" value="on" name="paid" id="paid" onclick="submit();"
                            <?php if($paid == '1'): ?>
                                checked="checked"
                            <?php endif; ?>
                        />
                        <label for="paid"><?php echo __('label.paid'); ?></label>
                    </td>
                    <td>
                        <input type="hidden" name='filterSubmit' value="1"/>
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.search'),'class' => 'reload']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.search')),'class' => 'reload']); ?>
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
                    </td>
                </tr>
            </table>
            </div>

            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered display" id="allTimesheetsTable">
                <colgroup>
                      <col class="con0" width="100px"/>
                      <col class="con1" />
                      <col class="con0"/>
                      <col class="con1" />
                      <col class="con0"/>
                      <col class="con1" />
                      <col class="con0"/>
                      <col class="con1" />
                      <col class="con0"/>
                      <col class="con1" />
                      <col class="con0"/>
                      <col class="con1"/>
                      <col class="con0"/>
                      <col class="con1"/>
                      <col class="con0"/>
                      <col class="con1"/>
                </colgroup>
                <thead>
                    <tr>
                        <th><?php echo __('label.id'); ?></th>
                        <th><?php echo __('label.date'); ?></th>
                        <th><?php echo __('label.hours'); ?></th>
                        <th><?php echo __('label.plan_hours'); ?></th>
                        <th><?php echo __('label.difference'); ?></th>
                        <th><?php echo __('label.ticket'); ?></th>
                        <th><?php echo __('label.project'); ?></th>
                        <th><?php echo __('label.client'); ?></th>
                        <th><?php echo __('label.employee'); ?></th>
                        <th><?php echo __('label.type'); ?></th>
                        <th><?php echo __('label.milestone'); ?></th>
                        <th><?php echo __('label.tags'); ?></th>
                        <th><?php echo __('label.description'); ?></th>
                        <th><?php echo __('label.invoiced'); ?></th>
                        <th><?php echo __('label.invoiced_comp'); ?></th>
                        <th><?php echo __('label.paid'); ?></th>
                    </tr>

                </thead>
                <tbody>

                <?php
                    $sum = 0;
                    $billableSum = 0;
                ?>

                <?php $__currentLoopData = $allTimesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $sum = $sum + $row['hours']; ?>
                    <tr>
                        <td data-order="<?php echo e($row['id']); ?>">
                                <?php if($login::userIsAtLeast($roles::$manager)): ?>
                                <a href="<?php echo e(BASE_URL); ?>/timesheets/editTime/<?php echo e($row['id']); ?>" class="editTimeModal">#<?php echo e($row['id'] . ' - ' . __('label.edit')); ?> </a>
                                <?php else: ?>
                                #<?php echo e($row['id']); ?>

                                <?php endif; ?>
                        </td>
                        <td data-order="<?php echo e($row['workDate']); ?>">
                                <?php echo e(format($row['workDate'])->date()); ?>

                        </td>
                        <td data-order="<?php echo e($row['hours']); ?>"><?php echo e($row['hours']); ?></td>
                        <td data-order="<?php echo e($row['planHours']); ?>"><?php echo e($row['planHours']); ?></td>
                            <?php $diff = $row['planHours'] - $row['hours']; ?>
                        <td data-order="<?php echo e($diff); ?>"><?php echo e($diff); ?></td>
                        <td data-order="<?php echo e($row['headline']); ?>"><a href="#/tickets/showTicket/<?php echo e($row['ticketId']); ?>"><?php echo e($row['headline']); ?></a></td>

                        <td data-order="<?php echo e($row['name']); ?>"><a href="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($row['projectId']); ?>"><?php echo e($row['name']); ?></a></td>
                        <td data-order="<?php echo e($row['clientName']); ?>"><a href="<?php echo e(BASE_URL); ?>/clients/showClient/<?php echo e($row['clientId']); ?>"><?php echo e($row['clientName']); ?></a></td>

                        <td><?php echo sprintf(__('text.full_name'), $tpl->escape($row['firstname']), $tpl->escape($row['lastname'])); ?></td>
                        <td><?php echo __($kind[$row['kind'] ?? 'GENERAL_BILLABLE'] ?? $kind['GENERAL_BILLABLE']); ?></td>

                        <td><?php echo e($row['milestone']); ?></td>
                        <td><?php echo e($row['tags']); ?></td>

                        <td><?php echo e($row['description']); ?></td>
                        <td data-order="<?php if($row['invoicedEmpl'] == '1'): ?><?php echo e(format($row['invoicedEmplDate'])->date()); ?><?php endif; ?>">
                            <?php if($row['invoicedEmpl'] == '1'): ?>
                                <?php echo e(format($row['invoicedEmplDate'])->date()); ?>

                            <?php else: ?>
                                <?php if($login::userIsAtLeast($roles::$manager)): ?>
                                    <input type="checkbox" name="invoicedEmpl[]" class="invoicedEmpl"
                                value="<?php echo e($row['id']); ?>" />
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td data-order="<?php if($row['invoicedComp'] == '1'): ?><?php echo e(format($row['invoicedCompDate'])->date()); ?><?php endif; ?>">

                            <?php if($row['invoicedComp'] == '1'): ?>
                                <?php echo e(format($row['invoicedCompDate'])->date()); ?>

                            <?php else: ?>
                                <?php if($login::userIsAtLeast($roles::$manager)): ?>
                                <input type="checkbox" name="invoicedComp[]" class="invoicedComp" value="<?php echo e($row['id']); ?>" />
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td data-order="<?php if($row['paid'] == '1'): ?><?php echo e(format($row['paidDate'])->date()); ?><?php endif; ?>">

                            <?php if($row['paid'] == '1'): ?>
                                <?php echo e(format($row['paidDate'])->date()); ?>

                            <?php else: ?>
                                <?php if($login::userIsAtLeast($roles::$manager)): ?>
                                    <input type="checkbox" name="paid[]" class="paid" value="<?php echo e($row['id']); ?>" />
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><strong><?php echo __('label.total_hours'); ?></strong></td>
                        <td colspan="10"><strong><?php echo e($sum); ?></strong></td>

                        <td>
                            <?php if($login::userIsAtLeast($roles::$manager)): ?>
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'saveInvoice']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'saveInvoice']); ?>
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
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($login::userIsAtLeast($roles::$manager)): ?>
                            <input type="checkbox" id="checkAllEmpl" style="vertical-align: baseline;"/> <?php echo __('label.select_all'); ?></td>
                            <?php endif; ?>
                        <td>
                            <?php if($login::userIsAtLeast($roles::$manager)): ?>
                            <input type="checkbox"  id="checkAllComp" style="vertical-align: baseline;"/> <?php echo __('label.select_all'); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($login::userIsAtLeast($roles::$manager)): ?>
                                <input type="checkbox"  id="checkAllPaid" style="vertical-align: baseline;"/> <?php echo __('label.select_all'); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Timesheets/Templates/showAll.blade.php ENDPATH**/ ?>