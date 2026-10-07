
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'for' => null,
    'id' => null,
    'wrapperId' => null,
    'action' => null,
    'endpoint' => null,
    'trigger' => 'revealed',
    'listen' => [],
    'target' => null,
    'swap' => null,
    'vals' => null,
    'indicator' => '.htmx-indicator',
    'loader' => 'text',
    'loaderCount' => 1,
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
    'for' => null,
    'id' => null,
    'wrapperId' => null,
    'action' => null,
    'endpoint' => null,
    'trigger' => 'revealed',
    'listen' => [],
    'target' => null,
    'swap' => null,
    'vals' => null,
    'indicator' => '.htmx-indicator',
    'loader' => 'text',
    'loaderCount' => 1,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $listenEvents = [];
    $resolvedSwap = $swap;

    if ($for && is_string($for) && is_subclass_of($for, \Leantime\Core\Controller\HxComponent::class)) {
        $resolvedAction = \Illuminate\Support\Str::kebab($action ?? $for::$mountAction);
        $path = trim($for::route(), '/').'/'.$resolvedAction.($id !== null ? '/'.$id : '');
        $resolvedSwap = $resolvedSwap ?? $for::$swap;

        foreach ($for::listensTo() as $event) {
            $listenEvents[] = $id !== null ? $event->scoped($id) : $event->event();
        }
    } else {
        $path = trim((string) $endpoint, '/');

        foreach ((array) $listen as $event) {
            $listenEvents[] = $event instanceof \Leantime\Core\Events\Htmx\HtmxEvent ? $event->event() : (string) $event;
        }
    }

    $resolvedSwap = $resolvedSwap ?? 'innerHTML';

    $triggerParts = array_merge([$trigger], array_map(fn ($event) => $event.' from:body', $listenEvents));
    $triggerAttr = implode(', ', array_filter($triggerParts));

    $url = rtrim(BASE_URL, '/').'/hx/'.$path;
?>

<div
    <?php if($wrapperId): ?> id="<?php echo e($wrapperId); ?>" <?php endif; ?>
    hx-get="<?php echo e($url); ?>"
    hx-trigger="<?php echo e($triggerAttr); ?>"
    <?php if($target): ?> hx-target="<?php echo e($target); ?>" <?php endif; ?>
    hx-swap="<?php echo e($resolvedSwap); ?>"
    
    <?php if($vals !== null): ?> hx-vals='<?php echo json_encode($vals, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>' <?php endif; ?>
    hx-indicator="<?php echo e($indicator); ?>"
    <?php echo e($attributes); ?>

>
    <?php if (isset($component)) { $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.loadingText','data' => ['type' => $loader,'count' => $loaderCount,'includeHeadline' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::loadingText'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loader),'count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loaderCount),'includeHeadline' => 'false']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c)): ?>
<?php $attributes = $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c; ?>
<?php unset($__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c)): ?>
<?php $component = $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c; ?>
<?php unset($__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/hx.blade.php ENDPATH**/ ?>