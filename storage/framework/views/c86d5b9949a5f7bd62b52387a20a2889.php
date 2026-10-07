<?php $__env->startSection('content'); ?>

<div class="maincontent" id="gridBoard" style="margin-top:0px; opacity:0;">

    <?php echo $tpl->displayNotification(); ?>


    <div class="grid-stack">

        <?php $__currentLoopData = $dashboardGrid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if (isset($component)) { $__componentOriginal6ef397cf2f12ec369cf8bec52000c843 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ef397cf2f12ec369cf8bec52000c843 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'widgets::components.moveableWidget','data' => ['gsX' => ''.e($widget->gridX).'','gsY' => ''.e($widget->gridY).'','gsH' => ''.e($widget->gridHeight).'','gsW' => ''.e($widget->gridWidth).'','gsMinW' => ''.e($widget->gridMinWidth).'','gsMinH' => ''.e($widget->gridMinHeight).'','isNew' => ''.e(isset($widget->isNew) ? 'true' : 'false').'','background' => ''.e($widget->widgetBackground).'','noTitle' => ''.e($widget->noTitle).'','name' => ''.e($widget->name).'','fixed' => (empty($widget->fixed) ? false : true ),'alwaysVisible' => ''.e($widget->alwaysVisible).'','id' => 'widget_wrapper_'.e($widget->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets::moveableWidget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['gs-x' => ''.e($widget->gridX).'','gs-y' => ''.e($widget->gridY).'','gs-h' => ''.e($widget->gridHeight).'','gs-w' => ''.e($widget->gridWidth).'','gs-min-w' => ''.e($widget->gridMinWidth).'','gs-min-h' => ''.e($widget->gridMinHeight).'','isNew' => ''.e(isset($widget->isNew) ? 'true' : 'false').'','background' => ''.e($widget->widgetBackground).'','noTitle' => ''.e($widget->noTitle).'','name' => ''.e($widget->name).'','fixed' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((empty($widget->fixed) ? false : true )),'alwaysVisible' => ''.e($widget->alwaysVisible).'','id' => 'widget_wrapper_'.e($widget->id).'']); ?>
                <div hx-get="<?php echo e($widget->widgetUrl); ?>"
                     hx-trigger="revealed"
                     id="<?php echo e($widget->id); ?>"
                     class="tw-h-full"
                     hx-swap="innerHTML">
                    <?php if (isset($component)) { $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.loadingText','data' => ['type' => ''.e($widget->widgetLoadingIndicator).'','count' => '1','includeHeadline' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::loadingText'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => ''.e($widget->widgetLoadingIndicator).'','count' => '1','includeHeadline' => 'true']); ?>
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
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ef397cf2f12ec369cf8bec52000c843)): ?>
<?php $attributes = $__attributesOriginal6ef397cf2f12ec369cf8bec52000c843; ?>
<?php unset($__attributesOriginal6ef397cf2f12ec369cf8bec52000c843); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ef397cf2f12ec369cf8bec52000c843)): ?>
<?php $component = $__componentOriginal6ef397cf2f12ec369cf8bec52000c843; ?>
<?php unset($__componentOriginal6ef397cf2f12ec369cf8bec52000c843); ?>
<?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<script>

<?php $tpl->dispatchTplEvent('scripts.afterOpen'); ?>

jQuery(document).ready(function() {

    leantime.widgetController.initGrid();

    <?php (session(["usersettings.modals.homeDashboardTour" => 1])); ?>

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Dashboard/Templates/home.blade.php ENDPATH**/ ?>