<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'includeTitle' => true,
    'randomImage' => '',
    'totalTickets' => 0,
    'projectCount' => 0,
    'closedTicketsCount' => 0,
    'ticketsInGoals' => 0,
    'doneTodayCount' => 0,
    'totalTodayCount' => 0,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'includeTitle' => true,
    'randomImage' => '',
    'totalTickets' => 0,
    'projectCount' => 0,
    'closedTicketsCount' => 0,
    'ticketsInGoals' => 0,
    'doneTodayCount' => 0,
    'totalTodayCount' => 0,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="welcome-widget">

    <div style="padding:0px 0px">
        <div style="font-size:18px; color:var(--main-titles-color); padding-bottom:15px; padding-top:8px">
            👋 <?php echo e(__('text.hi')); ?> <?php echo e(session()->get("userdata.name")); ?>


            <div class="tw-float-right">
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/users/editOwn#theme','contentRole' => 'link','style' => 'color:var(--main-titles-color); padding:0px; width:31px; line-height:31px; text-align: center;','dataTippyContent' => ''.e(__('text.update_theme')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/users/editOwn#theme','contentRole' => 'link','style' => 'color:var(--main-titles-color); padding:0px; width:31px; line-height:31px; text-align: center;','data-tippy-content' => ''.e(__('text.update_theme')).'']); ?>
                    <i class="fa-solid fa-palette"></i>
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

                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/widgets/widgetManager','contentRole' => 'link','style' => 'color:var(--main-titles-color); padding:0px; width:31px; line-height:31px; text-align: center;','dataTippyContent' => ''.e(__('text.update_dashboard')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/widgets/widgetManager','contentRole' => 'link','style' => 'color:var(--main-titles-color); padding:0px; width:31px; line-height:31px; text-align: center;','data-tippy-content' => ''.e(__('text.update_dashboard')).'']); ?>
                    <span class="fa fa-fw fa-cogs"></span>
                    <?php if($showSettingsIndicator): ?>
                        <span class='new-indicator'></span>
                    <?php endif; ?>
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
            </div>
        </div>

        <div class="tw-flex tw-gap-x-[10px]">

            <div class="bigNumberBox tw-flex-1 tw-flex-grow">
                <div class="bigNumberBoxInner">
                    <div class="bigNumberBoxNumber">⏱️ <?php echo e($doneTodayCount); ?>/<?php echo e($totalTodayCount); ?> </div>
                    <div class="bigNumberBoxText"><?php echo e(__("welcome_widget.timeboxed_completed")); ?></div>
                </div>
            </div>

            <div class="bigNumberBox tw-flex-1 tw-flex-grow">
                <div class="bigNumberBoxInner">
                    <div class="bigNumberBoxNumber">🥳 <?php echo e($closedTicketsCount); ?> </div>
                    <div class="bigNumberBoxText"><?php echo e(__("welcome_widget.tasks_completed")); ?></div>
                </div>
            </div>

            <div class="bigNumberBox tw-flex-1 tw-flex-grow ">

                <div class="bigNumberBoxInner">
                    <div class="bigNumberBoxNumber">📥 <?php echo e($totalTickets); ?> </div>
                    <div class="bigNumberBoxText"><?php echo e(__("welcome_widget.tasks_left")); ?></div>
                </div>
            </div>

            <div class="bigNumberBox tw-flex-1 tw-flex-grow">

                <div class="bigNumberBoxInner">
                    <div class="bigNumberBoxNumber">🎯 <?php echo e($ticketsInGoals); ?> </div>
                    <div class="bigNumberBoxText"><?php echo e(__("welcome_widget.goals_contributing_to")); ?></div>
                </div>
            </div>

        </div>
    </div>

    <div class="clear"></div>

    <?php $tpl->dispatchTplEvent('afterWelcomeMessage'); ?>

    <div class="clear"></div>

</div>

<?php $tpl->dispatchTplEvent('afterWelcomeMessageBox'); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Widgets/Templates/partials/welcome.blade.php ENDPATH**/ ?>