<?php $__env->startSection('content'); ?>

<?php
/** @var \Carbon\Carbon $currentDate */
?>

<?php if (! $__env->hasRenderedOnce('9bf06cab-4289-4a1e-9d3e-81c558064d69')): $__env->markAsRenderedOnce('9bf06cab-4289-4a1e-9d3e-81c558064d69'); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

jQuery(document).ready(function(){
    var startDate;
    var endDate;
    var selectCurrentWeek = function () {
        window.setTimeout(function () {
            jQuery('.ui-weekpicker').find('.ui-datepicker-current-day a').addClass('ui-state-active').removeClass('ui-state-default');
        }, 1);
    };

    var setDates = function (input) {
        console.log("setting dates");
        var $input = jQuery(input);
        var date = $input.datepicker('getDate');

        if (date !== null) {
            var firstDay = 1
            var dayAdjustment = date.getDay() - firstDay;
            if (dayAdjustment < 0) {
                dayAdjustment += 7;
            }
            startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - dayAdjustment);
            endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - dayAdjustment + 6);

            var inst = $input.data('datepicker');
            var dateFormat = inst.settings.dateFormat || jQuery.datepicker._defaults.dateFormat;
            jQuery('#startDate').datepicker("setDate", startDate);
            jQuery('#endDate').datepicker("setDate", endDate);
            jQuery('#startDate').val(jQuery.datepicker.formatDate(dateFormat, startDate, inst.settings));
            jQuery('#endDate').val(jQuery.datepicker.formatDate(dateFormat, endDate, inst.settings));
        }
    };

    jQuery('.week-picker').datepicker({
        dateFormat:  leantime.dateHelper.getFormatFromSettings("dateformat", "jquery"),
        dayNames: leantime.i18n.__("language.dayNames").split(","),
        dayNamesMin:  leantime.i18n.__("language.dayNamesMin").split(","),
        dayNamesShort: leantime.i18n.__("language.dayNamesShort").split(","),
        monthNames: leantime.i18n.__("language.monthNames").split(","),
        monthNamesShort: leantime.i18n.__("language.monthNamesShort").split(","),
        currentText: leantime.i18n.__("language.currentText"),
        closeText: leantime.i18n.__("language.closeText"),
        buttonText: leantime.i18n.__("language.buttonText"),
        isRTL: leantime.i18n.__("language.isRTL") === "true" ? 1 : 0,
        nextText: leantime.i18n.__("language.nextText"),
        prevText: leantime.i18n.__("language.prevText"),
        weekHeader: leantime.i18n.__("language.weekHeader"),
        firstDay: 1,
        autoSize: true,
        navigationAsDateFormat: true,
        beforeShow: function () {
            jQuery('#ui-datepicker-div').addClass('ui-weekpicker');
            selectCurrentWeek();
        },
        onClose: function () {
            jQuery('#ui-datepicker-div').removeClass('ui-weekpicker');
        },
        showOtherMonths: true,
        selectOtherMonths: true,
        onSelect: function (dateText, inst) {

            setDates(this);
            selectCurrentWeek();
            jQuery(this).change();
            jQuery("#timesheetList").submit();
        },
        beforeShowDay: function (date) {
            var cssClass = '';
            if (date >= startDate && date <= endDate)
                cssClass = 'ui-datepicker-current-day';
            return [true, cssClass];
        },
        onChangeMonthYear: function (year, month, inst) {
            selectCurrentWeek();
        },
    });


    var $calendarTR = jQuery('.ui-weekpicker .ui-datepicker-calendar tr');
    $calendarTR.on('mousemove', function () {
        jQuery(this).find('td a').addClass('ui-state-hover');
    });
    $calendarTR.on('mouseleave', function () {
        jQuery(this).find('td a').removeClass('ui-state-hover');
    });

    jQuery(".project-select").chosen();
    jQuery(".ticket-select").chosen();
    jQuery(".project-select").change(function(){
            jQuery(".ticket-select").removeAttr("selected");
            jQuery(".ticket-select").val("");
            jQuery(".ticket-select").trigger("liszt:updated");

            jQuery(".ticket-select option").show();
            jQuery("#ticketSelect .chosen-results li").show();
            var selectedValue = jQuery(this).find("option:selected").val();
            jQuery(".ticket-select option").not(".project_"+selectedValue).hide();
            jQuery("#ticketSelect .chosen-results li").not(".project_"+selectedValue).hide();
            jQuery(".ticket-select").chosen("destroy").chosen();
    });

    jQuery(".ticket-select").change(function() {
        var selectedValue = jQuery(this).find("option:selected").attr("data-value");
        jQuery(".project-select option[value="+selectedValue+"]").attr("selected", "selected");
        jQuery(".project-select").trigger("liszt:updated");
        jQuery(".ticket-select").chosen("destroy").chosen();
    });

    jQuery("#nextWeek").click(function() {
        var date = jQuery("#endDate").datepicker('getDate');
        var endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() + 7);
        var startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1);

        var inst = jQuery("#endDate").data('datepicker');
        var dateFormat = inst.settings.dateFormat || jQuery.datepicker._defaults.dateFormat;

        jQuery('#startDate').val(jQuery.datepicker.formatDate(dateFormat, startDate, inst.settings));
        jQuery('#endDate').val(jQuery.datepicker.formatDate(dateFormat, endDate, inst.settings));
        jQuery("#timesheetList").submit();
    });

    jQuery("#prevWeek").click(function() {

        var date = jQuery("#startDate").datepicker('getDate');
        var endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - 1);
        var startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - 7);

        var inst = jQuery("#startDate").data('datepicker');
        var dateFormat = inst.settings.dateFormat || jQuery.datepicker._defaults.dateFormat;
        jQuery('#startDate').val(jQuery.datepicker.formatDate(dateFormat, startDate, inst.settings));
        jQuery('#endDate').val(jQuery.datepicker.formatDate(dateFormat, endDate, inst.settings));
        jQuery("#timesheetList").submit();
    });

    jQuery(".timesheetTable input").change(function(){
        let colSum1 = 0; let colSum2 = 0; let colSum3 = 0; let colSum4 = 0;
        let colSum5 = 0; let colSum6 = 0; let colSum7 = 0;

        jQuery(".timesheetRow").each(function(i){
            var rowSum = 0;
            jQuery(this).find("input.hourCell").each(function(){
                var currentValue = parseFloat(jQuery(this).val());
                rowSum = Math.round((rowSum + currentValue)*100)/100;
                var currentClass = jQuery(this).parent().attr('class');
                if(currentClass.indexOf("rowday1") > -1){ colSum1 = colSum1 + currentValue; }
                if(currentClass.indexOf("rowday2") > -1){ colSum2 = colSum2 + currentValue; }
                if(currentClass.indexOf("rowday3") > -1){ colSum3 = colSum3 + currentValue; }
                if(currentClass.indexOf("rowday4") > -1){ colSum4 = colSum4 + currentValue; }
                if(currentClass.indexOf("rowday5") > -1){ colSum5 = colSum5 + currentValue; }
                if(currentClass.indexOf("rowday6") > -1){ colSum6 = colSum6 + currentValue; }
                if(currentClass.indexOf("rowday7") > -1){ colSum7 = colSum7 + currentValue; }
            });
            jQuery(this).find(".rowSum strong").text(rowSum);
        });

        jQuery("#day1").text(colSum1.toFixed(2)); jQuery("#day2").text(colSum2.toFixed(2));
        jQuery("#day3").text(colSum3.toFixed(2)); jQuery("#day4").text(colSum4.toFixed(2));
        jQuery("#day5").text(colSum5.toFixed(2)); jQuery("#day6").text(colSum6.toFixed(2));
        jQuery("#day7").text(colSum7.toFixed(2));

        var finalSum = colSum1 + colSum2 + colSum3 + colSum4 + colSum5 + colSum6 + colSum7;
        var roundedSum = Math.round((finalSum)*100)/100;
        jQuery("#finalSum").text(roundedSum);
    });
 });
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<!-- page header -->
<div class="pageheader">
    <div class="pageicon"><span class="fa-regular fa-clock"></span></div>
    <div class="pagetitle">
        <h5><?php echo __('headline.overview'); ?></h5>
        <h1><?php echo __('headline.my_timesheets'); ?></h1>
    </div>
</div>
<!-- page header -->

<div class="maincontent">
    <div class="maincontentinner">
        <?php echo $tpl->displayNotification(); ?>


        <form action="<?php echo e(BASE_URL); ?>/timesheets/showMy" method="post" id="timesheetList">
            <div class="btn-group viewDropDown pull-right">
                <button class="btn dropdown-toggle" data-toggle="dropdown">
                    <?php echo __('links.week_view'); ?> <?php echo __('links.view'); ?>

                </button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(BASE_URL); ?>/timesheets/showMy" class="active"><?php echo __('links.week_view'); ?></a></li>
                    <li><a href="<?php echo e(BASE_URL); ?>/timesheets/showMyList" ><?php echo __('links.list_view'); ?></a></li>
                </ul>
            </div>
            <div class="pull-left" style="padding-left:5px; margin-top:-3px;">

                <div class="padding-top-sm">
                    <span><?php echo __('label.week_from'); ?></span>
                    <a href="javascript:void(0)" style="font-size:16px;" id="prevWeek"><i class="fa fa-chevron-left"></i></a>
                    <input type="text" class="week-picker" name="startDate" autocomplete="off" id="startDate" placeholder="<?php echo e(__('language.dateformat')); ?>" value="<?php echo e($dateFrom->formatDateForUser()); ?>" style="margin-top:5px;"/>
                    <?php echo __('label.until'); ?>

                    <input type="text" class="week-picker" name="endDate" autocomplete="off" id="endDate" placeholder="<?php echo e(__('language.dateformat')); ?>" value="<?php echo e($dateFrom->addDays(6)->formatDateForUser()); ?>" style="margin-top:6px;"/>
                    <a href="javascript:void(0)" style="font-size:16px;" id="nextWeek"><i class="fa fa-chevron-right"></i></a>
                    <input type="hidden" name="search" value="1" />
                </div>

            </div>
            <table cellpadding="0" width="100%" class="table table-bordered display timesheetTable" id="dyntableX">
                <colgroup>
                      <col class="con0" >
                      <col class="con1" >
                      <col class="con0" >
                      <col class="con1" >
                      <col class="con0" >
                      <col class="con1" >
                      <col class="con0" >
                      <col class="con1" >
                      <col class="con0" >
                      <col class="con1">
                      <col class="con0">
                </colgroup>
                <thead>
                <?php
                    $days = explode(',', __('language.dayNamesShort'));
                    $days[] = array_shift($days);
                ?>
                <tr>
                    <th><?php echo __('label.client_product'); ?></th>
                    <th><?php echo __('subtitles.todo'); ?></th>
                    <th><?php echo __('label.type'); ?></th>
                    <?php $i = 0; ?>
                    <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th class="<?php if($dateFrom->addDays($i)->setToUserTimezone()->isToday()): ?> active <?php endif; ?>"><?php echo e($day); ?><br />
                            <?php echo e($dateFrom->addDays($i)->formatDateForUser()); ?>

                            <?php $i++; ?>
                        </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo __('label.total'); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $colSum = [
                            'day1' => 0, 'day2' => 0, 'day3' => 0, 'day4' => 0,
                            'day5' => 0, 'day6' => 0, 'day7' => 0,
                        ];
                    ?>
                    <?php $__currentLoopData = $allTimesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $timesheetId = 'new'; ?>
                            <tr class="gradeA timesheetRow">
                                <td width="14%"><?php echo e($timeRow['clientName']); ?> // <?php echo e($timeRow['name']); ?></td>
                                <td width="14%">
                                    <a href="#/tickets/showTicket/<?php echo e($timeRow['ticketId']); ?>"><?php echo e($timeRow['headline']); ?></a>
                                </td>
                                <td width="10%">
                                <?php echo __($kind[$timeRow['kind'] ?? 'GENERAL_BILLABLE'] ?? $kind['GENERAL_BILLABLE']); ?>

                            <?php if($timeRow['hasTimesheetOffset']): ?>
                                    <i class="fa-solid fa-clock-rotate-left pull-right label-blue"
                                       data-tippy-content="This entry was likely created using a different timezone. Only existing entries can be updated in this timezone">
                                    </i>
                            <?php endif; ?>
                                </td>

                            <?php $__currentLoopData = array_keys($timeRow); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(str_starts_with($dayKey, 'day')): ?>
                                    <?php $colSum[$dayKey] = ($colSum[$dayKey] ?? 0) + $timeRow[$dayKey]['hours']; ?>

                                        <td width="7%" class="row<?php echo e($dayKey); ?><?php if($timeRow[$dayKey]['start']->setToUserTimezone()->isToday()): ?> active <?php endif; ?>">

                                            <?php
                                                $inputNameKey = $timeRow['ticketId'] . '|' . $timeRow['kind'] . '|' . ($timeRow[$dayKey]['actualWorkDate'] ? $timeRow[$dayKey]['actualWorkDate']->formatDateForUser() : 'false') . '|' . ($timeRow[$dayKey]['actualWorkDate'] ? $timeRow[$dayKey]['actualWorkDate']->getTimestamp() : 'false');
                                            ?>
                                            <input type="text"
                                                   class="hourCell"
                                                   <?php if(empty($timeRow[$dayKey]['actualWorkDate'])): ?>
                                                       disabled="disabled"
                                                   <?php endif; ?>
                                                   name="<?php echo e($inputNameKey); ?>"
                                                   value="<?php echo e($timeRow[$dayKey]['hours']); ?>"
                                                    <?php if(empty($timeRow[$dayKey]['actualWorkDate'])): ?>
                                                        data-tippy-content="Cannot add time entry in previous timezone"
                                                    <?php endif; ?>
                                            />

                                            <?php if(! empty($timeRow[$dayKey]['description'])): ?>
                                                <i class="fa fa-circle-info" data-tippy-content="<?php echo e($tpl->escape($timeRow[$dayKey]['description'])); ?>"></i>
                                            <?php endif; ?>
                                        </td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <td width="7%" class="rowSum"><strong><?php echo e($timeRow['rowSum']); ?></strong></td>
                            </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- Row to add new time registration -->
                        <tr class="gradeA timesheetRow">
                            <td width="14%">
                                <div class="form-group" id="projectSelect">
                                    <select data-placeholder="<?php echo e(__('input.placeholders.choose_project')); ?>" style="" class="project-select" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $allProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo sprintf(
                                                $tpl->dispatchTplFilter(
                                                    'client_product_format',
                                                    '<option value="%s">%s / %s</option>'
                                                ),
                                                ...$tpl->dispatchTplFilter(
                                                    'client_product_values',
                                                    [
                                                        $projectRow['id'],
                                                        $tpl->escape($projectRow['clientName']),
                                                        $tpl->escape($projectRow['name']),
                                                    ]
                                                )
                                            ); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </td>
                            <td width="14%">
                                <div class="form-group" id="ticketSelect">
                                    <select data-placeholder="<?php echo e(__('input.placeholders.choose_todo')); ?>" style="" class="ticket-select" name="ticketId">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($ticketRow['id'], $existingTicketIds)): ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                            <?php echo sprintf(
                                                $tpl->dispatchTplFilter(
                                                    'todo_format',
                                                    '<option value="%1$s" data-value="%2$s" class="project_%2$s">%1$s / %3$s</option>'
                                                ),
                                                ...$tpl->dispatchTplFilter(
                                                    'todo_values',
                                                    [
                                                        $ticketRow['id'],
                                                        $ticketRow['projectId'],
                                                        $tpl->escape($ticketRow['headline']),
                                                    ]
                                                )
                                            ); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </td>
                            <td width="14%">
                                <select class="kind-select" name="kindId">
                                    <?php $__currentLoopData = $kind; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kindRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo __($kindRow); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>

                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td width="7%" class="rowday<?php echo e($i + 1); ?><?php if($dateFrom->addDays($i)->setToUserTimezone()->isToday()): ?> active <?php endif; ?>">
                                    <input type="text" class="hourCell" name="new|GENERAL_BILLABLE|<?php echo e($dateFrom->addDays($i)->formatDateForUser()); ?>|<?php echo e($dateFrom->addDays($i)->getTimestamp()); ?>" value="0" />
                                </td>
                                <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                </tbody>

                <tfoot>
                    <tr style="font-weight:bold;">
                        <td colspan="3"><?php echo __('label.total'); ?></td>
                        <?php $totalHours = 0; ?>
                        <?php $__currentLoopData = $colSum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $totalHours += $col; ?>
                            <td id="<?php echo e($key); ?>"><?php echo e($col); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td id="finalSum"><?php echo e($totalHours); ?></td>
                    </tr>
                </tfoot>
            </table>
            <div class="right">
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => 'Save','name' => 'saveTimeSheet','class' => 'saveTimesheetBtn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => 'Save','name' => 'saveTimeSheet','class' => 'saveTimesheetBtn']); ?>
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
            <div class="clearall"></div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Timesheets/Templates/showMy.blade.php ENDPATH**/ ?>