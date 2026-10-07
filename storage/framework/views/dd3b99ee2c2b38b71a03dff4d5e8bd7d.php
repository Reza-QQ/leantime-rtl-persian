<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    "image",
    "headline",
    "maxWidth" => "30%",
    "maxHeight" => "200px",
    "height" => "auto",
    "headlineSize" => "",
    "align" => "center"
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
    "image",
    "headline",
    "maxWidth" => "30%",
    "maxHeight" => "200px",
    "height" => "auto",
    "headlineSize" => "",
    "align" => "center"
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div <?php echo e($attributes->merge(['class' => 'tw-w-full tw-text-'.$align.' undrawContainer'])); ?>>

    <?php if(file_exists($image_path = ROOT . "/dist/images/svg/$image")): ?>
        <div  style='width:100%; display:flex; max-width: <?php echo e($maxWidth); ?>; max-height:<?php echo e($maxHeight); ?>; height: <?php echo e($height); ?>; overflow:hidden;' class='svgContainer'>
            <?php echo file_get_contents($image_path); ?>

        </div>
    <?php endif; ?>

    <?php if(! empty($headline)): ?>
        <h3 class="fancyLink" style="<?php echo e($headlineSize !== "" ? "font-size:".$headlineSize : ""); ?>"><?php echo e($headline); ?></h3>
    <?php endif; ?>

    <?php echo $slot ?? ''; ?>


</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/undrawSvg.blade.php ENDPATH**/ ?>