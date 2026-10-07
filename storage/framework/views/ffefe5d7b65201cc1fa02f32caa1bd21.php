
<?php if (isset($component)) { $__componentOriginal4c206563ec44be3b80a7e335a33e12a2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c206563ec44be3b80a7e335a33e12a2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.statTiles','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::statTiles'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__currentLoopData = $tiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            // 'danger' only fires when there is actually something to worry
            // about — a zero overdue count is good news, not an alarm.
            $isRisk = ($tile['tone'] ?? 'default') === 'danger' && (float) $tile['value'] > 0;

            $tileDelta = null;
            if (! empty($tile['delta'])) {
                $tileDelta = [
                    'value' => $tile['delta']['value'],
                    'goodWhenUp' => $tile['delta']['goodWhenUp'] ?? null,
                    'label' => $tile['delta']['vs'] ?? null,
                ];
            }
        ?>

        <?php if (isset($component)) { $__componentOriginal1a4c64947dafc4c85177851ee627e683 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1a4c64947dafc4c85177851ee627e683 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.statTile','data' => ['value' => $tile['value'],'label' => $tile['label'],'unit' => $tile['unit'] ?? null,'delta' => $tileDelta,'tone' => $isRisk ? 'risk' : 'default']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::statTile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['value']),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['label']),'unit' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tile['unit'] ?? null),'delta' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tileDelta),'tone' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isRisk ? 'risk' : 'default')]); ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c206563ec44be3b80a7e335a33e12a2)): ?>
<?php $attributes = $__attributesOriginal4c206563ec44be3b80a7e335a33e12a2; ?>
<?php unset($__attributesOriginal4c206563ec44be3b80a7e335a33e12a2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c206563ec44be3b80a7e335a33e12a2)): ?>
<?php $component = $__componentOriginal4c206563ec44be3b80a7e335a33e12a2; ?>
<?php unset($__componentOriginal4c206563ec44be3b80a7e335a33e12a2); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/partials/statTiles.blade.php ENDPATH**/ ?>