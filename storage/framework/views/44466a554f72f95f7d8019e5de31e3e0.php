<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginal4607a6de1440b8f047e053c555f45f99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4607a6de1440b8f047e053c555f45f99 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'auth::components.onboardingProgress','data' => ['percentComplete' => 12,'current' => 'account','completed' => []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth::onboardingProgress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['percentComplete' => 12,'current' => 'account','completed' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([])]); ?>
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

<h2><?php echo e(__('titles.account_details')); ?></h2>

<?php $tpl->dispatchTplEvent('afterPageHeaderClose'); ?>
<div class="regcontent">
    <?php $tpl->dispatchTplEvent('afterRegcontentOpen'); ?>

    <form id="resetPassword" action="" method="post">
        <?php $tpl->dispatchTplEvent('afterFormOpen'); ?>

        <?php echo $tpl->displayInlineNotification(); ?>

        <input type="hidden" name="step" value="1"/>

        <div class="">
            <label for="name"><?php echo $tpl->language->__("label.name"); ?></label>
            <input type="text" name="name" style="margin-bottom:15px" id="name" placeholder="<?php echo $tpl->language->__("input.placeholders.name"); ?>" value="<?=$tpl->escape($user['firstname']); ?>" />
        </div>
        <div class="">
            <label for="jobTitle"><?php echo $tpl->language->__("label.role_or_title"); ?></label>
            <input type="text" name="jobTitle" id="jobTitle" style="margin-bottom:15px" placeholder="<?php echo $tpl->language->__("input.placeholders.jobtitle"); ?>" value="<?=$tpl->escape($user['jobTitle']); ?>" />

        </div>
        <div class="">
            <label for="password"><?php echo $tpl->language->__("label.password"); ?></label>
            <input type="password" name="password" autocomplete="off" id="password" style="margin-bottom:15px" placeholder="<?php echo $tpl->language->__("input.placeholders.enter_new_password"); ?>" />
            <span id="pwStrength" style="width:100%;"></span>
        </div>
        <small><?=$tpl->__('label.passwordRequirements') ?></small><br /><br />
        <div class="">
            <input type="hidden" name="saveAccount" value="1" />
            <?php $tpl->dispatchTplEvent('beforeSubmitButton'); ?>
            <div class="tw-text-right">
                <input type="submit" name="createAccount" class="tw-w-auto" style="width:auto" value="<?php echo $tpl->language->__("buttons.next"); ?>" />
            </div>

        </div>
        <?php $tpl->dispatchTplEvent('beforeFormClose'); ?>
    </form>
    <?php $tpl->dispatchTplEvent('beforeRegcontentClose'); ?>
</div>

<script>
    leantime.usersController.checkPWStrength('password');
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Auth/Templates/userInvite.blade.php ENDPATH**/ ?>