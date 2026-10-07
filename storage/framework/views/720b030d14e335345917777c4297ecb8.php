<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'includeTitle' => true,
    'calendar' => [],
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
    'calendar' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php $tpl->dispatchTplEvent('beforeCalendar'); ?>


<div class="clear minCalendar" style="position:absolute; top:10px; right:35px;">

    <button class="btn btn-link btn-round-icon dropdown-toggle f-right" type="button" data-tippy-content="<?php echo e(__('text.calendar_view')); ?>"
            data-toggle="dropdown"> <i class="fa-solid fa-calendar-week"></i></button>
    <ul class="dropdown-menu pull-right">
        <li>
            <a class="fc-agendaDay-button fc-button fc-state-default fc-corner-right calendarViewSelect" href="javascript:void(0);"
               data-value="multiMonthOneMonth"
               <?php if($tpl->getToggleState("dashboardCalendarView") == 'multiMonthOneMonth'): ?> selected='selected' <?php endif; ?>>ماه</a>
        </li>
        <li>
            <a class="fc-timeGridWeek-button fc-button fc-state-default fc-corner-right calendarViewSelect" href="javascript:void(0);"
               data-value="timeGridWeek" <?php if($tpl->getToggleState("dashboardCalendarView") == 'timeGridWeek'): ?> selected='selected' <?php endif; ?>>هفته</a>
        </li>
        <li>
            <a class="fc-agendaWeek-button fc-button fc-state-default calendarViewSelect" href="javascript:void(0);"
               data-value="timeGridDay" <?php if($tpl->getToggleState("dashboardCalendarView") == 'timeGridDay' || empty($tpl->getToggleState("dashboardCalendarView")) ): ?> selected='selected' <?php endif; ?>>روز</a>
        </li>
        <li><a class="fc-agendaWeek-button fc-button fc-state-default calendarViewSelect" href="javascript:void(0);"
               data-value="listWeek" <?php if($tpl->getToggleState("dashboardCalendarView") == 'listWeek'): ?> selected='selected' <?php endif; ?>>فهرست</a></li>
    </ul>

</div>

<div class="tw-h-full minCalendar">
    <div class="clear"></div>
    <div class="fc-toolbar tw-z-10">
        <div class="fc-left tw-flex">
            <div class="day-selector tw-w-full tw-flex tw-gap-2 tw-mb-4 tw-justify-between"
                 <?php
                     $currentView = $tpl->getToggleState("dashboardCalendarView") ?: 'timeGridDay';
                 ?>
                 <?php if($currentView !== 'timeGridDay'): ?> style="display:none" <?php endif; ?>>
                <?php
                    $today = dtHelper()->userNow();
                    $startOfWeek = dtHelper()->userNow()->startOf("week");
                    $week = [];
                    for($i = 0; $i < 7; $i++) {
                        $date = $startOfWeek->modify("+$i days");
                        $week[] = $date;
                    }
                ?>
                <?php $__currentLoopData = $week; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="day-button tw-rounded-md tw-w-12 tw-h-12 tw-flex tw-flex-col tw-items-center tw-justify-center tw-text-sm <?php echo e($day->format('Y-m-d') === $today->format('Y-m-d') ? 'today active' : ''); ?>" data-date="<?php echo e($day->format('Y-m-d')); ?>">
                        <span class="tw-text-xs"><?php echo e($day->format('D')); ?></span>
                        <span class="tw-font-medium"><?php echo e($day->format('d')); ?></span>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="minCalendarWrapper">
    </div>
</div>

<script>

        var eventSources = [];

        var events = {events: [
            <?php $__currentLoopData = $calendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {

                title: <?php echo json_encode($event['title']); ?>,

                start: new Date(<?php echo e(format($event['dateFrom'])->jsTimestamp()); ?>),
                <?php if(isset($event['dateTo'])): ?>
                    end: new Date(<?php echo e(format($event['dateTo'])->jsTimestamp()); ?>),
                <?php endif; ?>
                <?php if((isset($event['allDay']) && $event['allDay'] === true)): ?>
                    allDay: true,
                <?php else: ?>
                    allDay: false,
                <?php endif; ?>
                enitityId: <?php echo e($event['id']); ?>,
                <?php if(isset($event['eventType']) && $event['eventType'] == 'calendar'): ?>
                    url: '#/calendar/editEvent/<?php echo e($event['id']); ?>',
                    backgroundColor: '<?php echo e($event['backgroundColor'] ?? "var(--accent2)"); ?>',
                    borderColor: '<?php echo e($event['borderColor'] ?? "var(--accent2)"); ?>',
                    enitityType: "event",
                <?php else: ?>
                    url: '#/tickets/showTicket/<?php echo e($event['id']); ?>?projectId=<?php echo e($event['projectId']); ?>',
                    backgroundColor: '<?php echo e($event['backgroundColor'] ?? "var(--accent2)"); ?>',
                    borderColor: '<?php echo e($event['borderColor'] ?? "var(--accent2)"); ?>',
                    enitityType: "ticket",
                <?php endif; ?>
            },
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]};

        eventSources.push(events);

        <?php
        $externalCalendars = $externalCalendars ?? [];

        foreach ($externalCalendars as $externalCalendar) { ?>
            eventSources.push(
                {
                    url: '<?= BASE_URL ?>/calendar/externalCal/<?= $externalCalendar['id'] ?>',
                    format: 'ics',
                    color: '<?= $externalCalendar['colorClass'] ?>',
                    editable: false,
                }
            );
        <?php } ?>

        var initialView =   '<?php echo e($tpl->getToggleState("dashboardCalendarView") ? $tpl->getToggleState("dashboardCalendarView") : "timeGridDay"); ?>';
        leantime.calendarController.initWidgetCalendar(".minCalendarWrapper", initialView)



    <?php $tpl->dispatchTplEvent('scripts.beforeClose'); ?>

</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Widgets/Templates/partials/calendar.blade.php ENDPATH**/ ?>