<div class="projectListFilter">

    <form
          hx-target="#mainProjectSelector"
          hx-swap="outerHTML"
          hx-trigger="change">
        <i class="fas fa-filter"></i>
        <select data-placeholder="" title=""
                hx-post="<?php echo e(BASE_URL); ?>/hx/menu/projectSelector/update-menu"
                hx-target="#mainProjectSelector"
                hx-swap="outerHTML"
                hx-indicator=".htmx-indicator, .htmx-loaded-content"
                name="client">
            <option value="" data-placeholder="true">همه مشتریان</option>
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($client['id'] > 0): ?>
                    <option value='<?php echo e($client['id']); ?>'
                    <?php if(isset($projectSelectFilter['client']) && $projectSelectFilter['client'] == $client['id']): ?>
                        selected='selected'
                    <?php endif; ?>
                   ><?php echo e($client['name']); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <i class="fa-solid fa-diagram-project"></i>
        <select data-placeholder="" name="groupBy"
                hx-post="<?php echo e(BASE_URL); ?>/hx/menu/projectSelector/update-menu"
                hx-target="#mainProjectSelector"
                hx-indicator=".htmx-indicator, .htmx-loaded-content"
                hx-swap="outerHTML">
            <?php $__currentLoopData = $projectSelectGroupOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value='<?php echo e($key); ?>'

                    <?php echo e($projectSelectFilter["groupBy"] == $key ? " selected='selected' " : ""); ?>


                ><?php echo e($group); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="hidden" name="activeTab" value="" />

    </form>

</div>

<div class="htmx-indicator tw-ml-m tw-mr-m tw-pt-l">
    <?php if (isset($component)) { $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.loadingText','data' => ['type' => 'project','count' => '5','includeHeadline' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::loadingText'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'project','count' => '5','includeHeadline' => 'false']); ?>
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

<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Menu/Templates/partials/projectListFilter.blade.php ENDPATH**/ ?>