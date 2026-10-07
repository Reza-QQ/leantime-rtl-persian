<div class="center padding-lg">

    <div class="row">
        <div class="col-md-12">
            <div style='width:50%' class='svgContainer'>
                <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_design_data_khdb.svg'); ?>

            </div>
            <h1>پروژه‌های خود را به‌راحتی تعریف کنید</h1>
            <p>نقشه‌ها فرصت شما برای معنا بخشیدن به همه داده‌ها هستند. Leantime ابزارها و بوم‌های متنوعی برای تعریف پیشینه پروژه شما از طریق بوم‌های مدل کسب‌وکار، تحلیل SWOT یا نقشه‌های همدلی دارد.<br /><br />
            اگر نمی‌دانید از کجا شروع کنید، پیشنهاد می‌کنیم یک «بوم ارزش پروژه» ایجاد کنید. این بوم به مهم‌ترین پرسش‌های پروژه شما پاسخ می‌دهد:

                مشتری شما کیست؟ <br />
                چه مشکلی را حل می‌کنید؟<br />
                راه‌حل شما چیست؟<br />
                راه‌حل شما چه مزیتی نسبت به رقبای شما دارد<br />
            </p>
            <br /><br />
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/valuecanvas/showCanvas','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/valuecanvas/showCanvas','contentRole' => 'primary']); ?>ایجاد یک بوم ارزش پروژه <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?><br />

        </div>
    </div>


</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Help/Templates/blueprints.blade.php ENDPATH**/ ?>