
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'parent' => null,
    'parentHref' => null,
    'current' => '',
    'separator' => '/',
    'switchStyle' => 'legacy',
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
    'parent' => null,
    'parentHref' => null,
    'current' => '',
    'separator' => '/',
    'switchStyle' => 'legacy',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<h1 class="<?php echo \Illuminate\Support\Arr::toCssClasses(['subjectSwitcher', 'subjectSwitcher--pill' => $switchStyle === 'pill']); ?>">
    <?php if(! empty($parent)): ?>
        <?php if(! empty($parentHref)): ?>
            <a href="<?php echo e($parentHref); ?>" class="subjectSwitcher-parent"><?php echo e($parent); ?></a>
        <?php else: ?>
            <span class="subjectSwitcher-parent"><?php echo e($parent); ?></span>
        <?php endif; ?>
        <span class="subjectSwitcher-sep" aria-hidden="true"><?php echo e($separator); ?></span>
    <?php endif; ?>
    <span class="dropdown dropdownWrapper">
        <a href="javascript:void(0)" role="button" class="dropdown-toggle header-title-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo e($current); ?>

            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu">
            <?php echo e($slot); ?>

        </ul>
    </span>
</h1>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/subjectSwitcher.blade.php ENDPATH**/ ?>