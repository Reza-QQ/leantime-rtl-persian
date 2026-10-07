<?php $__env->startSection('content'); ?>

<div class="pageheader">
    <div class="pageicon"><span class="fa-solid fa-chess"></span></div>
    <div class="pagetitle">
        <h1><?php echo __('headlines.blueprints'); ?></h1>
    </div>
</div>

<?php echo $tpl->displayNotification(); ?>


<div class="maincontent">

    <div class="row">
        <div class="col-md-12">
            <div class="maincontentinner">
                <h5 class="subtitle">دوباره شروع کنید</h5>
                <div class="row">
                <?php $__currentLoopData = $recentProgressCanvas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canvasType => $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="profileBox">
                            <div class="commentImage icon">
                                <i class="<?php echo e($board['icon']); ?>"></i>
                            </div>
                            <span class="userName">
                                    <small><?php echo __($board['name']); ?> (<?php echo e($board['count']); ?>)</small><br />

                                    <a href="<?php echo e(BASE_URL); ?>/<?php echo e($board['module']); ?>/showCanvas/<?php echo e($board['lastCanvasId']); ?>">
                                        <?php echo e($tpl->escape($board['lastTitle'])); ?>

                                    </a><br />
                                <small><?php echo __('label.last_updated'); ?> <?php echo e(format($board['lastUpdate'])->date()); ?> <?php echo e(format($board['lastUpdate'])->time()); ?></p>
                                </small>
                                </span>
                               <div class="clearall"></div>
                            <?php
                                $percentDone = 0;
                                if (isset($canvasProgress[$canvasType])) {
                                    $percentDone = round($canvasProgress[$canvasType] * 100);
                                }
                            ?>
                            <br />
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo e($percentDone); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($percentDone); ?>%">
                                    <span class="sr-only"><?php echo sprintf(__('text.percent_complete'), $percentDone); ?></span>
                                </div>
                            </div>
                            <?php echo sprintf(__('text.percent_complete'), $percentDone); ?>



                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(! is_array($recentProgressCanvas) || count($recentProgressCanvas) == 0): ?>
                    <div class='col-md-12'><br /><br /><div class='center'>
                        <div style='width:30%' class='svgContainer'>
                            <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_design_data_khdb.svg'); ?>

                        </div>
                        <h3><?php echo __('headline.no_blueprints_yet'); ?></h3>
                        <br /><?php echo __('text.no_blueprints_yet'); ?>

                        <br /><?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/blueprints/value/showCanvas','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/blueprints/value/showCanvas','contentRole' => 'primary']); ?><?php echo __('button.start_here_project_value'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                    </div></div>
                <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <?php if($login::userIsAtLeast($roles::$editor)): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="maincontentinner">
                <h5 class="accordionTitle" id="accordion_link_other">
                    <a href="javascript:void(0)" class="accordion-toggle" id="accordion_toggle_other" onclick="accordionToggle('other');">
                        <i class="fa fa-angle-down"></i> قالب‌ها
                    </a>
                </h5>
                <p style="padding-left:19px;"><?php echo __('description.other_tools'); ?></p>
                <div id="accordion_other" class="row teamBox" style="padding-left:19px;">

                    <?php $__currentLoopData = $otherBoards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(! isset($board['visible']) || $board['visible'] === 1): ?>
                        <div class="col-md-3">
                            <div class="profileBox" style="min-height: 125px;">
                                <div class="commentImage icon">
                                    <i class="<?php echo e($board['icon']); ?>"></i>
                                </div>
                                <span class="userName">
                            <a href="<?php echo e(BASE_URL); ?>/<?php echo e($board['module']); ?>/showCanvas">
                                <?php echo __($board['name']); ?>

                            </a>
                        </span>
                                <?php echo __($board['description']); ?>

                                <div class="clearall"></div>


                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

<?php if (! $__env->hasRenderedOnce('f7cc8e99-687c-4908-bfd8-2bf2e661f98c')): $__env->markAsRenderedOnce('f7cc8e99-687c-4908-bfd8-2bf2e661f98c'); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    function accordionToggle(id) {

        let currentLink = jQuery("#accordion_toggle_"+id).find("i.fa");

        if(currentLink.hasClass("fa-angle-right")){
            currentLink.removeClass("fa-angle-right");
            currentLink.addClass("fa-angle-down");
            jQuery('#accordion_'+id).slideDown("fast");
        }else{
            currentLink.removeClass("fa-angle-down");
            currentLink.addClass("fa-angle-right");
            jQuery('#accordion_'+id).slideUp("fast");
        }

    }
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Blueprints/Templates/showBoards.blade.php ENDPATH**/ ?>