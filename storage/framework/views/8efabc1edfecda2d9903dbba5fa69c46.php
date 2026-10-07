<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'parentTicketId' => false,
    'onTheClock' => false,
    'style' => 'simple' //simple just the button, full witrh button text
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
    'parentTicketId' => false,
    'onTheClock' => false,
    'style' => 'simple' //simple just the button, full witrh button text
 ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div id="timer-button-container-<?php echo e($parentTicketId); ?>"
    hx-get="<?php echo e(BASE_URL); ?>/tickets/timerButton/get-status-button/<?php echo e($parentTicketId); ?>"
    hx-trigger="timerUpdate from:body"
    hx-swap="outerHTML"

    class="tw-relative timerContainer">

    <?php if($onTheClock === false): ?>
        <a href="javascript:void(0);" data-value="<?php echo e($parentTicketId); ?>"
           hx-patch="<?php echo e(BASE_URL); ?>/hx/timesheets/stopwatch/start-timer/"
           hx-target="#timerHeadMenu"
           hx-swap="outerHTML"
           onclick="this.classList.add('starting');"
           hx-vals='{"ticketId": "<?php echo e($parentTicketId); ?>", "action":"start"}'
            data-tippy-content="<?php echo e(__("links.start_work")); ?>">

                    <span class="fa-regular fa-circle-play" style="font-size:18px; padding-top:3px;"></span>

            <?php if($style=="full"): ?>
                <?php echo e(__("links.start_work")); ?>

            <?php endif; ?>

        </a>
    <?php endif; ?>

    <?php if($onTheClock !== false && $onTheClock["id"] == $parentTicketId): ?>
        <a href="javascript:void(0);" data-value="<?php echo e($parentTicketId); ?>"
            hx-trigger="click delay:500ms"
           hx-patch="<?php echo e(BASE_URL); ?>/hx/timesheets/stopwatch/stop-timer/"
           hx-target="#timerHeadMenu"
           hx-vals='{"ticketId": "<?php echo e($parentTicketId); ?>", "action":"stop"}'
           hx-swap="outerHTML"
           onclick="this.classList.add('stopped');"
           data-tippy-content="<?php if(is_array($onTheClock) == true): ?> <?php echo strip_tags(sprintf(__("links.stop_work_started_at"), dtHelper()::createFromTimestamp($onTheClock["since"], 'UTC')->setToUserTimezone()->format(__("language.timeformat")))); ?> <?php else: ?> <?php echo strip_tags(sprintf(__("links.stop_work_started_at"), dtHelper()::now()->setToUserTimezone()->format(__("language.timeformat")))); ?> <?php endif; ?>"
        >


                <span class="fa-regular fa-circle-stop" style="font-size:18px; padding-top:3px;"></span>
                <?php if($style=="full"): ?>
                    <?php if(is_array($onTheClock) == true): ?>
                        <?php echo sprintf(__("links.stop_work_started_at"), dtHelper()::createFromTimestamp($onTheClock["since"], 'UTC')->setToUserTimezone()->format(__("language.timeformat"))); ?>

                    <?php else: ?>
                        <?php echo sprintf(__("links.stop_work_started_at"), dtHelper()::now()->setToUserTimezone()->format(__("language.timeformat"))); ?>

                    <?php endif; ?>
                <?php endif; ?>

            <!-- These elements will be added dynamically when the timer is stopped -->
            <div class="success-circle"></div>
            <div class="particles-container">
                <div class="particle particle-1"></div>
                <div class="particle particle-2"></div>
                <div class="particle particle-3"></div>
                <div class="particle particle-4"></div>
                <div class="particle particle-5"></div>
                <div class="particle particle-6"></div>
                <div class="particle particle-7"></div>
                <div class="particle particle-8"></div>
            </div>

        </a>
    <?php endif; ?>
    <?php if($onTheClock !== false && $onTheClock["id"] != $parentTicketId): ?>
        <span class='working'>
             <?php if($style=="full"): ?>
                <?php echo e(__("text.timer_set_other_todo")); ?>

            <?php else: ?>
                <span class="fa-solid fa-user-clock" style="font-size:16px; padding-top:3px; color:var(--grey);" data-tippy-content="<?php echo e(__("text.timer_set_other_todo")); ?>"></span>
            <?php endif; ?>
        </span>
    <?php endif; ?>
</div>

<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/partials/timerButton.blade.php ENDPATH**/ ?>