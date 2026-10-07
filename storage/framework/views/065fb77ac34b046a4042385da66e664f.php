<?php $__env->startSection('content'); ?>

<?php $tpl->dispatchTplEvent('beforePageHeaderOpen'); ?>
<div class="pageheader">
    <?php $tpl->dispatchTplEvent('afterPageHeaderOpen'); ?>
    <div class="pageicon"><span class="fa fa-address-book"></span></div>
    <div class="pagetitle">
        <h5><?php echo __('label.administration'); ?></h5>
        <h1><?php echo __('headline.all_clients'); ?></h1>
    </div>
    <?php $tpl->dispatchTplEvent('beforePageHeaderClose'); ?>
</div><!--pageheader-->
<?php $tpl->dispatchTplEvent('afterPageHeaderClose'); ?>

<div class="maincontent">
    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clients.create')): ?>
             <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/clients/newClient','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/clients/newClient','contentRole' => 'primary']); ?><i class='fa fa-plus'></i> <?php echo __('link.new_client'); ?> <?php echo $__env->renderComponent(); ?>
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

        <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" id="allClientsTable">
            <colgroup>
                <col class='con0' />
                <col class='con1' />
                <col class='con0' />
            </colgroup>
            <thead>
                <tr>
                    <th class='head0'><?php echo __('label.client_id'); ?></th>
                    <th class='head1'><?php echo __('label.client_name'); ?></th>
                    <th class='head0'><?php echo __('label.url'); ?></th>
                    <th class='head1'><?php echo __('label.number_of_projects'); ?></th>
                </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $allClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($row['id']); ?></td>
                    <td>
                        <a class="" href="<?php echo e(BASE_URL); ?>/clients/showClient/<?php echo e($row['id']); ?>"><i class='fa fa-plus'></i> <?php echo e($row['name']); ?></a>
                    </td>
                    <td><a href="<?php echo e($row['internet']); ?>" target="_blank"><?php echo e($row['internet']); ?></a></td>
                    <td><?php echo e($row['numberOfProjects']); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

    </div>
</div>

<?php if (! $__env->hasRenderedOnce('afae1691-bde3-452d-8312-5b30ad2234b7')): $__env->markAsRenderedOnce('afae1691-bde3-452d-8312-5b30ad2234b7'); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    <?php $tpl->dispatchTplEvent('scripts.afterOpen'); ?>

    jQuery(document).ready(function() {

        leantime.clientsController.initClientTable();


    });

    <?php $tpl->dispatchTplEvent('scripts.beforeClose'); ?>

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Clients/Templates/showAll.blade.php ENDPATH**/ ?>