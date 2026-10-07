<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'contentRole' => '',          // ''(none) | default | primary | secondary | tertiary(=ghost) | accent | link
    'state' => '',                // info | warning | danger | success
    'scale' => '',                // xs | s | m | l | xl
    'variant' => '',              // 'outline' = outline style (btn-outline / btn-{state}-outline)
    'tag' => 'button',            // a | button | input  (the polymorphic element)
    'link' => null,               // href, when tag="a"; null => emit no href (e.g. <a onclick> with no href)
    'inputType' => null,          // submit | button | reset, when tag="button"/"input" (default below)
    'leadingVisual' => '',        // icon class, e.g. "fa fa-plus"
    'trailingVisual' => '',       // icon class
    'labelText' => '',            // text label; falls back to the slot
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
    'contentRole' => '',          // ''(none) | default | primary | secondary | tertiary(=ghost) | accent | link
    'state' => '',                // info | warning | danger | success
    'scale' => '',                // xs | s | m | l | xl
    'variant' => '',              // 'outline' = outline style (btn-outline / btn-{state}-outline)
    'tag' => 'button',            // a | button | input  (the polymorphic element)
    'link' => null,               // href, when tag="a"; null => emit no href (e.g. <a onclick> with no href)
    'inputType' => null,          // submit | button | reset, when tag="button"/"input" (default below)
    'leadingVisual' => '',        // icon class, e.g. "fa fa-plus"
    'trailingVisual' => '',       // icon class
    'labelText' => '',            // text label; falls back to the slot
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<?php
    // Role carries the emphasis AND its default look:
    //   primary = filled, secondary = outline, tertiary/ghost = transparent (low-chrome).
    // (variant="outline" is only needed to force outline on a non-secondary role, e.g. state+outline.)
    $roleClass = match ($contentRole) {
        'primary' => 'btn-primary',
        'secondary' => 'btn-outline',
        'default' => 'btn-default',
        'tertiary', 'ghost' => 'btn-transparent',
        'accent' => 'btn-primary',
        'link' => 'btn-link',
        default => '',
    };

    // State color is mutually exclusive with the role color today (a danger button is
    // `btn btn-danger`, not `btn-primary btn-danger`). If a state is given, it wins.
    $stateClass = match ($state) {
        'danger' => 'btn-danger',
        'warning' => 'btn-warning',
        'success' => 'btn-success',
        'info' => 'btn-info',
        default => '',
    };

    $scaleClass = match ($scale) {
        'xs', 's', 'sm' => 'btn-small',
        'l', 'lg', 'xl' => 'btn-large',
        default => '',
    };

    // variant="outline" selects the outline button style — btn-outline, or btn-{state}-outline
    // (e.g. btn-danger-outline). This is the same style the edit-ticket save / "Save & Close"
    // buttons use. Outline overrides the role color.
    if ($variant === 'outline') {
        // Only build btn-{state}-outline for a VALIDATED state (so state="default" -> btn-outline,
        // never btn-default-outline). $stateClass is '' for default/unknown states.
        $colorClass = $stateClass !== '' ? 'btn-'.$state.'-outline' : 'btn-outline';
    } else {
        $colorClass = $stateClass !== '' ? $stateClass : $roleClass;
    }
    $classes = trim('btn '.$colorClass.' '.$scaleClass);

    // Inner content: leading icon + (labelText or slot) + trailing icon, matching the
    // hand-written "<i class="fa …"></i> Label" markup buttons use today.
    $hasLabel = trim($labelText) !== '';
?>

<?php if($tag === 'input'): ?>
    <input
        type="<?php echo e($inputType ?? 'submit'); ?>"
        value="<?php echo e($hasLabel ? $labelText : trim($slot)); ?>"
        <?php echo e($attributes->merge(['class' => $classes])); ?>

    />
<?php elseif($tag === 'a'): ?>
    
    <a <?php echo e($attributes->merge(['class' => $classes] + ($link !== null ? ['href' => $link] : []))); ?>>
        <?php if($leadingVisual): ?><i class="<?php echo e($leadingVisual); ?>"></i> <?php endif; ?><?php echo e($hasLabel ? $labelText : $slot); ?><?php if($trailingVisual): ?> <i class="<?php echo e($trailingVisual); ?>"></i><?php endif; ?>
    </a>
<?php else: ?>
    
    <button <?php if($inputType !== null): ?> type="<?php echo e($inputType); ?>" <?php endif; ?> <?php echo e($attributes->merge(['class' => $classes])); ?>>
        <?php if($leadingVisual): ?><i class="<?php echo e($leadingVisual); ?>"></i> <?php endif; ?><?php echo e($hasLabel ? $labelText : $slot); ?><?php if($trailingVisual): ?> <i class="<?php echo e($trailingVisual); ?>"></i><?php endif; ?>
    </button>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/forms/button.blade.php ENDPATH**/ ?>