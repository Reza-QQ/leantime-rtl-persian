
<h1>Latest Plugin Updates</h1>
<p>Extend Leantime using our latest plugins.<br /><a href="<?php echo e(BASE_URL); ?>/plugins/marketplace"><i class="fa fa-cogs"></i> Manage Your Apps</a></p><br />

<br />
<div>
    <ul>

<?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <li onclick="window.location='#/plugins/details/<?php echo e($plugin->identifier); ?>'">
        <img src="<?php echo e($plugin->getPluginImageData()); ?>" width="75" height="75" class="tw-rounded tw-float-left tw-mr-m"/>
            <?php if(! empty($plugin->name)): ?>
            <a href="#/plugins/details/<?php echo e($plugin->identifier); ?>"> <strong><?php echo $plugin->name; ?></strong> <?php echo e($plugin->version ? "(v".$plugin->version.")" : ""); ?></a><br />
                <?php if (isset($component)) { $__componentOriginal3bdfb8ed4e45523cfeced1381fb1f83b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bdfb8ed4e45523cfeced1381fb1f83b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.inlineLinks','data' => ['links' => $plugin->getMetadataLinks()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::inlineLinks'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['links' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($plugin->getMetadataLinks())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bdfb8ed4e45523cfeced1381fb1f83b)): ?>
<?php $attributes = $__attributesOriginal3bdfb8ed4e45523cfeced1381fb1f83b; ?>
<?php unset($__attributesOriginal3bdfb8ed4e45523cfeced1381fb1f83b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bdfb8ed4e45523cfeced1381fb1f83b)): ?>
<?php $component = $__componentOriginal3bdfb8ed4e45523cfeced1381fb1f83b; ?>
<?php unset($__componentOriginal3bdfb8ed4e45523cfeced1381fb1f83b); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if(! empty($desc = $plugin->getCardDesc())): ?>
                <p><?php echo $desc; ?></p>
            <?php endif; ?>
        <div class="clearall"></div>
        <hr />















    </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Plugins/Templates/partials/latestPlugins.blade.php ENDPATH**/ ?>