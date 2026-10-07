<?php $__env->startSection('content'); ?>

    <?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
        'includeTitle' => true,
        'allProjects' => []
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
        'allProjects' => []
    ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

    <div class="maincontent" style="margin-top:0px">
        <div style="padding:10px 0px">
            <div class="center">
                <span style="font-size:38px; color:var(--main-titles-color););">
                    <?php echo e(__("headline.project_hub")); ?>

                </span><br />
                <span style="font-size:18px; color:var(--main-titles-color););">
                   <?php echo e(__("text.project_hub_intro")); ?>

                    <?php if($login::userIsAtLeast("manager")): ?>
                        <br /><br /><?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/projects/createnew','contentRole' => 'default']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/projects/createnew','contentRole' => 'default']); ?><?php echo __("menu.create_something_new"); ?> <?php echo $__env->renderComponent(); ?>
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
                </span>
                <br />
                <br />
            </div>
        </div>

        <?php if(is_array($allProjects) && count($allProjects) == 0): ?>
            <?php if (isset($component)) { $__componentOriginal088b80ac345989c7752ee327dee3d972 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal088b80ac345989c7752ee327dee3d972 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.undrawSvg','data' => ['image' => 'undraw_a_moment_to_relax_bbpa.svg','style' => 'color:var(--main-titles-color);','maxWidth' => '30%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::undrawSvg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => 'undraw_a_moment_to_relax_bbpa.svg','style' => 'color:var(--main-titles-color);','maxWidth' => '30%']); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal088b80ac345989c7752ee327dee3d972)): ?>
<?php $attributes = $__attributesOriginal088b80ac345989c7752ee327dee3d972; ?>
<?php unset($__attributesOriginal088b80ac345989c7752ee327dee3d972); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal088b80ac345989c7752ee327dee3d972)): ?>
<?php $component = $__componentOriginal088b80ac345989c7752ee327dee3d972; ?>
<?php unset($__componentOriginal088b80ac345989c7752ee327dee3d972); ?>
<?php endif; ?>

        <?php endif; ?>

        <div id="myProjectsHub"
             hx-get="<?php echo e(BASE_URL); ?>/projects/projectHubProjects/get"
             hx-trigger="HTMX.updateProjectList from:body"
             hx-target="#myProjectsHub"
             hx-swap="outerHTML">

            <?php if(count($clients) > 0): ?>
                <div class="dropdown dropdownWrapper pull-right">
                    <a href="javascript:void(0)" class="btn btn-default dropdown-toggle header-title-dropdown" data-toggle="dropdown">
                        <?php if($currentClientName != ''): ?>
                            <?php echo e($currentClientName); ?>

                        <?php else: ?>
                            <?php echo e(__("headline.all_clients")); ?>

                        <?php endif; ?>

                        <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(CURRENT_URL); ?>"><?php echo e(__("headline.all_clients")); ?></a></li>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a  href="javascript:void(0);"
                                    hx-get="<?php echo e(BASE_URL); ?>/projects/projectHubProjects/get?client=<?php echo e($key); ?>"
                                    hx-target="#myProjectsHub"
                                    hx-swap="outerHTML"><?php echo e($value['name']); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(count($allProjects) == 0): ?>
                <br /><br />
                <div class='center'>
                    <div style='width:70%; color:var(--main-titles-color)' class='svgContainer'>
                        <?php echo e(__('notifications.not_assigned_to_any_project')); ?>

                        <?php if($login::userIsAtLeast($roles::$manager)): ?>
                            <br /><br />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/projects/newProject','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/projects/newProject','contentRole' => 'primary']); ?><?php echo e(__('link.new_project')); ?> <?php echo $__env->renderComponent(); ?>
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
                    </div>
                </div>
            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalb42738ebdee3365d3e140e48fd37e95c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb42738ebdee3365d3e140e48fd37e95c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.accordion','data' => ['id' => 'myProjectsHub-favorites','class' => 'noBackground']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'myProjectsHub-favorites','class' => 'noBackground']); ?>
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
                                    <?php echo $__env->make("projects::partials.projectCard", ["project" => $project,  "type" => "detailed"], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                                <?php
                                    $hasFavorites = true;
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($hasFavorites === false): ?>
                            <div style="color:var(--main-titles-color)">
                                <?php echo e(__("text.no_favorites")); ?>

                            </div>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.accordion','data' => ['id' => 'myProjectsHub-otherProjects','class' => 'noBackground']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'myProjectsHub-otherProjects','class' => 'noBackground']); ?>
                 <?php $__env->slot('title', null, []); ?> 
                    <?php echo e(__("text.all_assigned_projects")); ?>

                 <?php $__env->endSlot(); ?>
                 <?php $__env->slot('content', null, []); ?> 

                    <div class="row">
                        <?php $__currentLoopData = $allProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($project['isFavorite'] == false): ?>

                                <div class="col-md-3">
                                    <?php echo $__env->make("projects::partials.projectCard", ["project" => $project, "type" => "detailed"], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/projectHub.blade.php ENDPATH**/ ?>