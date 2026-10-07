<?php $__env->startSection('content'); ?>

<?php
    $milestones = $milestones ?? [];
    if (! session()->exists('usersettings.submenuToggle.myProjectCalendarView')) {
        session(['usersettings.submenuToggle.myProjectCalendarView' => 'dayGridMonth']);
    }
?>

<?php echo $tpl->displayNotification(); ?>


<?php echo $__env->make('tickets::submodules.timelineHeader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="maincontent">
    <?php echo $__env->make('tickets::submodules.timelineTabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="maincontentinner">

        
        <div class="row">
            
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="fc-center center" id="calendarTitle" style="padding-top:5px;">
                    <h2>..</h2>
                </div>
            </div>
            <div class="col-md-4">

                <button class="fc-next-button btn btn-default right" type="button" style="margin-right:5px;">
                    <span class="fc-icon fc-icon-chevron-right"></span>
                </button>
                <button class="fc-prev-button btn btn-default right" type="button" style="margin-right:5px;">
                    <span class="fc-icon fc-icon-chevron-left"></span>
                </button>

                <button class="fc-today-button btn btn-default right" style="margin-right:5px;">today</button>


                <select id="my-select" style="margin-right:5px;" class="right">
                    <option class="fc-timeGridDay-button fc-button fc-state-default fc-corner-right" value="timeGridDay" <?php echo e(session('usersettings.submenuToggle.myProjectCalendarView') == 'timeGridDay' ? 'selected' : ''); ?>>Day</option>
                    <option class="fc-timeGridWeek-button fc-button fc-state-default fc-corner-right" value="timeGridWeek" <?php echo e(session('usersettings.submenuToggle.myProjectCalendarView') == 'timeGridWeek' ? 'selected' : ''); ?>>Week</option>
                    <option class="fc-dayGridMonth-button fc-button fc-state-default fc-corner-right" value="dayGridMonth" <?php echo e(session('usersettings.submenuToggle.myProjectCalendarView') == 'dayGridMonth' ? 'selected' : ''); ?>>Month</option>
                    <option class="fc-multiMonthYear-button fc-button fc-state-default fc-corner-right" value="multiMonthYear" <?php echo e(session('usersettings.submenuToggle.myProjectCalendarView') == 'multiMonthYear' ? 'selected' : ''); ?>>Year</option>
                </select>

            </div>

        </div>
        <div class="calendar-wrapper">
            <div id="calendar"></div>
        </div>

    </div>
</div>

<?php if (! $__env->hasRenderedOnce('725bd4fc-0ace-443d-b687-e206125b131a')): $__env->markAsRenderedOnce('725bd4fc-0ace-443d-b687-e206125b131a'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    jQuery(document).ready(function(){


    <?php if(isset($_GET['showMilestoneModal'])): ?>
        <?php
            $modalUrl = $_GET['showMilestoneModal'] == '' ? '' : '/'.(int) $_GET['showMilestoneModal'];
        ?>

        leantime.ticketsController.openMilestoneModalManually("<?php echo e(BASE_URL); ?>/tickets/editMilestone<?php echo e($modalUrl); ?>");
        window.history.pushState({},document.title, '<?php echo e(BASE_URL); ?>/tickets/roadmap');

    <?php endif; ?>


});


    var events = [
        <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mlst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $headline = __('label.'.strtolower($mlst->type)).': '.$mlst->headline;
                if ($mlst->type == 'milestone') {
                    $headline .= ' ('.$mlst->percentDone.'% Done)';
                }

                $color = '#8D99A6';
                if ($mlst->type == 'milestone') {
                    $color = $mlst->tags;
                }

                $sortIndex = 0;
                if ($mlst->sortIndex != '' && is_numeric($mlst->sortIndex)) {
                    $sortIndex = $mlst->sortIndex;
                }

                $dependencyList = [];
                if ($mlst->milestoneid != 0) {
                    $dependencyList[] = $mlst->milestoneid;
                }

                if ($mlst->dependingTicketId != 0) {
                    $dependencyList[] = $mlst->dependingTicketId;
                }
            ?>

        {

            title: <?php echo json_encode($headline, 15, 512) ?>,

            <?php if(dtHelper()->isValidDateString($mlst->dateToFinish)): ?>
                start: new Date(<?php echo e(format($mlst->dateToFinish)->jsTimestamp()); ?>),
                end: new Date(<?php echo e(format(dtHelper()->parseDbDateTime($mlst->dateToFinish)->addHour(1))->jsTimestamp()); ?>),
            <?php elseif(dtHelper()->isValidDateString($mlst->editFrom)): ?>
                start: new Date(<?php echo e(format($mlst->editFrom)->jsTimestamp()); ?>),
                end: new Date(<?php echo e(format($mlst->editTo)->jsTimestamp()); ?>),
            <?php endif; ?>


            enitityId: <?php echo e($mlst->id); ?>,
            <?php if($mlst->type == 'milestone'): ?>
            url: '#/tickets/editMilestone/<?php echo e($mlst->id); ?>',
            color: '<?php echo e($color); ?>',
            enitityType: "milestone",
            allDay: true,
            <?php else: ?>
            url: '#/tickets/showTicket/<?php echo e($mlst->id); ?>',
            color: '<?php echo e($color); ?>',
            enitityType: "ticket",
            allDay: false,
            <?php endif; ?>

        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];



    document.addEventListener('DOMContentLoaded', function() {
        const heightWindow = jQuery("body").height() - 190;

        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: leantime.i18n.__("usersettings.timezone"),
                height:heightWindow,
                initialView: '<?php echo e(session('usersettings.submenuToggle.myProjectCalendarView')); ?>',
                events: events,
                editable: true,
                headerToolbar: false,
                dayHeaderFormat: leantime.dateHelper.getFormatFromSettings("dateformat", "luxon"),
                eventTimeFormat: leantime.dateHelper.getFormatFromSettings("timeformat", "luxon"),
                slotLabelFormat: leantime.dateHelper.getFormatFromSettings("timeformat", "luxon"),
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

                    leantime.rpc('Tickets.Tickets.patchTicket', {
                        id: event.event.extendedProps.enitityId,
                        values: {
                            editFrom: event.event.startStr,
                            editTo: event.event.endStr
                        }
                    }).catch(function (error) {
                        jQuery.growl({ message: (error && error.message) ? error.message : leantime.i18n.__("short_notifications.not_saved"), style: "error" });
                        event.revert();
                        console.error('Could not update ticket dates', error);
                    });
                },
                eventResize: function (event) {

                    leantime.rpc('Tickets.Tickets.patchTicket', {
                        id: event.event.extendedProps.enitityId,
                        values: {
                            editFrom: event.event.startStr,
                            editTo: event.event.endStr
                        }
                    }).catch(function (error) {
                        jQuery.growl({ message: (error && error.message) ? error.message : leantime.i18n.__("short_notifications.not_saved"), style: "error" });
                        event.revert();
                        console.error('Could not update ticket dates', error);
                    })

                },
                eventMouseEnter: function() {
                }
            }
        );
        calendar.setOption('locale', leantime.i18n.__("language.code"));
        calendar.render();
        calendar.scrollToTime( 100 );
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
                submenu: "myProjectCalendarView",
                state: jQuery("#my-select option:selected").val()
            }).catch(function (e) { console.error('Could not update submenu state', e); });

        });
    });


</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/calendar.blade.php ENDPATH**/ ?>