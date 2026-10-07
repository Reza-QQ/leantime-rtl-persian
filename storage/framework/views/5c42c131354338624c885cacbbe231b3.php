
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'period',
    'url',
    'hxUrl' => null,
    'target' => '#reportBody',
    'hints' => [],
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
    'period',
    'url',
    'hxUrl' => null,
    'target' => '#reportBody',
    'hints' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    use Leantime\Domain\Reports\Models\ReportPeriod;

    $presets = [
        ReportPeriod::PRESET_LAST_QUARTER => __('label.period_last_quarter'),
        ReportPeriod::PRESET_THIS_QUARTER => __('label.period_this_quarter'),
        ReportPeriod::PRESET_NEXT_QUARTER => __('label.period_next_quarter'),
    ];

    $isCustom = $period->preset === ReportPeriod::PRESET_CUSTOM;

    // The pill shows the preset NAME, never a calendar quarter label: Leantime
    // has no fiscal-quarter setting, so "Q3 2026" would be a lie for anyone
    // whose fiscal year isn't calendar-aligned. The literal range sits next to it.
    $activeName = $presets[$period->preset] ?? __('label.period_custom');

    // Unique id per instance so two pickers on one page can't toggle each other.
    $pickerId = 'ltPeriodPicker'.substr(md5($url.$period->preset), 0, 8);
?>

<div <?php echo e($attributes->merge(['class' => 'lt-periodpicker'])); ?> id="<?php echo e($pickerId); ?>" data-lt-periodpicker>
    <button type="button" class="lt-periodpicker-btn" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        <span class="lt-periodpicker-preset"><?php echo e($activeName); ?></span>
        <span class="lt-periodpicker-range">· <?php echo e($period->from->setToUserTimezone()->format('M j')); ?> – <?php echo e($period->to->setToUserTimezone()->format('M j, Y')); ?></span>
        <i class="fa fa-caret-down" aria-hidden="true"></i>
    </button>

    <div class="lt-periodpicker-menu" hidden>
        <?php $__currentLoopData = $presets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $presetKey => $presetLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($url); ?>?preset=<?php echo e($presetKey); ?>"
               <?php if($hxUrl): ?>
                   hx-get="<?php echo e($hxUrl); ?>?preset=<?php echo e($presetKey); ?>"
                   hx-target="<?php echo e($target); ?>"
                   hx-swap="outerHTML"
                   hx-push-url="<?php echo e($url); ?>?preset=<?php echo e($presetKey); ?>"
               <?php endif; ?>
               class="lt-periodpicker-opt <?php if($period->preset === $presetKey): ?> on <?php endif; ?>">
                <span class="l"><?php echo e($presetLabel); ?></span>
                <?php if(! empty($hints[$presetKey])): ?>
                    <span class="d"><?php echo e($hints[$presetKey]); ?></span>
                <?php endif; ?>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="lt-periodpicker-sep"></div>

        
        <form method="GET" action="<?php echo e($url); ?>" class="lt-periodpicker-custom">
            <input type="hidden" name="preset" value="<?php echo e(ReportPeriod::PRESET_CUSTOM); ?>" />
            <label class="lt-periodpicker-cl"><?php echo e(__('label.period_custom')); ?></label>
            <div class="lt-periodpicker-crow">
                <input type="text" name="from" class="lt-periodpicker-input periodPickerDate"
                       placeholder="<?php echo e(__('label.period_from')); ?>"
                       value="<?php echo e($isCustom ? $period->from->setToUserTimezone()->formatDateForUser() : ''); ?>" />
                <span class="lt-periodpicker-dash">–</span>
                <input type="text" name="to" class="lt-periodpicker-input periodPickerDate"
                       placeholder="<?php echo e(__('label.period_to')); ?>"
                       value="<?php echo e($isCustom ? $period->to->setToUserTimezone()->formatDateForUser() : ''); ?>" />
                <button type="submit" class="lt-periodpicker-apply"><?php echo e(__('label.period_apply')); ?></button>
            </div>
        </form>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('lt-periodpicker-script')): $__env->markAsRenderedOnce('lt-periodpicker-script'); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            (function () {
                'use strict';

                function closeAll(except) {
                    document.querySelectorAll('[data-lt-periodpicker]').forEach(function (p) {
                        if (p === except) { return; }
                        var menu = p.querySelector('.lt-periodpicker-menu');
                        var trigger = p.querySelector('.lt-periodpicker-btn');
                        if (menu) { menu.setAttribute('hidden', ''); }
                        if (trigger) { trigger.setAttribute('aria-expanded', 'false'); }
                    });
                }

                function setOpen(picker, open) {
                    var menu = picker.querySelector('.lt-periodpicker-menu');
                    var trigger = picker.querySelector('.lt-periodpicker-btn');
                    if (menu) { menu.toggleAttribute('hidden', !open); }
                    if (trigger) { trigger.setAttribute('aria-expanded', open ? 'true' : 'false'); }
                }

                // Delegated, so pickers swapped in by HTMX work without re-init.
                document.addEventListener('click', function (e) {
                    var root = e.target.closest('[data-lt-periodpicker]');
                    var btn = e.target.closest('[data-lt-periodpicker] .lt-periodpicker-btn');

                    if (btn && root) {
                        var willOpen = root.querySelector('.lt-periodpicker-menu').hasAttribute('hidden');
                        closeAll(root);
                        setOpen(root, willOpen);
                        return;
                    }

                    // Picking a preset closes the menu — with hx-get the body swaps in
                    // place, so nothing else would dismiss it and it hung open over the
                    // report until the next outside click.
                    if (e.target.closest('.lt-periodpicker-opt')) {
                        closeAll();
                        if (root) { setOpen(root, false); }
                        return;
                    }

                    // Anywhere else inside an open menu (typing a range, picking a date
                    // in the calendar overlay): leave it alone.
                    if (e.target.closest('.lt-periodpicker-menu')) { return; }

                    closeAll();
                });

                document.addEventListener('keydown', function (e) {
                    if (e.key !== 'Escape') { return; }
                    // Reset aria-expanded too, or screen readers keep announcing the
                    // trigger as expanded after the menu is gone.
                    closeAll();
                });

                function initDatepickers() {
                    if (!window.jQuery || !jQuery.fn.datepicker) { return; }
                    jQuery('.lt-periodpicker-input').not('.hasDatepicker').datepicker({
                        dateFormat: window.leantime.dateHelper.getFormatFromSettings('dateformat', 'jquery'),
                    });
                }

                if (document.readyState !== 'loading') { initDatepickers(); }
                else { document.addEventListener('DOMContentLoaded', initDatepickers); }
                if (window.htmx) { window.htmx.onLoad(initDatepickers); }
            })();
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/periodpicker.blade.php ENDPATH**/ ?>