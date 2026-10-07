<?php $__env->startSection('content'); ?>

<?php
if (! session()->exists('usersettings.submenuToggle.myCalendarView')) {
    session(['usersettings.submenuToggle.myCalendarView' => 'dayGridMonth']);
}
?>

<?php $tpl->dispatchTplEvent('beforePageHeaderOpen'); ?>
<div class="pageheader">
    <?php $tpl->dispatchTplEvent('afterPageHeaderOpen'); ?>
    <div class="pageicon"><span class="fa <?php echo e($tpl->getModulePicture()); ?>"></span></div>
    <div class="pagetitle">
        <h5><?php echo __('headline.calendar'); ?></h5>
        <h1><?php echo __('headline.my_calendar'); ?></h1>
    </div>
    <?php $tpl->dispatchTplEvent('beforePageHeaderClose'); ?>
</div><!--pageheader-->
<?php $tpl->dispatchTplEvent('afterPageHeaderClose'); ?>

<?php echo $tpl->displayNotification(); ?>


<div class="maincontent">

    <div class="row">
        <div class="col-md-2">
            <div class="maincontentinner">
                <h5 class="subtitle tw-pb-m">Calendars</h5>

                <ul class="simpleList">
                    <li><span class="indicatorCircle" style="background:var(--accent1)"></span>Events</li>
                    <li><span class="indicatorCircle" style="background:var(--accent2)"></span>Projects & Tasks</li>

                <?php $__currentLoopData = $externalCalendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendars): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php if(empty($calendars['managedByPlugin'])): ?>
                        <div class="inlineDropDownContainer" style="float:right;">
                            <a href="javascript:void(0);" class="dropdown-toggle ticketDropDown editHeadline" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#/calendar/editExternal/<?php echo e($calendars['id']); ?>"><i class="fa-solid fa-pen-to-square"></i> <?php echo __('links.edit_calendar'); ?></a>
                                </li>
                                <li><a href="#/calendar/delExternalCalendar/<?php echo e($calendars['id']); ?>" class="delete"><i class="fa fa-trash"></i> <?php echo __('links.delete_external_calendar'); ?></a></li>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <span class="indicatorCircle" style="background:<?php echo e($calendars['colorClass']); ?>"></span><?php echo e($calendars['name']); ?>


                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
                <hr />
                <a href="#/calendar/connectCalendar" class="formModal" style="display:block; margin-bottom:8px; margin-left:-5px;"><i class="fa-regular fa-calendar-plus" style="width:16px;"></i> <?php echo __('label.connect_calendar'); ?></a>
                <a href="#/calendar/calendarSettings" class="formModal" style="margin-left:-5px;"><i class="fa fa-cog" style="width:16px;"></i> <?php echo __('label.calendar_settings'); ?></a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="maincontentinner">
                <div class="row">
                    <div class="col-md-4">
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/calendar/addEvent','contentRole' => 'primary','class' => 'formModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/calendar/addEvent','contentRole' => 'primary','class' => 'formModal']); ?><i class='fa fa-plus'></i> <?php echo __('buttons.add_event'); ?> <?php echo $__env->renderComponent(); ?>
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
                    <div class="col-md-4">
                        <div class="fc-center center" id="calendarTitle" style="padding-top:5px;">
                            <h2>..</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/calendar/export','contentRole' => 'default','class' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/calendar/export','contentRole' => 'default','class' => 'right']); ?>Export <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                        <button class="fc-next-button btn btn-default right" type="button" style="margin-right:5px;">
                            <span class="fc-icon fc-icon-chevron-right"></span>
                        </button>
                        <button class="fc-prev-button btn btn-default right" type="button" style="margin-right:5px;">
                            <span class="fc-icon fc-icon-chevron-left"></span>
                        </button>

                        <button class="fc-today-button btn btn-default right" style="margin-right:5px;">today</button>


                        <select id="my-select" style="margin-right:5px;" class="right">
                            <option class="fc-timeGridDay-button fc-button fc-state-default fc-corner-right" value="timeGridDay" <?php echo e(session('usersettings.submenuToggle.myCalendarView') == 'timeGridDay' ? 'selected' : ''); ?>>Day</option>
                            <option class="fc-timeGridWeek-button fc-button fc-state-default fc-corner-right" value="timeGridWeek" <?php echo e(session('usersettings.submenuToggle.myCalendarView') == 'timeGridWeek' ? 'selected' : ''); ?>>Week</option>
                            <option class="fc-dayGridMonth-button fc-button fc-state-default fc-corner-right" value="dayGridMonth" <?php echo e(session('usersettings.submenuToggle.myCalendarView') == 'dayGridMonth' ? 'selected' : ''); ?>>Month</option>
                            <option class="fc-multiMonthYear-button fc-button fc-state-default fc-corner-right" value="multiMonthYear" <?php echo e(session('usersettings.submenuToggle.myCalendarView') == 'multiMonthYear' ? 'selected' : ''); ?>>Year</option>
                        </select>
                    </div>
                </div>
                <div id="calendar"></div>
            </div>
        </div>
    </div>


</div>

<?php if (! $__env->hasRenderedOnce('a2674ab1-80af-4065-b9d6-0a3b6c8d868a')): $__env->markAsRenderedOnce('a2674ab1-80af-4065-b9d6-0a3b6c8d868a'); ?>
<?php $__env->startPush('scripts'); ?>
<script type='text/javascript'>

    <?php $tpl->dispatchTplEvent('scripts.afterOpen'); ?>


    jQuery(document).ready(function() {

        //leantime.calendarController.initCalendar(events);
        leantime.calendarController.initExportModal();

    });
    var eventSources = [];

    var events = {events: [
        <?php $__currentLoopData = $calendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendarEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
            title: <?php echo json_encode($calendarEvent['title']); ?>,

            start: new Date(<?php echo e(format($calendarEvent['dateFrom'])->jsTimestamp()); ?>),
            <?php if(isset($calendarEvent['dateTo'])): ?>
            end: new Date(<?php echo e(format($calendarEvent['dateTo'])->jsTimestamp()); ?>),
            <?php endif; ?>
            <?php if(isset($calendarEvent['allDay']) && $calendarEvent['allDay'] === true): ?>
            allDay: true,
            <?php else: ?>
            allDay: false,
            <?php endif; ?>
            enitityId: <?php echo e($calendarEvent['id']); ?>,
            <?php if(isset($calendarEvent['eventType']) && $calendarEvent['eventType'] == 'calendar'): ?>
            url: '<?php echo e(CURRENT_URL); ?>#/calendar/editEvent/<?php echo e($calendarEvent['id']); ?>',
            backgroundColor: '<?php echo e($calendarEvent['backgroundColor'] ?? 'var(--accent2)'); ?>',
            borderColor: '<?php echo e($calendarEvent['borderColor'] ?? 'var(--accent2)'); ?>',
            enitityType: "event",
            dateContext: '<?php echo e($calendarEvent['dateContext'] ?? 'plan'); ?>',
            <?php else: ?>
            url: '<?php echo e(CURRENT_URL); ?>#/tickets/showTicket/<?php echo e($calendarEvent['id']); ?>?projectId=<?php echo e($calendarEvent['projectId']); ?>',
            backgroundColor: '<?php echo e($calendarEvent['backgroundColor'] ?? 'var(--accent2)'); ?>',
            borderColor: '<?php echo e($calendarEvent['borderColor'] ?? 'var(--accent2)'); ?>',
            enitityType: "ticket",
            dateContext: '<?php echo e($calendarEvent['dateContext'] ?? 'edit'); ?>',
            <?php endif; ?>
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ]};

    eventSources.push(events);

    <?php $__currentLoopData = $externalCalendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $externalCalendar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(empty($externalCalendar['managedByPlugin'])): ?>
        eventSources.push(
            {
                url: '<?php echo e(BASE_URL); ?>/calendar/externalCal/<?php echo e($externalCalendar['id']); ?>',
                format: 'ics',
                color: '<?php echo e($externalCalendar['colorClass']); ?>',
                editable: false,
            }
        );
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    document.addEventListener('DOMContentLoaded', function() {
        const heightWindow = jQuery("body").height() - 210;

        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: leantime.i18n.__("usersettings.timezone"),
                height: 'calc(100% - 40px)',
                stickyHeaderDates: true,
                initialView: '<?php echo e(session('usersettings.submenuToggle.myCalendarView')); ?>',
                eventSources:eventSources,
                editable: true,
                headerToolbar: false,
                dayHeaderFormat: leantime.dateHelper.getFormatFromSettings("dateformat", "luxon"),
                eventTimeFormat: leantime.dateHelper.getFormatFromSettings("timeformat", "luxon"),
                slotLabelFormat: leantime.dateHelper.getFormatFromSettings("timeformat", "luxon"),
                firstDay: leantime.i18n.__("language.firstDayOfWeek"),
                views: {
                    timeGridDay: {

                    },
                    timeGridWeek: {

                    },
                    dayGridMonth: {
                        dayHeaderFormat: { weekday: 'short' },
                    },
                    multiMonthYear: {
                        showNonCurrentDates: true,
                        multiMonthTitleFormat: { month: 'long', year: 'numeric' },
                        dayHeaderFormat: { weekday: 'short' },
                    },
                    multiMonthOneMonth: {
                        type: 'multiMonth',
                        duration: {months: 1},
                        multiMonthTitleFormat: {month: 'long', year: 'numeric'},
                        dayHeaderFormat: {weekday: 'short'},
                    },
                    listWeek: {
                        listDayFormat: {weekday: 'long'},
                        listDaySideFormat: leantime.dateHelper.getFormatFromSettings("dateformat", "luxon"),
                    }
                },
                nowIndicator: true,
                bootstrapFontAwesome: {
                    close: 'fa-times',
                    prev: 'fa-chevron-left',
                    next: 'fa-chevron-right',
                    prevYear: 'fa-angle-double-left',
                    nextYear: 'fa-angle-double-right'
                },
                eventDrop: function (event) {

                    if(event.event.extendedProps.enitityType == "ticket") {

                        let dataVal = {};

                        if(event.event.extendedProps.dateContext == "due") {

                            dataVal = {
                                id: event.event.extendedProps.enitityId,
                                dateToFinish: event.event.startStr
                            }

                        }else{
                            dataVal = {
                                id: event.event.extendedProps.enitityId,
                                editFrom: event.event.startStr,
                                editTo: event.event.endStr
                            }
                        }

                        leantime.rpc('Tickets.Tickets.patchTicket', { id: dataVal.id, values: dataVal })
                            .catch(function (error) {
                                jQuery.growl({ message: (error && error.message) ? error.message : leantime.i18n.__("short_notifications.not_saved"), style: "error" });
                                event.revert();
                                console.error('Could not update ticket dates', error);
                            });

                    }else if(event.event.extendedProps.enitityType == "event") {

                        leantime.rpc('Calendar.Calendar.patch', {
                            id: event.event.extendedProps.enitityId,
                            params: {
                                dateFrom: event.event.startStr,
                                dateTo: event.event.endStr
                            }
                        }).then(function (success) {
                            // Denied/failed update resolves to false — undo the visual move.
                            if (! success) { event.revert(); }
                        }).catch(function (error) {
                            console.error('Could not update event dates', error);
                            event.revert();
                        })
                    }
                },
                eventResize: function (event) {

                    if(event.event.extendedProps.enitityType == "ticket") {

                        let dataVal = {};

                        if(event.event.extendedProps.dateContext == "due") {

                            dataVal = {
                                id: event.event.extendedProps.enitityId,
                                dateToFinish: event.event.startStr
                            }

                        }else{
                            dataVal = {
                                id: event.event.extendedProps.enitityId,
                                editFrom: event.event.startStr,
                                editTo: event.event.endStr
                            }
                        }

                        leantime.rpc('Tickets.Tickets.patchTicket', { id: dataVal.id, values: dataVal })
                            .catch(function (error) {
                                jQuery.growl({ message: (error && error.message) ? error.message : leantime.i18n.__("short_notifications.not_saved"), style: "error" });
                                event.revert();
                                console.error('Could not update ticket dates', error);
                            });


                    }else if(event.event.extendedProps.enitityType == "event") {

                        leantime.rpc('Calendar.Calendar.patch', {
                            id: event.event.extendedProps.enitityId,
                            params: {
                                dateFrom: event.event.startStr,
                                dateTo: event.event.endStr
                            }
                        }).then(function (success) {
                            // Denied/failed update resolves to false — undo the visual move.
                            if (! success) { event.revert(); }
                        }).catch(function (error) {
                            console.error('Could not update event dates', error);
                            event.revert();
                        })
                    }

                },
                eventMouseEnter: function() {
                },

            }
            );
        calendar.setOption('locale', leantime.i18n.__("language.code"));
        calendar.render();
        calendar.scrollToTime( Date.now() );
        jQuery("#calendarTitle h2").text(calendar.getCurrentData().viewTitle);

        jQuery('.fc-prev-button').click(function() {
            calendar.prev();
            calendar.getCurrentData()
            jQuery("#calendarTitle h2").text(calendar.getCurrentData().viewTitle);
        });
        jQuery('.fc-next-button').click(function() {
            calendar.next();
            jQuery("#calendarTitle h2").text(calendar.getCurrentData().viewTitle);
        });
        jQuery('.fc-today-button').click(function() {
            calendar.today();
            jQuery("#calendarTitle h2").text(calendar.getCurrentData().viewTitle);
        });
        jQuery("#my-select").on("change", function(e){

            calendar.changeView(jQuery("#my-select option:selected").val());

            leantime.rpc('Api.Api.setSubmenuState', {
                submenu: "myCalendarView",
                state: jQuery("#my-select option:selected").val()
            }).catch(function (e) { console.error('Could not update submenu state', e); });

        });
    });

    <?php $tpl->dispatchTplEvent('scripts.beforeClose'); ?>

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<style type="text/css">
    .maincontent .maincontentinner {
        height:calc(100vh - 165px);
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Calendar/Templates/showMyCalendar.blade.php ENDPATH**/ ?>