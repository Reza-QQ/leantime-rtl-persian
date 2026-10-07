<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'project' => [],
    'type' => 'simple'
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
    'project' => [],
    'type' => 'simple'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="projectBox" id="projectBox-<?php echo e($project['id']); ?>">
    <div class="row" >
        <div class="col-md-12 fixed">
            <div class="row tw-pb-sm">
                <div class="col-md-10">
                    <a href="<?php echo e(BASE_URL); ?>/dashboard/show?projectId=<?php echo e($project['id']); ?>">
                        <span class="projectAvatar">
                            <?php if(isset($projectTypeAvatars[$project["type"]]) && $projectTypeAvatars[$project["type"]] != "avatar"): ?>
                                <span class="<?php echo e($projectTypeAvatars[$project["type"]]); ?>"></span>
                            <?php else: ?>
                                <img src='<?php echo e(BASE_URL); ?>/api/projects?projectAvatar=<?php echo e($project["id"]); ?>&v=<?php echo e(format($project['modified'])->timestamp()); ?>' />
                            <?php endif; ?>
                        </span>
                        <?php if($project["clientName"] != ''): ?>
                            <small><?php echo e($project["clientName"]); ?></small><br />
                        <?php else: ?>
                            <small><?php echo e(__('projectType.'.$project["type"] ?? 'project')); ?></small><br />
                        <?php endif; ?>
                        <strong><?php echo e($project['name']); ?> <i class="fa-solid fa-up-right-from-square"></i></strong>
                    </a>
                </div>
                <div class="col-md-2 tw-text-right">
                    <a  href="javascript:void(0);"
                        hx-patch="<?php echo e(BASE_URL); ?>/hx/projects/projectCard/toggleFavorite"
                        hx-vals='{"isFavorite": <?php echo e($project['isFavorite']); ?>, "projectId": <?php echo e($project['id']); ?>}'
                        hx-target="#projectBox-<?php echo e($project['id']); ?>"
                        onclick="jQuery(this).addClass('go')"
                        hx-swap="none"
                        hx-on::after-request="jQuery(this).removeClass('go')"
                        class="favoriteClick favoriteStar pull-right margin-right <?php echo e($project['isFavorite'] ? 'isFavorite' : ''); ?> tw-mr-[5px]"
                        data-tippy-content="<?php echo e(__('label.favorite_tooltip')); ?>">
                            <i class="<?php echo e($project['isFavorite'] ? 'fa-solid' : 'fa-regular'); ?> fa-star"></i>
                    </a>
                </div>
            </div>

            <?php if($type != "simple"): ?>
                <div id="projectProgressBox-<?php echo e($project['id']); ?>"
                    hx-get="<?php echo e(BASE_URL); ?>/hx/projects/projectCardProgress/getProgress?pId=<?php echo e($project['id']); ?>"
                    hx-trigger="load"
                    hx-swap="innerHTML"
                    hx-target="#projectProgressBox-<?php echo e($project['id']); ?>"
                    hx-indicator=".htmx-indicator">
                    <div class="htmx-indicator">
                        <?php if (isset($component)) { $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.loadingText','data' => ['type' => 'card','count' => '1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::loadingText'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'card','count' => '1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c)): ?>
<?php $attributes = $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c; ?>
<?php unset($__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c)): ?>
<?php $component = $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c; ?>
<?php unset($__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c); ?>
<?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/partials/projectCard.blade.php ENDPATH**/ ?>