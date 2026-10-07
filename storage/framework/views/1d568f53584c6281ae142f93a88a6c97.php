<div class="tw-flex tw-justify-between tw-items-center tw-gap-base">
    <?php if (isset($component)) { $__componentOriginal2cb5d99c0c821e905a4aeb012e3dbbbd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2cb5d99c0c821e905a4aeb012e3dbbbd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.button','data' => ['type' => 'primary','link' => '#/plugins/details/'.e($plugin->identifier).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','link' => '#/plugins/details/'.e($plugin->identifier).'']); ?>
        <?php echo e(__('marketplace.details_link')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2cb5d99c0c821e905a4aeb012e3dbbbd)): ?>
<?php $attributes = $__attributesOriginal2cb5d99c0c821e905a4aeb012e3dbbbd; ?>
<?php unset($__attributesOriginal2cb5d99c0c821e905a4aeb012e3dbbbd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2cb5d99c0c821e905a4aeb012e3dbbbd)): ?>
<?php $component = $__componentOriginal2cb5d99c0c821e905a4aeb012e3dbbbd; ?>
<?php unset($__componentOriginal2cb5d99c0c821e905a4aeb012e3dbbbd); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Plugins/Templates/partials/marketplace/plugincontrols.blade.php ENDPATH**/ ?>