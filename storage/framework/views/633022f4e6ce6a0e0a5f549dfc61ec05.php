<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginal4607a6de1440b8f047e053c555f45f99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4607a6de1440b8f047e053c555f45f99 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'auth::components.onboardingProgress','data' => ['percentComplete' => 64,'current' => 'personalization','completed' => ['account', 'theme']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth::onboardingProgress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['percentComplete' => 64,'current' => 'personalization','completed' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['account', 'theme'])]); ?>
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

<h2>🎨 Creating A Comfortable View</h2>
<p>Your favorite color mode and scheme.<br /></p>

<div class="regcontent">

    <form id="resetPassword" action="" method="post">
        <input type="hidden" name="step" value="3" />

        <?php echo e($tpl->displayInlineNotification()); ?>




        <div class="row">
            <div class="col-md-12">
                <label for="colormode" ><?php echo e(__('label.colormode')); ?></label>

                <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ($userColorMode == 'light') ? 'true' : '','id' => 'light','name' => 'colormode','value' => 'light','label' => 'Light','onclick' => 'leantime.snippets.toggleTheme(\'light\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($userColorMode == 'light') ? 'true' : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('light'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('colormode'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('light'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Light'),'onclick' => 'leantime.snippets.toggleTheme(\'light\')']); ?>
                    <label for="colormode-light" class="tw-w-[200px]">
                        <i class="fa-solid fa-sun tw-font-xxl"></i>
                    </label>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $attributes = $__attributesOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__attributesOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $component = $__componentOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__componentOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ($userColorMode == 'dark') ? 'true' : '','id' => 'dark','name' => 'colormode','value' => 'dark','label' => 'Dark','onclick' => 'leantime.snippets.toggleTheme(\'dark\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($userColorMode == 'dark') ? 'true' : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('dark'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('colormode'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('dark'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Dark'),'onclick' => 'leantime.snippets.toggleTheme(\'dark\')']); ?>
                    <label for="colormode-light" class="tw-w-[200px]">
                        <i class="fa-solid fa-moon tw-font-xxl"></i>
                    </label>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $attributes = $__attributesOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__attributesOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $component = $__componentOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__componentOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-12">
                <label>Color Scheme</label>
                <?php $__currentLoopData = $availableColorSchemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $scheme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['class' => 'circle','selected' => ($userColorScheme == $key) ? 'true' : '','id' => $key,'name' => 'colorscheme','value' => $key,'label' => __($scheme['name']),'onclick' => 'leantime.snippets.toggleColors(\''.e($scheme['primaryColor']).'\',\''.e($scheme['secondaryColor']).'\');']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'circle','selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($userColorScheme == $key) ? 'true' : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('colorscheme'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__($scheme['name'])),'onclick' => 'leantime.snippets.toggleColors(\''.e($scheme['primaryColor']).'\',\''.e($scheme['secondaryColor']).'\');']); ?>
                        <label for="color-<?php echo e($key); ?>" class="colorCircle"
                               style="background:linear-gradient(135deg, <?php echo e($scheme["primaryColor"]); ?> 20%, <?php echo e($scheme["secondaryColor"]); ?> 100%);">
                        </label>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $attributes = $__attributesOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__attributesOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $component = $__componentOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__componentOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        <br /> <br />
        <div class="tw-text-right">
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/auth/userInvite/'.e($inviteId).'?step=2','contentRole' => 'tertiary','style' => 'width:auto; margin-right:10px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/auth/userInvite/'.e($inviteId).'?step=2','contentRole' => 'tertiary','style' => 'width:auto; margin-right:10px']); ?>Back <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
            <input type="submit" name="createAccount" class="tw-w-auto" style="width:auto" value="<?php echo $tpl->language->__("buttons.next"); ?>" />
        </div>


    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Auth/Templates/userInvite3.blade.php ENDPATH**/ ?>