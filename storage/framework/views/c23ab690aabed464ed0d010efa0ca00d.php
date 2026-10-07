
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['tiles' => null]));

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

foreach (array_filter((['tiles' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div <?php echo e($attributes->merge(['class' => 'lt-stats'])); ?>>
    <?php if($tiles !== null): ?>
        <?php $__currentLoopData = $tiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal1a4c64947dafc4c85177851ee627e683 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1a4c64947dafc4c85177851ee627e683 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.statTile','data' => ['value' => $tile['value'],'label' => $tile['label'],'unit' => $tile['unit'] ?? null,'delta' => $tile['delta'] ?? null,'tone' => $tile['tone'] ?? 'default','icon' => $tile['icon'] ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::statTile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['value']),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['label']),'unit' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['unit'] ?? null),'delta' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['delta'] ?? null),'tone' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['tone'] ?? 'default'),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['icon'] ?? null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a4c64947dafc4c85177851ee627e683)): ?>
<?php $attributes = $__attributesOriginal1a4c64947dafc4c85177851ee627e683; ?>
<?php unset($__attributesOriginal1a4c64947dafc4c85177851ee627e683); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a4c64947dafc4c85177851ee627e683)): ?>
<?php $component = $__componentOriginal1a4c64947dafc4c85177851ee627e683; ?>
<?php unset($__componentOriginal1a4c64947dafc4c85177851ee627e683); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php echo e($slot); ?>

</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/statTiles.blade.php ENDPATH**/ ?>