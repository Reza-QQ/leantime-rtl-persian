<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginal4607a6de1440b8f047e053c555f45f99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4607a6de1440b8f047e053c555f45f99 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'auth::components.onboardingProgress','data' => ['percentComplete' => 100,'current' => '','completed' => ['account', 'theme', 'personalization', 'time']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth::onboardingProgress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['percentComplete' => 100,'current' => '','completed' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['account', 'theme', 'personalization', 'time'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4607a6de1440b8f047e053c555f45f99)): ?>
<?php $attributes = $__attributesOriginal4607a6de1440b8f047e053c555f45f99; ?>
<?php unset($__attributesOriginal4607a6de1440b8f047e053c555f45f99); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4607a6de1440b8f047e053c555f45f99)): ?>
<?php $component = $__componentOriginal4607a6de1440b8f047e053c555f45f99; ?>
<?php unset($__componentOriginal4607a6de1440b8f047e053c555f45f99); ?>
<?php endif; ?>

<h2>🎉 Your Leantime journey is about to begin</h2>

<div class="regcontent">

    <form id="resetPassword" action="" method="post">

        <input type="hidden" name="step" value="5"/>
        <input type="hidden" name="complete" value="1"/>

        <?php echo e($tpl->displayInlineNotification()); ?>


        <div class="row">
            <div class="col-md-6">
                <div class="ticketBox tw-p-[20px]">
                    <span class="fancyLink">Did you know?</span><br />
                    <span style="font-size:16px;">Setting Intentions has been shown to <strong>more than double the success rate</strong> of completing a task.</span>
                </div>
            </div>
            <div class="col-md-6">
                <?php if (isset($component)) { $__componentOriginal088b80ac345989c7752ee327dee3d972 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal088b80ac345989c7752ee327dee3d972 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.undrawSvg','data' => ['image' => 'undraw_adventure_map_hnin.svg','maxWidth' => '60%','maxHeight' => '300px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::undrawSvg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => 'undraw_adventure_map_hnin.svg','maxWidth' => '60%','maxHeight' => '300px']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal088b80ac345989c7752ee327dee3d972)): ?>
<?php $attributes = $__attributesOriginal088b80ac345989c7752ee327dee3d972; ?>
<?php unset($__attributesOriginal088b80ac345989c7752ee327dee3d972); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal088b80ac345989c7752ee327dee3d972)): ?>
<?php $component = $__componentOriginal088b80ac345989c7752ee327dee3d972; ?>
<?php unset($__componentOriginal088b80ac345989c7752ee327dee3d972); ?>
<?php endif; ?>
            </div>
        </div>

        <p><br />From here, we'll help you turn your task list into a project and goals.
            Then we'll work<br /> together to identify your most important tasks so you can create some
            intentions<br />to get the work done.</p> <br />

        <br />
        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => 'Complete Sign up','name' => 'createAccount']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => 'Complete Sign up','name' => 'createAccount']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>


    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Auth/Templates/userInvite5.blade.php ENDPATH**/ ?>