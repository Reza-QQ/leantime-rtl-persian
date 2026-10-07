<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginal73464617f1e536702d3c383ba117853c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73464617f1e536702d3c383ba117853c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.pageheader','data' => ['icon' => 'fa fa-puzzle-piece']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::pageheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('fa fa-puzzle-piece')]); ?>
        <h1>My Apps</h1>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73464617f1e536702d3c383ba117853c)): ?>
<?php $attributes = $__attributesOriginal73464617f1e536702d3c383ba117853c; ?>
<?php unset($__attributesOriginal73464617f1e536702d3c383ba117853c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73464617f1e536702d3c383ba117853c)): ?>
<?php $component = $__componentOriginal73464617f1e536702d3c383ba117853c; ?>
<?php unset($__componentOriginal73464617f1e536702d3c383ba117853c); ?>
<?php endif; ?>

    <?php echo $tpl->displayNotification(); ?>

    <div class="maincontent">

        <?php echo $__env->make('plugins::partials.plugintabs',  ["currentUrl" => "installed"], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="maincontentinner">

            <div class="row">
                <div class="col-lg-12">
                    <h5 class="subtitle" style="margin-bottom:15px;">
                        <?php echo e(__("text.installed_plugins")); ?>

                    </h5>
                    <div class="row sortableTicketList">
                        <?php echo $__env->renderEach('plugins::partials.plugin', $installedPlugins, 'plugin'); ?>

                        <?php if($installedPlugins === false || count($installedPlugins) == 0): ?>
                            <span class="tw-block tw-px-4 tw-mb-4"><?php echo e(__("text.no_plugins_activated")); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="subtitle tw-mb-m" style="margin-bottom:15px;">
                        <?php echo e(__("text.new_plugins")); ?>

                    </h5>
                    <ul class="sortableTicketList" >
                        <?php if(count($newPlugins) > 0): ?>
                            <?php $__currentLoopData = $newPlugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newplugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="ticketBox fixed">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <strong><?php echo e($newplugin->name); ?><br /></strong>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo e($newplugin->description); ?><br />
                                                <?php echo e($tpl->__("text.version")); ?> <?php echo e($newplugin->version); ?>

                                                <?php if(is_array($newplugin->authors) && count($newplugin->authors) > 0): ?>
                                                    | <?php echo e($tpl->__("text.by")); ?> <a href="mailto:<?php echo e($newplugin->authors[0]["email"]); ?>"><?php echo e($newplugin->authors[0]["name"]); ?></a>
                                                <?php endif; ?>
                                               | <a href="<?php echo e($newplugin->homepage); ?>"> <?php echo e($tpl->__("text.visit_site")); ?> </a>
                                            </div>
                                            <div class="col-md-4" style="padding-top:5px;">
                                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/plugins/myapps?install='.e($newplugin->foldername).'','contentRole' => 'default','class' => 'pull-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/plugins/myapps?install='.e($newplugin->foldername).'','contentRole' => 'default','class' => 'pull-right']); ?><?php echo e($tpl->__('buttons.activate')); ?> <?php echo $__env->renderComponent(); ?>
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
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginal088b80ac345989c7752ee327dee3d972 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal088b80ac345989c7752ee327dee3d972 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.undrawSvg','data' => ['image' => 'undraw_empty_cart_co35.svg','headline' => 'Nothing New']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::undrawSvg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => 'undraw_empty_cart_co35.svg','headline' => 'Nothing New']); ?>
                                We couldn't discover any new plugins in your plugin folder, please make sure the plugin is unzipped and contains a composer.json file.
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Plugins/Templates/myapps.blade.php ENDPATH**/ ?>