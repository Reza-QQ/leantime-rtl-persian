<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginal4607a6de1440b8f047e053c555f45f99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4607a6de1440b8f047e053c555f45f99 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'auth::components.onboardingProgress','data' => ['percentComplete' => 37,'current' => 'theme','completed' => ['account']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth::onboardingProgress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['percentComplete' => 37,'current' => 'theme','completed' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['account'])]); ?>
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

<h2><?php echo e(__('titles.determine_visual_experience')); ?></h2>
<p><?php echo e(__('text.choose_a_theme_and_font_easy_to_read')); ?></p>

<div class="regcontent">

    <form id="resetPassword" action="" method="post">
        <input type="hidden" name="step" value="2" />

        <?php echo e($tpl->displayInlineNotification()); ?>


        <div class="row-fluid">
            <div class="form-group">
                <label for="themeSelect">Optimal Stimulation</label>
                <span class='field tw-flex'>

                     <?php
                     $themeAll = $themeCore->getAll();
                     foreach ($themeAll as $key => $theme) { ?>
                         <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ''.e(($userTheme == $key ? 'true' : 'false')).'','id' => '','name' => 'theme','value' => $key,'label' => '','class' => 'tw-w-1/2','onclick' => 'leantime.snippets.toggleBg(\''.e($key).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e(($userTheme == $key ? 'true' : 'false')).'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('theme'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'class' => 'tw-w-1/2','onclick' => 'leantime.snippets.toggleBg(\''.e($key).'\')']); ?>
                            <img src="<?php echo e(BASE_URL); ?>/dist/images/background-<?php echo e($key); ?>.png" style="margin:0; border-radius:10px;" />
                                 <br /><?= $tpl->__($theme['name']) ?>
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

                    <?php } ?>
                </span>
            </div>
            <br />
            <div class="form-group">
                <label>Readability</label>
                <div class="tw-flex">
                    <?php $__currentLoopData = $availableFonts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $font): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['dataTippyContent' => ''.e($fontTooltips[$key]).'','selected' => ($themeFont == $font) ? 'true' : '','id' => $key,'name' => 'themeFont','value' => $font,'label' => $font,'onclick' => 'leantime.snippets.toggleFont(\''.e($font).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-tippy-content' => ''.e($fontTooltips[$key]).'','selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($themeFont == $font) ? 'true' : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('themeFont'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($font),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($font),'onclick' => 'leantime.snippets.toggleFont(\''.e($font).'\')']); ?>
                            <label for="selectable-<?php echo e($key); ?>" class="font tw-w-[150px]"
                                   style="font-family:'<?php echo e($font); ?>'; font-size:16px;">
                                The quick brown fox jumps over the lazy dog
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

        </div>
        <br />
        <div class="tw-text-right">
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/auth/userInvite/'.e($inviteId).'','contentRole' => 'tertiary','style' => 'width:auto; margin-right:10px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/auth/userInvite/'.e($inviteId).'','contentRole' => 'tertiary','style' => 'width:auto; margin-right:10px']); ?>Back <?php echo $__env->renderComponent(); ?>
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

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Auth/Templates/userInvite2.blade.php ENDPATH**/ ?>