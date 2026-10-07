<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'link' => '#',
    'type' => 'primary',
    'tag'  => 'a',
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
    'link' => '#',
    'type' => 'primary',
    'tag'  => 'a',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<<?php echo e($tag); ?> <?php echo e($attributes->merge([
    'class' => 'btn btn-' . $type
] + ($tag == 'a' ? ['href' => $link] : []))); ?>>
    <?php echo e($slot); ?>

</<?php echo e($tag); ?>>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/button.blade.php ENDPATH**/ ?>