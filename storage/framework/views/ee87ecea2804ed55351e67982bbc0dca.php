<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'includeTitle' => true,
    'allProjects' => [],
    'background' => ''
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
    'allProjects' => [],
    'background' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div id="myProjectsWidget"
     hx-get="<?php echo e(BASE_URL); ?>/widgets/myProjects/get"
     hx-trigger="HTMX.updateProjectList from:body"
     hx-target="#myProjectsWidget"
     hx-swap="outerHTML">
    <?php if(count($allProjects) == 0): ?>
            <br /><br />
            <div class='center'>
                <div style='width:70%' class='svgContainer'>
                    <?php echo e(__('notifications.not_assigned_to_any_project')); ?>

                    <?php if($login::userIsAtLeast($roles::$manager)): ?>
                        <br /><br />
                        <a href='<?php echo e(BASE_URL); ?>/projects/newProject' class='btn btn-primary'><?php echo e(__('link.new_project')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
    <?php endif; ?>
    <div class="clearall"></div>

    <?php if (isset($component)) { $__componentOriginalb42738ebdee3365d3e140e48fd37e95c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb42738ebdee3365d3e140e48fd37e95c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.accordion','data' => ['id' => 'myProjectWidget-favorites','class' => ''.e($background).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'myProjectWidget-favorites','class' => ''.e($background).'']); ?>
         <?php $__env->slot('title', null, []); ?> 
            ⭐ مورد علاقه‌های من
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('content', null, []); ?> 

            <div class="row">
                <?php
                    $hasFavorites = false;
                ?>
                <?php $__currentLoopData = $allProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($project['isFavorite'] == true): ?>
                        <div class="col-md-4">
                            <?php echo $__env->make("projects::partials.projectCard", ["project" => $project, "type" => $type], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                        <?php
                            $hasFavorites = true;
                        ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($hasFavorites === false): ?>
                    شما هیچ مورد علاقه‌ای ندارید. 😿
                <?php endif; ?>
            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb42738ebdee3365d3e140e48fd37e95c)): ?>
<?php $attributes = $__attributesOriginalb42738ebdee3365d3e140e48fd37e95c; ?>
<?php unset($__attributesOriginalb42738ebdee3365d3e140e48fd37e95c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb42738ebdee3365d3e140e48fd37e95c)): ?>
<?php $component = $__componentOriginalb42738ebdee3365d3e140e48fd37e95c; ?>
<?php unset($__componentOriginalb42738ebdee3365d3e140e48fd37e95c); ?>
<?php endif; ?>


    <?php if (isset($component)) { $__componentOriginalb42738ebdee3365d3e140e48fd37e95c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb42738ebdee3365d3e140e48fd37e95c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.accordion','data' => ['id' => 'myProjectWidget-otherProjects','class' => ''.e($background).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'myProjectWidget-otherProjects','class' => ''.e($background).'']); ?>
         <?php $__env->slot('title', null, []); ?> 
            🗂️ همه پروژه‌های اختصاص‌یافته
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('content', null, []); ?> 

            <div class="row">
                <?php $__currentLoopData = $allProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($project['isFavorite'] == false): ?>

                        <div class="col-md-4">
                            <?php echo $__env->make("projects::partials.projectCard", ["project" => $project, "type" => $type], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>

                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb42738ebdee3365d3e140e48fd37e95c)): ?>
<?php $attributes = $__attributesOriginalb42738ebdee3365d3e140e48fd37e95c; ?>
<?php unset($__attributesOriginalb42738ebdee3365d3e140e48fd37e95c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb42738ebdee3365d3e140e48fd37e95c)): ?>
<?php $component = $__componentOriginalb42738ebdee3365d3e140e48fd37e95c; ?>
<?php unset($__componentOriginalb42738ebdee3365d3e140e48fd37e95c); ?>
<?php endif; ?>

</div>

<?php $tpl->dispatchTplEvent('afterMyProjectBox'); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Widgets/Templates/partials/myProjects.blade.php ENDPATH**/ ?>