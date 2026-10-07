<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'milestone' => null,
    'noText' => false,
    'percentDone' => 0,
    'progressColor' => 'default'
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
    'milestone' => null,
    'noText' => false,
    'percentDone' => 0,
    'progressColor' => 'default'
 ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="ticketBox fixed">
    <div class="row">
        <div class="col-md-8" style="margin-bottom:5px;">
            <strong><a href="<?=BASE_URL ?>/tickets/showKanban?milestone=<?php echo e($milestone->id); ?>" ><?php echo e($milestone->headline); ?></a></strong>
        </div>
        <div class="col-md-4 align-right">

        </div>
    </div>
    <?php $__env->startFragment('progress'); ?>

        <?php if($noText === false || $noText === null): ?>
            <div class="row progress-wrapper">
                <div class="col-md-7 percent-label">
                    <?php echo e(__("label.due")); ?>

                    <?php echo format($milestone->editTo )->date($tpl->__("text.no_date_defined")); ?>
                </div>
                <div class="col-md-5 percent-label" style="text-align:right">
                    <?=sprintf($tpl->__("text.percent_complete"), format($percentDone)->decimal())?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="progress" data-tippy-content="<?=sprintf($tpl->__("text.percent_complete"), format($percentDone)->decimal())?>">
                    <div class="progress-bar progress-bar-success"
                         role="progressbar"
                         aria-valuenow="<?php echo e($percentDone); ?>"
                         aria-valuemin="0" aria-valuemax="100"
                         style="width: <?php echo e($percentDone); ?>%; <?php echo e($progressColor !== 'default' ? ' background: #'.$progressColor.'; ' : ''); ?>">
                        <span class="sr-only"><?php echo e(sprintf($tpl->__("text.percent_complete"), format($percentDone)->decimal())); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Idempotent init — a bare tippy('[data-tippy-content]') here re-instanced
            // every tooltip on the page each time a milestone card rendered (flashing
            // + duplicate header tooltips). initTooltips skips already-instanced els.
            window.leantime?.initTooltips?.();
        </script>
    <?php echo $__env->stopFragment(); ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/partials/milestoneCard.blade.php ENDPATH**/ ?>