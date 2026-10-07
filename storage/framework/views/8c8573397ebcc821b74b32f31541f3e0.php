<?php

foreach ($__data as $var => $val) {
    $$var = $val; // necessary for blade refactor
}
$ticket = $ticket ?? null;
$projectData = $projectData ?? [];
$todoTypeIcons = $ticketTypeIcons ?? [];

?>
<script type="text/javascript">
    window.onload = function() {
        if (!window.jQuery) {
            //It's not a modal
            location.href="<?= BASE_URL ?>/tickets/showKanban?showTicketModal=<?php echo $ticket->id; ?>";
        }
    }
</script>

<div style="min-width:70%">

    <?php if ($ticket->dependingTicketId > 0) { ?>
        <small><a href="#/tickets/showTicket/<?= $ticket->dependingTicketId ?>"><?= $tpl->escape($ticket->parentHeadline) ?></a></small> //
    <?php } ?>
    <small class="tw-float-right tw-pr-md" style="padding:5px 30px 0px 0px">Created by <?php $tpl->e($ticket->userFirstname); ?> <?php $tpl->e($ticket->userLastname); ?> | Last Updated: <?= format($ticket->date)->date(); ?> </small>
    <h1 class="tw-mb-0" style="margin-bottom:0px;"><i class="fa <?php echo $todoTypeIcons[strtolower($ticket->type)] ?? 'fa-circle'; ?>"></i> #<?= $ticket->id ?> - <?php $tpl->e($ticket->headline); ?></h1>

    <br />

    <?php if ($login::userIsAtLeast($roles::$editor)) {
        $onTheClock = $onTheClock ?? false;
        ?>
        <div class="inlineDropDownContainer" style="float:right; z-index:50; padding-top:10px; padding-right:10px;">

            <a href="javascript:void(0);" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="nav-header"><?php echo $tpl->__('subtitles.todo'); ?></li>
                <li><a href="#/tickets/moveTicket/<?php echo $ticket->id; ?>" class="moveTicketModal sprintModal ticketModal"><i class="fa-solid fa-arrow-right-arrow-left"></i> <?php echo $tpl->__('links.move_todo'); ?></a></li>
                <li><a href="#/tickets/delTicket/<?php echo $ticket->id; ?>" class="delete"><i class="fa fa-trash"></i> <?php echo $tpl->__('links.delete_todo'); ?></a></li>
                <li class="nav-header border"><?php echo $tpl->__('subtitles.track_time'); ?></li>
                <li id="timerContainer-ticketDetails-<?php echo e($ticket->id); ?>"
                    hx-get="<?php echo e(BASE_URL); ?>/tickets/timerButton/get-status/<?php echo e($ticket->id); ?>"
                    hx-trigger="timerUpdate from:body"
                    hx-swap="outerHTML"
                    class="timerContainer">

                    <?php if($onTheClock === false): ?>
                        <a href="javascript:void(0);" data-value="<?php echo e($ticket->id); ?>"
                           hx-patch="<?php echo e(BASE_URL); ?>/hx/timesheets/stopwatch/start-timer/"
                           hx-target="#timerHeadMenu"
                           hx-swap="outerHTML"
                           hx-vals='{"ticketId": "<?php echo e($ticket->id); ?>", "action":"start"}'>
                            <span class="fa-regular fa-clock"></span> <?php echo e(__("links.start_work")); ?>

                        </a>
                    <?php endif; ?>

                    <?php if($onTheClock !== false && $onTheClock["id"] == $ticket->id): ?>
                        <a href="javascript:void(0);" data-value="<?php echo e($ticket->id); ?>"
                           hx-patch="<?php echo e(BASE_URL); ?>/hx/timesheets/stopwatch/stop-timer/"
                           hx-target="#timerHeadMenu"
                           hx-vals='{"ticketId": "<?php echo e($ticket->id); ?>", "action":"stop"}'
                           hx-swap="outerHTML">
                            <span class="fa fa-stop"></span>

                            <?php if(is_array($onTheClock) == true): ?>
                                <?php echo sprintf(__("links.stop_work_started_at"), date(__("language.timeformat"), $onTheClock["since"])); ?>

                            <?php else: ?>
                                <?php echo sprintf(__("links.stop_work_started_at"), date(__("language.timeformat"), time())); ?>

                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                    <?php if($onTheClock !== false && $onTheClock["id"] != $ticket->id): ?>
                        <span class='working'>
            <?php echo e(__("text.timer_set_other_todo")); ?>

        </span>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    <?php } ?>
    <div class="tabbedwidget tab-primary ticketTabs" style="visibility:hidden;">

        <ul>
            <li><a href="#ticketdetails"><span class="fa fa-star"></span> <?php echo $tpl->__('tabs.ticketDetails') ?></a></li>
            <li><a href="#files"><span class="fa fa-file"></span> <?php echo $tpl->__('tabs.files') ?> (<?php echo $numFiles; ?>)</a></li>
            <?php if ($login::userIsAtLeast($roles::$editor)) {  ?>
                <li><a href="#timesheet"><span class="fa fa-clock"></span> <?php echo $tpl->__('tabs.time_tracking') ?></a></li>
            <?php } ?>
            <?php $tpl->dispatchTplEvent('ticketTabs', ['ticket' => $ticket]); ?>
        </ul>

        <div id="ticketdetails">
            <form class="formModal" action="<?php echo e(BASE_URL); ?>/tickets/showTicket/<?php echo e($ticket->id); ?>" method="post">
                <?php echo $__env->make('tickets::submodules.ticketDetails', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </div>

        <div id="files">
            <?php echo $__env->make('files::submodules.showAll', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <?php if($login::userIsAtLeast($roles::$editor)): ?>
            <div id="timesheet">
                <?php echo $__env->make('tickets::submodules.timesheet', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        <?php endif; ?>

        <?php $tpl->dispatchTplEvent('ticketTabsContent', ['ticket' => $ticket]); ?>

    </div>

</div>
<script type="text/javascript">

    jQuery(document).ready(function(){

        <?php if (isset($_GET['closeModal'])) { ?>
            jQuery.nmTop().close();
        <?php } ?>

        leantime.ticketsController.initTicketTabs();

        <?php if ($login::userIsAtLeast($roles::$editor)) { ?>
            leantime.ticketsController.initAsyncInputChange();
            leantime.ticketsController.initDueDateTimePickers();

            leantime.dateController.initDatePicker(".dates");
            leantime.dateController.initDateRangePicker(".editFrom", ".editTo");

            leantime.ticketsController.initTagsInput();

            leantime.ticketsController.initEffortDropdown();
            leantime.ticketsController.initStatusDropdown();

            jQuery(".ticketTabs select").chosen();

        <?php } else { ?>
            leantime.authController.makeInputReadonly(".nyroModalCont");

        <?php } ?>

        <?php if ($login::userHasRole([$roles::$commenter])) { ?>
            leantime.commentsController.enableCommenterForms();
        <?php }?>

    });

</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/showTicketModal.blade.php ENDPATH**/ ?>