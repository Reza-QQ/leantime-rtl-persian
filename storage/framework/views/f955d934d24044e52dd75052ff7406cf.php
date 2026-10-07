<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginal73464617f1e536702d3c383ba117853c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73464617f1e536702d3c383ba117853c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.pageheader','data' => ['icon' => 'fa fa-puzzle-piece']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::pageheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('fa fa-puzzle-piece')]); ?>
        <h1>App Marketplace</h1>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73464617f1e536702d3c383ba117853c)): ?>
<?php $attributes = $__attributesOriginal73464617f1e536702d3c383ba117853c; ?>
<?php unset($__attributesOriginal73464617f1e536702d3c383ba117853c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73464617f1e536702d3c383ba117853c)): ?>
<?php $component = $__componentOriginal73464617f1e536702d3c383ba117853c; ?>
<?php unset($__componentOriginal73464617f1e536702d3c383ba117853c); ?>
<?php endif; ?>

    <?php echo $tpl->displayNotification(); ?>

    <div class="maincontent">

        <?php echo $__env->make('plugins::partials.plugintabs',  ["currentUrl" => "marketplace"], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

       <div class="maincontentinner">

           <div class="tw-w-full"
                hx-get="<?php echo e(BASE_URL); ?>/hx/plugins/marketplaceplugins/getlist"
                hx-trigger="load"
                hx-target="#pluginList"
                hx-indicator=".htmx-indicator, .htmx-loaded-content"
                hx-swap="outerHTML"
           >
               <div id="pluginList">
                   <div class="htmx-indicator tw-ml-m tw-mr-m tw-pt-l">
                       <?php if (isset($component)) { $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.loadingText','data' => ['type' => 'plugincard','count' => '5','includeHeadline' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::loadingText'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'plugincard','count' => '5','includeHeadline' => 'false']); ?>
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
               </div>
           </div>

       </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Plugins/Templates/marketplace.blade.php ENDPATH**/ ?>