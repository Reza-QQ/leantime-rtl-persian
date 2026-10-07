<?php
    $canvasTitle = '';
    $allCanvas = $allCanvas ?? [];
    $canvasIcon = $canvasIcon ?? '';
    $canvasTypes = $canvasTypes ?? [];
    $statusLabels = $statusLabels ?? [];
    $relatesLabels = $relatesLabels ?? [];
    $dataLabels = $dataLabels ?? [];
    $disclaimer = $disclaimer ?? '';
    $canvasItems = $canvasItems ?? [];

    $filter['status'] = $_GET['filter_status'] ?? (session('filter_status') ?? 'all');
    session(['filter_status' => $filter['status']]);
    $filter['relates'] = $_GET['filter_relates'] ?? (session('filter_relates') ?? 'all');
    session(['filter_relates' => $filter['relates']]);

    // get canvas title
    foreach ($allCanvas as $canvasRow) {
        if ($canvasRow['id'] == ($currentCanvas ?? '')) {
            $canvasTitle = $canvasRow['title'];
            break;
        }
    }


?>

<style>
    .canvas-row { margin-left: 0px; margin-right: 0px;}
    .canvas-title-only { border-radius: var(--box-radius-small); }
    h4.canvas-element-title-empty { background: white !important; border-color: white !important; }
    div.canvas-element-center-middle { text-align: center; }
</style>

<div class="pageheader">
    <div class="pageicon"><span class='fa <?php echo e($canvasIcon); ?>'></span></div>
    <div class="pagetitle">
        <?php if(count($allCanvas) > 0): ?>
            <?php if (isset($component)) { $__componentOriginaled82c7bef028765b9b2b447066c3673c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled82c7bef028765b9b2b447066c3673c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.subjectSwitcher','data' => ['parent' => __('headline.' . $canvasSlug . '.board'),'current' => $canvasTitle]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::subjectSwitcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['parent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('headline.' . $canvasSlug . '.board')),'current' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($canvasTitle)]); ?>
                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                    <li><a href="#/blueprints/<?php echo e($canvasSlug); ?>/boardDialog"><?php echo __('links.icon.create_new_board'); ?></a></li>
                <?php endif; ?>
                <li class="border"></li>
                <?php $__currentLoopData = $allCanvas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canvasRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/showCanvas/<?php echo e($canvasRow['id']); ?>"><?php echo e(e($canvasRow['title'])); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled82c7bef028765b9b2b447066c3673c)): ?>
<?php $attributes = $__attributesOriginaled82c7bef028765b9b2b447066c3673c; ?>
<?php unset($__attributesOriginaled82c7bef028765b9b2b447066c3673c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled82c7bef028765b9b2b447066c3673c)): ?>
<?php $component = $__componentOriginaled82c7bef028765b9b2b447066c3673c; ?>
<?php unset($__componentOriginaled82c7bef028765b9b2b447066c3673c); ?>
<?php endif; ?>
        <?php else: ?>
            <h1><?php echo __("headline.$canvasSlug.board"); ?></h1>
        <?php endif; ?>
    </div>
    <?php if(count($allCanvas) > 0): ?>
        <div class="pageheader-right">
            <span class="dropdown dropdownWrapper headerEditDropdown">
                <a href="javascript:void(0)" class="dropdown-toggle btn btn-transparent" data-toggle="dropdown"><i class="fa-solid fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu editCanvasDropdown">
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                        <li><a href="#/blueprints/<?php echo e($canvasSlug); ?>/boardDialog/<?php echo e($currentCanvas); ?>" class="editCanvasLink "><?php echo __('links.icon.edit'); ?></a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/export/<?php echo e($currentCanvas); ?>"><?php echo __('links.icon.export'); ?></a></li>
                    <li><a href="javascript:window.print();"><?php echo __('links.icon.print'); ?></a></li>
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                        <li><a href="#/blueprints/<?php echo e($canvasSlug); ?>/delCanvas/<?php echo e($currentCanvas); ?>" class="delete"><?php echo __('links.icon.delete'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </span>
        </div>
    <?php endif; ?>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        <div class="row">
            <div class="col-md-3">

                <?php if($login::userIsAtLeast($roles::$editor) && count($canvasTypes) == 1 && count($allCanvas) > 0): ?>
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/blueprints/'.e($canvasSlug).'/editCanvasItem?type='.e($elementName).'','contentRole' => 'primary','id' => ''.e($elementName).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/blueprints/'.e($canvasSlug).'/editCanvasItem?type='.e($elementName).'','contentRole' => 'primary','id' => ''.e($elementName).'']); ?><?php echo __('links.add_new_canvas_item' . $canvasSlug); ?> <?php echo $__env->renderComponent(); ?>
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

            <div class="col-md-6 center">

            </div>

            <div class="col-md-3">
                <div class="pull-right">
                    <div class="btn-group viewDropDown">
                        <?php if(count($allCanvas) > 0 && ! empty($statusLabels)): ?>
                            <?php if($filter['status'] == 'all' || ! isset($statusLabels[$filter['status']])): ?>
                                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="fas fa-filter"></i> <?php echo __('status.all'); ?> <?php echo __('links.view'); ?></button>
                            <?php else: ?>
                                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw <?php echo __($statusLabels[$filter['status']]['icon']); ?>"></i> <?php echo e($statusLabels[$filter['status']]['title']); ?> <?php echo __('links.view'); ?></button>
                            <?php endif; ?>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/showCanvas?filter_status=all" <?php if($filter['status'] == 'all'): ?> class="active" <?php endif; ?>><i class="fas fa-globe"></i> <?php echo __('status.all'); ?></a></li>
                                <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/showCanvas?filter_status=<?php echo e($key); ?>" <?php if($filter['status'] == $key): ?> class="active" <?php endif; ?>><i class="fas fa-fw <?php echo e($data['icon']); ?>"></i> <?php echo e($data['title']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="btn-group viewDropDown">
                        <?php if(count($allCanvas) > 0 && ! empty($relatesLabels)): ?>
                            <?php if($filter['relates'] == 'all' || ! isset($relatesLabels[$filter['relates']])): ?>
                                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-globe"></i> <?php echo __('relates.all'); ?> <?php echo __('links.view'); ?></button>
                            <?php else: ?>
                                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw <?php echo __($relatesLabels[$filter['relates']]['icon']); ?>"></i> <?php echo e($relatesLabels[$filter['relates']]['title']); ?> <?php echo __('links.view'); ?></button>
                            <?php endif; ?>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/showCanvas?filter_relates=all" <?php if($filter['relates'] == 'all'): ?> class="active" <?php endif; ?>><i class="fas fa-globe"></i> <?php echo __('relates.all'); ?></a></li>
                                <?php $__currentLoopData = $relatesLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/showCanvas?filter_relates=<?php echo e($key); ?>" <?php if($filter['relates'] == $key): ?> class="active" <?php endif; ?>><i class="fas fa-fw <?php echo e($data['icon']); ?>"></i> <?php echo e($data['title']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

        </div>

        <div class="clearfix"></div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Blueprints/Templates/showCanvasTop.blade.php ENDPATH**/ ?>