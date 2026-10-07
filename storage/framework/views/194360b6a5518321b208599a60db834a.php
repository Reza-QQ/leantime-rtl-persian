
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'value',
    'label',
    'unit' => null,
    'delta' => null,
    'tone' => 'default',
    'icon' => null,
    'sub' => null,
    'subTone' => 'default',
    'muted' => false,
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
    'value',
    'label',
    'unit' => null,
    'delta' => null,
    'tone' => 'default',
    'icon' => null,
    'sub' => null,
    'subTone' => 'default',
    'muted' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $deltaValue = $delta['value'] ?? null;
    $goodWhenUp = $delta['goodWhenUp'] ?? null;

    // Direction drives the arrow; good/bad drives the color. They are separate:
    // "overdue went up" is an increase AND bad, so an up arrow on a red pill.
    if ($deltaValue === null || (float) $deltaValue == 0.0) {
        $deltaTone = 'flat';
    } elseif ($goodWhenUp === null) {
        $deltaTone = 'flat';
    } else {
        $deltaTone = (((float) $deltaValue > 0) === (bool) $goodWhenUp) ? 'up' : 'down';
    }

    $deltaArrow = $deltaValue === null || (float) $deltaValue == 0.0
        ? null
        : ((float) $deltaValue > 0 ? 'fa-caret-up' : 'fa-caret-down');

    // A single sub-line and a list of them are the same thing to the markup.
    // Compare against null/'' explicitly rather than a truthiness filter: an
    // HtmlString is an object and must survive, and a legitimate "0" must too.
    $subLines = $sub === null
        ? []
        : (is_array($sub)
            ? array_values(array_filter($sub, fn ($l) => $l !== null && $l !== ''))
            : [$sub]);

    $tileClasses = 'lt-stat'
        .($tone === 'risk' ? ' risk' : '')
        .($muted ? ' is-muted' : '');
?>

<div <?php echo e($attributes->merge(['class' => $tileClasses])); ?>>
    <div class="lt-stat-value">
        <span><?php echo e($value); ?></span>
        <?php if($unit !== null && $unit !== ''): ?>
            <span class="lt-stat-unit"><?php echo e($unit); ?></span>
        <?php endif; ?>

        <?php if($deltaValue !== null): ?>
            <span class="lt-stat-delta <?php echo e($deltaTone); ?>"
                  <?php if(! empty($delta['label'])): ?> data-tippy-content="<?php echo e($delta['label']); ?>" <?php endif; ?>>
                <?php if($deltaArrow): ?><i class="fa <?php echo e($deltaArrow); ?>" aria-hidden="true"></i><?php endif; ?>
                <?php if((float) $deltaValue == 0.0): ?>
                    ±0
                <?php else: ?>
                    <?php echo e((float) $deltaValue > 0 ? '+' : '−'); ?><?php echo e(\Illuminate\Support\Number::format(abs((float) $deltaValue), maxPrecision: 1)); ?>

                <?php endif; ?>
            </span>
        <?php endif; ?>
    </div>

    <div class="lt-stat-label">
        <?php if($icon): ?><i class="fa <?php echo e($icon); ?>" aria-hidden="true"></i><?php endif; ?>
        <span><?php echo e($label); ?></span>
    </div>

    <?php $__currentLoopData = $subLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subIndex => $subLine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="lt-stat-sub <?php if($subIndex > 0): ?> lt-stat-sub-more <?php endif; ?> <?php if($subTone === 'risk' && $subIndex === 0): ?> risk <?php endif; ?>"><?php echo e($subLine); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($slot); ?>

</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/statTile.blade.php ENDPATH**/ ?>