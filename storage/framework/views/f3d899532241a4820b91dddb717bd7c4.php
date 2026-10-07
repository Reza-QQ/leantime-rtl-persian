<div class="" style="min-width:50%;">
    <h1><?php echo e(__("headlines.widget_manager")); ?></h1>
    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','contentRole' => 'secondary','class' => 'pull-right','link' => ''.e(BASE_URL).'/dashboard/home?resetDashboard=true','style' => 'margin-bottom:10px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','contentRole' => 'secondary','class' => 'pull-right','link' => ''.e(BASE_URL).'/dashboard/home?resetDashboard=true','style' => 'margin-bottom:10px;']); ?><i class="fa-solid fa-arrow-rotate-left"></i> بازگردانی داشبورد <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
    <p><?php echo e(__("text.choose_widgets")); ?></p>
    <br />
    <div class="row">
        <?php $__currentLoopData = $availableWidgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widgetId => $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($widget->alwaysVisible !== true): ?>
                <?php ( $widget->name = __($widget->name)); ?>
                <?php ( $widget->description = __($widget->description)); ?>
                <div class="col-md-4">
                    <div class="projectBox tw-p-m tw-min-w-[250px] <?php if(in_array($widgetId, array_keys($newWidgets)) && !isset($activeWidgets[$widgetId])): ?> newWidget <?php endif; ?>">
                        <h5><?php echo e($widget->name); ?></h5>
                        <p><?php echo $widget->description; ?> </p>
                        <div class="right">
                            <?php if($widget->alwaysVisible == false): ?>
                                <input
                                    type="checkbox"
                                    class="toggle"
                                    id="widget-toggle-<?php echo e($widget->id); ?>"
                                    onclick="leantime.widgetController.toggleWidgetVisibility('<?php echo e($widget->id); ?>', this, <?php echo e(json_encode($widget)); ?>)"
                                    <?php if(isset($activeWidgets[$widget->id])): ?>
                                        checked='checked'
                                        <?php if(isset($activeWidgets[$widget->id]->isNew) && $activeWidgets[$widget->id]->isNew): ?>
                                            data-is-new="true"
                                        <?php endif; ?>
                                    <?php endif; ?>
                                />
                                <label for="widget-toggle-<?php echo e($widget->id); ?>"></label>
                            <?php endif; ?>
                        </div>
                        <div class="clearall"></div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="clear"></div>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Widgets/Templates/widgetManager.blade.php ENDPATH**/ ?>