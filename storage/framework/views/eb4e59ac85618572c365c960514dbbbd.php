<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'plugin'
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
    'plugin'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="col-md-4">
    <div class="ticketBox fixed" style="padding-top:0px; overflow: hidden; margin-bottom: 25px;">
        <div class="row">
            <div class="col-md-12 tw-overflow-hidden tw-mb-m">
                <img src="<?php echo e($plugin->getPluginImageData()); ?>" width="75" height="75" class="tw-rounded tw-mt-base"/>

                <?php if($plugin instanceof \Leantime\Domain\Plugins\Models\MarketplacePlugin): ?>
                    <div
                        class="certififed label-default tw-absolute tw-top-[10px] tw-right-[10px] tw-text-primary tw-rounded-full tw-text-sm"
                        data-tippy-content="<?php echo e(__('marketplace.certified_tooltip')); ?>"
                    >
                        <i class="fa fa-certificate"></i>
                        Certified
                    </div>
                <?php endif; ?>
                <div class="clearall"></div>
                <div style="margin-top:10px;">
                    <?php if(! empty($plugin->name)): ?>
                        <strong style="font-size:var(--font-size-l);"><?php echo $plugin->name; ?></strong> <?php echo e($plugin->version ? "(v".$plugin->version.")" : ""); ?><br />
                        <?php if (isset($component)) { $__componentOriginal3bdfb8ed4e45523cfeced1381fb1f83b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bdfb8ed4e45523cfeced1381fb1f83b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.inlineLinks','data' => ['links' => $plugin->getMetadataLinks()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::inlineLinks'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['links' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($plugin->getMetadataLinks())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bdfb8ed4e45523cfeced1381fb1f83b)): ?>
<?php $attributes = $__attributesOriginal3bdfb8ed4e45523cfeced1381fb1f83b; ?>
<?php unset($__attributesOriginal3bdfb8ed4e45523cfeced1381fb1f83b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bdfb8ed4e45523cfeced1381fb1f83b)): ?>
<?php $component = $__componentOriginal3bdfb8ed4e45523cfeced1381fb1f83b; ?>
<?php unset($__componentOriginal3bdfb8ed4e45523cfeced1381fb1f83b); ?>
<?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row tw-mb-base">
            <div class="col tw-flex tw-flex-col tw-gap-base">

                <?php if(! empty($desc = $plugin->getCardDesc())): ?>
                    <p><?php echo $desc; ?></p>
                <?php endif; ?>
                <div class="tw-flex tw-flex-row tw-gap-base">
                    <div class="plugin-price tw-flex-1 tw-content-center" >
                        <strong><?php echo $plugin->getPrice(); ?></strong><br />
                    </div>
                    <div class="tw-border-t tw-border-[var(--main-border-color)] tw-px-base tw-text-right tw-flex-1 tw-justify-items-end">
                        <?php echo $__env->make($plugin->getControlsView(), ["plugin" => $plugin], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Plugins/Templates/partials/plugin.blade.php ENDPATH**/ ?>