<div class="center padding-lg" style="width:800px;">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($component)) { $__componentOriginal088b80ac345989c7752ee327dee3d972 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal088b80ac345989c7752ee327dee3d972 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.undrawSvg','data' => ['image' => 'undraw_joyride_re_968t.svg','maxWidth' => 'auto','headlineSize' => 'var(--font-size-xxxl)','maxheight' => 'auto','height' => '250px','headline' => 'مدیریت پروژه‌ها']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::undrawSvg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => 'undraw_joyride_re_968t.svg','maxWidth' => 'auto','headlineSize' => 'var(--font-size-xxxl)','maxheight' => 'auto','height' => '250px','headline' => 'مدیریت پروژه‌ها']); ?> <?php echo $__env->renderComponent(); ?>
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
    <div class="row onboarding">
        <div class="col-md-12" style="font-size:var(--font-size-l);">
            <br />
            <div id="firstLoginContent">
                <p><br />پروژه‌ها در Leantime فضاهای کاری مشترکی هستند که در آن شما و تیمتان کار را به‌طور کارآمد سازمان‌دهی، پیگیری و تحویل می‌دهید. هر پروژه به عنوان ظرفی برای اهداف، وظایف و نقاط عطف مرتبط عمل می‌کند و به شما امکان می‌دهد پیشرفت را در یک مکان مرکزی نظارت کنید. <br /><br />
                    چه در حال مدیریت کار، تحصیل یا ابتکارات شخصی داخلی باشید، پروژه‌های Leantime ساختار و ابزارهای لازم برای تبدیل ایده‌ها به نتایج موفق را فراهم می‌کنند.
                </p><br />
            </div>
            <br /><br />
            <div class="row">
                <div class="col-md-12 tw-text-center">
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0)','contentRole' => 'tertiary','onclick' => 'leantime.helperController.closeModal()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0)','contentRole' => 'tertiary','onclick' => 'leantime.helperController.closeModal()']); ?>خودم کاوش می‌کنم <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0)','contentRole' => 'primary','onclick' => 'leantime.helperController.closeModal(); leantime.helperController.startProjectDashboardTour();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0)','contentRole' => 'primary','onclick' => 'leantime.helperController.closeModal(); leantime.helperController.startProjectDashboardTour();']); ?><?php echo e(__("buttons.start_tour")); ?> <i class="fa-solid fa-arrow-right"></i> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 tw-text-center">
                    <form hx-post="<?php echo e(BASE_URL); ?>/help/helperModal/dontShowAgain" hx-trigger="change" hx-swap="none">
                        <label class="tw-text-sm tw-mt-sm" >
                            <input type="hidden" name="modalId" value="projectDashboard" />
                            <input type="checkbox" id="dontShowAgain" name="hidePermanently"  style="margin-top:-2px;">
                            دیگر این را نشان نده
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Help/Templates/projectDashboard.blade.php ENDPATH**/ ?>