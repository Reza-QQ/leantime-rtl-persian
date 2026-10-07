<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'stageKey' => '',
    'stageNum' => 1,
    'color' => '#4A85B5',
    'bgColor' => '#EDF3F8',
    'icon' => 'fa-circle',
    'title' => '',
    'subtitle' => '',
    'active' => false,
    'itemCount' => 0,
    'focusLabel' => 'Current Focus',
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
    'stageKey' => '',
    'stageNum' => 1,
    'color' => '#4A85B5',
    'bgColor' => '#EDF3F8',
    'icon' => 'fa-circle',
    'title' => '',
    'subtitle' => '',
    'active' => false,
    'itemCount' => 0,
    'focusLabel' => 'Current Focus',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="sf-stage <?php echo e($active ? 'active' : ''); ?>"
     data-s="<?php echo e($stageNum); ?>"
     data-stage="<?php echo e($stageKey); ?>"
     style="--stage-color: <?php echo e($color); ?>; --stage-bg: <?php echo e($bgColor); ?>;">

    <div class="sf-flag" style="background: <?php echo e($color); ?>;"><?php echo e($focusLabel); ?></div>

    <div class="sf-hd">
        <div class="sf-icon"><i class="fa <?php echo e($icon); ?>"></i></div>
        <div class="sf-title-row">
            <span class="sf-name"><?php echo e($title); ?></span>
            <?php if($itemCount > 0): ?><span class="sf-count" style="color: <?php echo e($color); ?>;"><?php echo e($itemCount); ?></span><?php endif; ?>
        </div>
        <div class="sf-sub"><?php echo e($subtitle); ?></div>
        <?php echo e($headerExtra ?? ''); ?>

    </div>

    <?php echo e($beforeBody ?? ''); ?>


    <div class="sf-body">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/stageflow/card.blade.php ENDPATH**/ ?>