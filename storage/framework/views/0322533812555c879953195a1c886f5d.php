<?php
    $projectData = $projectData ?? [];
    $todoTypeIcons = $ticketTypeIcons ?? [];
?>

<div style="min-width:90%">
        <h1><?php echo __('headlines.new_to_do'); ?></h1>

        <?php echo $tpl->displayNotification(); ?>


        <div class="tabbedwidget tab-primary ticketTabs" style="visibility:hidden;">

            <ul>
                <li><a href="#ticketdetails"><?php echo __('tabs.ticketDetails'); ?></a></li>
            </ul>

            <div id="ticketdetails">
                <form class="formModal" action="<?php echo e(BASE_URL); ?>/tickets/newTicket" method="post">
                    <?php echo $__env->make('tickets::submodules.ticketDetails', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </form>
            </div>

        </div>
</div>
        <br />


<script type="text/javascript">


    jQuery(document).ready(function(){

        <?php if(isset($_GET['closeModal'])): ?>
        jQuery.nmTop().close();
        <?php endif; ?>

        leantime.ticketsController.initTicketTabs();

        <?php if($login::userIsAtLeast($roles::$editor)): ?>

            leantime.ticketsController.initDueDateTimePickers();

            leantime.dateController.initDatePicker(".dates");
            leantime.dateController.initDateRangePicker(".editFrom", ".editTo");

            leantime.ticketsController.initTagsInput();

            leantime.ticketsController.initEffortDropdown();
            leantime.ticketsController.initStatusDropdown();

        jQuery(".ticketTabs select").chosen();

        <?php else: ?>
            leantime.authController.makeInputReadonly(".nyroModalCont");

        <?php endif; ?>

        <?php if($login::userHasRole([$roles::$commenter])): ?>
            leantime.commentsController.enableCommenterForms();
        <?php endif; ?>

    });

</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/newTicketModal.blade.php ENDPATH**/ ?>