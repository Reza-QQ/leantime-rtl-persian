<div class="center padding-lg" style="max-width:1200px;">

    <div class="row">
        <div class="col-md-12">
            <h1 style="font-size:var(--font-size-xxxl);">Create something new</h1><br />
            <?php echo __("text.creation_hub"); ?>


            <br />
            <br />
        </div>
    </div>


    <div class="row">

        <?php $__currentLoopData = $projectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 <?php echo e($projectType["active"] !== true ? "disabled" : ""); ?>"  >
            <div class="profileBox">

                <?php if (isset($component)) { $__componentOriginal088b80ac345989c7752ee327dee3d972 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal088b80ac345989c7752ee327dee3d972 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.undrawSvg','data' => ['image' => ''.e($projectType['image']).'','headline' => ''.e(__($projectType['label'])).'','maxWidth' => '50%','height' => '150px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::undrawSvg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e($projectType['image']).'','headline' => ''.e(__($projectType['label'])).'','maxWidth' => '50%','height' => '150px']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal088b80ac345989c7752ee327dee3d972)): ?>
<?php $attributes = $__attributesOriginal088b80ac345989c7752ee327dee3d972; ?>
<?php unset($__attributesOriginal088b80ac345989c7752ee327dee3d972); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal088b80ac345989c7752ee327dee3d972)): ?>
<?php $component = $__componentOriginal088b80ac345989c7752ee327dee3d972; ?>
<?php unset($__componentOriginal088b80ac345989c7752ee327dee3d972); ?>
<?php endif; ?>

                <br />
                <?php echo __($projectType["description"]); ?>

                <br /><br />
                <?php if($projectType["active"] == true ): ?>
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/'.e($projectType['url']).'','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/'.e($projectType['url']).'','contentRole' => 'primary']); ?><?php echo e(__($projectType['btnLabel'])); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#','contentRole' => 'primary','class' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#','contentRole' => 'primary','class' => 'disabled']); ?>Not Available in this plan <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                <?php endif; ?>
                <div class="clearall"></div>

            </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/createnew.blade.php ENDPATH**/ ?>