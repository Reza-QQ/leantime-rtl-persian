<?php $__env->startSection('content'); ?>


    <?php if (isset($component)) { $__componentOriginal4607a6de1440b8f047e053c555f45f99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4607a6de1440b8f047e053c555f45f99 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'auth::components.onboardingProgress','data' => ['percentComplete' => 88,'current' => 'time','completed' => ['account', 'theme', 'personalization']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth::onboardingProgress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['percentComplete' => 88,'current' => 'time','completed' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['account', 'theme', 'personalization'])]); ?>
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


    <h2>🗓️ Shaping A Daily Flow</h2>
    <p>We'll use these times to help prioritize your tasks</p>

<div class="regcontent">

    <form id="resetPassword" action="" method="post">

        <input type="hidden" name="step" value="4"/>

        <?php echo e($tpl->displayInlineNotification()); ?>


        <label>What time do you usually start working?</label>
        <div class="">
            <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ''.e($daySchedule['workStart'] == '8' ? 'true' : 'false').'','id' => 'daySchedule-workStart-1','name' => 'daySchedule-workStart-button','value' => '8','label' => '','onclick' => 'jQuery(\'#daySchedule-workStart\').val(\'8\').hide(); jQuery(\'#daySchedule-workStart-3\').show();','class' => 'compact']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e($daySchedule['workStart'] == '8' ? 'true' : 'false').'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workStart-1'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workStart-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('8'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'onclick' => 'jQuery(\'#daySchedule-workStart\').val(\'8\').hide(); jQuery(\'#daySchedule-workStart-3\').show();','class' => 'compact']); ?>
                <label for="" class="">
                    <?php echo e(format($dayHourOptions[8]['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($dayHourOptions[8]['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ''.e($daySchedule['workStart'] == '10' ? 'true' : 'false').'','id' => 'daySchedule-workStart-2','name' => 'daySchedule-workStart-button','value' => '10','label' => '','onclick' => 'jQuery(\'#daySchedule-workStart\').val(\'10\').hide(); jQuery(\'#daySchedule-workStart-3\').show(); ','class' => 'compact']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e($daySchedule['workStart'] == '10' ? 'true' : 'false').'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workStart-2'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workStart-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('10'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'onclick' => 'jQuery(\'#daySchedule-workStart\').val(\'10\').hide(); jQuery(\'#daySchedule-workStart-3\').show(); ','class' => 'compact']); ?>
                <label for="" class="">
                    <?php echo e(format($dayHourOptions[10]['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($dayHourOptions[10]['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => '','id' => 'daySchedule-workStart-3','name' => 'daySchedule-workStart-button','value' => '','label' => '','class' => 'compact','onclick' => 'jQuery(this).hide(); jQuery(\'#daySchedule-workStart\').show()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => '','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workStart-3'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workStart-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'class' => 'compact','onclick' => 'jQuery(this).hide(); jQuery(\'#daySchedule-workStart\').show()']); ?>
                <label for="" class="">
                    <i class="fa fa-clock"></i> Select my own
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
            <select name="daySchedule-workStart" id="daySchedule-workStart" style="display:none; vertical-align: top;">
                <?php $__currentLoopData = $dayHourOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>">
                        <?php echo e(format($value['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($value['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br />
        <label>When do you normally take a lunch break from work?</label>
        <div class="">
            <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ''.e($daySchedule['lunch'] == '12' ? 'true' : 'false').'','id' => 'daySchedule-lunch-1','name' => 'daySchedule-lunch-button','value' => '12','label' => '','onclick' => 'jQuery(\'#daySchedule-lunch\').val(\'12\').hide(); jQuery(\'#daySchedule-lunch-3\').show();','class' => 'compact']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e($daySchedule['lunch'] == '12' ? 'true' : 'false').'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-lunch-1'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-lunch-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('12'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'onclick' => 'jQuery(\'#daySchedule-lunch\').val(\'12\').hide(); jQuery(\'#daySchedule-lunch-3\').show();','class' => 'compact']); ?>
                <label for="" class="">
                    <?php echo e(format($dayHourOptions[12]['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($dayHourOptions[12]['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ''.e($daySchedule['lunch'] == '14' ? 'true' : 'false').'','id' => 'daySchedule-lunch-2','name' => 'daySchedule-lunch-button','value' => '14','label' => '','onclick' => 'jQuery(\'#daySchedule-lunch\').val(\'14\').hide(); jQuery(\'#daySchedule-lunch-3\').show();','class' => 'compact']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e($daySchedule['lunch'] == '14' ? 'true' : 'false').'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-lunch-2'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-lunch-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('14'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'onclick' => 'jQuery(\'#daySchedule-lunch\').val(\'14\').hide(); jQuery(\'#daySchedule-lunch-3\').show();','class' => 'compact']); ?>
                <label for="" class="">
                    <?php echo e(format($dayHourOptions[14]['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($dayHourOptions[14]['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => '','id' => 'daySchedule-lunch-3','name' => 'daySchedule-lunch-button','value' => '','label' => '','class' => 'compact','onclick' => 'jQuery(this).hide(); jQuery(\'#daySchedule-lunch\').show()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => '','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-lunch-3'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-lunch-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'class' => 'compact','onclick' => 'jQuery(this).hide(); jQuery(\'#daySchedule-lunch\').show()']); ?>
                <label for="" class="">
                    <i class="fa fa-clock"></i> Select my own
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
            <select name="daySchedule-lunch" id="daySchedule-lunch" style="display:none; vertical-align: top;">
                <?php $__currentLoopData = $dayHourOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>">
                        <?php echo e(format($value['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($value['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br />
        <label>When do you normally end your work day? 🥳</label>

        <div class="">
            <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ''.e($daySchedule['workEnd'] == '16' ? 'true' : 'false').'','id' => 'daySchedule-workEnd-1','name' => 'daySchedule-workEnd-button','value' => '16','label' => '','onclick' => 'jQuery(\'#daySchedule-workEnd\').val(\'16\').hide(); jQuery(\'#daySchedule-workEnd-3\').show();','class' => 'compact']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e($daySchedule['workEnd'] == '16' ? 'true' : 'false').'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workEnd-1'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workEnd-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('16'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'onclick' => 'jQuery(\'#daySchedule-workEnd\').val(\'16\').hide(); jQuery(\'#daySchedule-workEnd-3\').show();','class' => 'compact']); ?>
                <label for="" class="">
                    <?php echo e(format($dayHourOptions[16]['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($dayHourOptions[16]['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ''.e($daySchedule['workEnd'] == '18' ? 'true' : 'false').'','id' => 'daySchedule-workEnd-2','name' => 'daySchedule-workEnd-button','value' => '18','label' => '','onclick' => 'jQuery(\'#daySchedule-workEnd\').val(\'18\').hide(); jQuery(\'#daySchedule-workEnd-3\').show();','class' => 'compact']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e($daySchedule['workEnd'] == '18' ? 'true' : 'false').'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workEnd-2'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workEnd-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('18'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'onclick' => 'jQuery(\'#daySchedule-workEnd\').val(\'18\').hide(); jQuery(\'#daySchedule-workEnd-3\').show();','class' => 'compact']); ?>
                <label for="" class="">
                    <?php echo e(format($dayHourOptions[18]['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($dayHourOptions[18]['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => '','id' => 'daySchedule-workEnd-3','name' => 'daySchedule-workEnd-button','value' => '','label' => '','class' => 'compact','onclick' => 'jQuery(this).hide(); jQuery(\'#daySchedule-workEnd\').show()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => '','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workEnd-3'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('daySchedule-workEnd-button'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'class' => 'compact','onclick' => 'jQuery(this).hide(); jQuery(\'#daySchedule-workEnd\').show()']); ?>
                <label for="" class="">
                    <i class="fa fa-clock"></i> Select my own
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
            <select name="daySchedule-workEnd" id="daySchedule-workEnd" style="display:none; vertical-align: top;">
                <?php $__currentLoopData = $dayHourOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>">
                        <?php echo e(format($value['start'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?> - <?php echo e(format($value['end'], null, \Leantime\Core\Support\FromFormat::User24hTime)->time()); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        































        <br /> <br />
        <div class="tw-text-right">
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/auth/userInvite/'.e($inviteId).'?step=3','contentRole' => 'tertiary','style' => 'width:auto; margin-right:10px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/auth/userInvite/'.e($inviteId).'?step=3','contentRole' => 'tertiary','style' => 'width:auto; margin-right:10px']); ?>Back <?php echo $__env->renderComponent(); ?>
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

<script>
    function applyToAllClick() {
        jQuery('.dayOfWeekInputs').each(function() {

            let linkParentContainer = jQuery(this);

            jQuery(this).find('.applyBox a').click(function() {
                let startInput = jQuery(linkParentContainer).find("input.dayStart").val();
                let endInput = jQuery(linkParentContainer).find("input.dayEnd").val();

                jQuery('.dayOfWeekInputs input.dayStart').val(startInput);
                jQuery('.dayOfWeekInputs input.dayEnd').val(endInput);
            });
        })
    }

    jQuery(document).ready(function() {
        applyToAllClick();

        var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;

        jQuery("#timezone").val(timezone);

        var now=new Date(2010,11,31);
        var str=now.toLocaleDateString();



        str=str.replace("31","dd");
        str=str.replace("12","mm");
        str=str.replace("2010","yyyy");

    })

    function showTimeForm($id) {
        let isVisible = jQuery('.dayOfWeekInput-'+$id).hasClass("tw-flex");
        if(isVisible) {
            jQuery('.dayOfWeekInput-'+$id).removeClass("tw-flex");
            jQuery('.dayOfWeekInput-'+$id).addClass("tw-hidden");
        }else{
            jQuery('.dayOfWeekInput-'+$id).addClass("tw-flex");
            jQuery('.dayOfWeekInput-'+$id).removeClass("tw-hidden");
        }

        jQuery('.dayOfWeekInputs').find('.applyBox').html("");
        jQuery('.dayOfWeekInputs.tw-flex').each(function(index){

            if(index == 0) {
                jQuery(this).find('.applyBox').html("<a href='javascript:void(0);'>Apply to all")
            }else{
                jQuery(this).find('.applyBox').html();
            }
        });

        applyToAllClick();

        }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Auth/Templates/userInvite4.blade.php ENDPATH**/ ?>