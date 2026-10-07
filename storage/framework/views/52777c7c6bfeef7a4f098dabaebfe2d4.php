<?php $__env->startSection('content'); ?>

<?php
    $showClosedProjects = $showClosedProjects ?? false;
?>

<div class="pageheader">

    <div class="pageicon"><span class="fa fa-suitcase"></span></div>
    <div class="pagetitle">
        <h5><?php echo __('label.administration'); ?></h5>
        <h1><?php echo __('headline.all_projects'); ?></h1>
    </div>

</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        <div class="pull-right">
            <form action="" method="post">
                <input type="hidden" name="hideClosedProjects" value="1" />
                <input type="checkbox" name="showClosedProjects" onclick="form.submit();" id="showClosed" <?php if($showClosedProjects): ?> checked='checked' <?php endif; ?> />&nbsp;<label for="showClosed" class="pull-right">Show Closed Projects</label>
            </form>
        </div>

        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/projects/newProject','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/projects/newProject','contentRole' => 'primary']); ?><i class='fa fa-plus'></i> <?php echo __('link.new_project'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
        <div class="clearall"></div>
        <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="allProjectsTable">

            <colgroup>
                <col class="con1"/>
                <col class="con0" />
                <col class="con1"/>
                <col class="con0" />
                <col class="con1"/>
                <col class="con0"/>
            </colgroup>
            <thead>
                <tr>
                    <th class="head0"><?php echo __('label.project_name'); ?></th>
                    <th class="head1"><?php echo __('label.client_product'); ?></th>
                    <th class="head1"><?php echo __('label.project_type'); ?></th>
                    <th class="head0"><?php echo __('label.project_state'); ?></th>
                    <th class="head0"><?php echo __('label.hourly_budget'); ?></th>
                    <th class="head1"><?php echo __('label.budget_cost'); ?></th>
                </tr>
            </thead>

            <tbody>

             <?php $__currentLoopData = $allProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class='gradeA'>

                    <td style="padding:6px;">
                        <a class="" href="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($row['id']); ?>"><?php echo e($row['name']); ?></a>
                    </td>
                    <td>
                        <a class="" href="<?php echo e(BASE_URL); ?>/clients/showClient/<?php echo e($row['clientId']); ?>"><?php echo e($row['clientName']); ?></a>
                    </td>

                    <td> <?php echo e($row['type']); ?> </td>

                    <td>
                        <?php if($row['state'] == -1): ?>
                            <?php echo __('label.closed'); ?>

                        <?php else: ?>
                            <?php echo __('label.open'); ?>

                        <?php endif; ?>
                    </td>
                    <td class="center"><?php echo e($row['hourBudget']); ?></td>
                    <td class="center"><?php echo e($row['dollarBudget']); ?></td>
                </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

    </div>
</div>

<?php if (! $__env->hasRenderedOnce('d15c26a9-1ca9-4860-9ffc-0a896892131e')): $__env->markAsRenderedOnce('d15c26a9-1ca9-4860-9ffc-0a896892131e'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    jQuery(document).ready(function() {

            leantime.projectsController.initProjectTable();

    });

</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/showAll.blade.php ENDPATH**/ ?>