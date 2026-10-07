<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'user' => null
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
    'user' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="profileBox">
    <div class="commentImage">
        <?php if(isset($user['userId']) || isset($user->userId)): ?>
            <?php if (isset($component)) { $__componentOriginal7229457c790e53600b4b9a93f03c01e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7229457c790e53600b4b9a93f03c01e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'users::components.profile-image','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users::profile-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7229457c790e53600b4b9a93f03c01e7)): ?>
<?php $attributes = $__attributesOriginal7229457c790e53600b4b9a93f03c01e7; ?>
<?php unset($__attributesOriginal7229457c790e53600b4b9a93f03c01e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7229457c790e53600b4b9a93f03c01e7)): ?>
<?php $component = $__componentOriginal7229457c790e53600b4b9a93f03c01e7; ?>
<?php unset($__componentOriginal7229457c790e53600b4b9a93f03c01e7); ?>
<?php endif; ?>
        <?php else: ?>
            <i class="fa fa-user"></i>
        <?php endif; ?>
    </div>
    <div class="userName">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Users/Templates/components/profile-box.blade.php ENDPATH**/ ?>