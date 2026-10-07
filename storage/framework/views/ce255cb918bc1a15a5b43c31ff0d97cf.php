<?php $__env->startSection('content'); ?>

<div class="pageheader">

    <div class="pageicon"><span class="fa <?php echo e($tpl->getModulePicture()); ?>"></span></div>
    <div class="pagetitle">
        <h5><?php echo __('label.administration'); ?></h5>
        <h1><?php echo __('headlines.users'); ?></h1>
    </div>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        <div class="row">
            <div class="col-md-6">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.create')): ?>
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/users/newUser','contentRole' => 'primary','class' => 'userEditModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/users/newUser','contentRole' => 'primary','class' => 'userEditModal']); ?><i class='fa fa-plus'></i> <?php echo __('buttons.add_user'); ?>  <?php echo $__env->renderComponent(); ?>
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
            <div class="col-md-6 align-right">

            </div>
        </div>

        <table class="table table-bordered" id="allUsersTable">
            <colgroup>
                <col class="con1">
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">
            </colgroup>
            <thead>
                <tr>
                    <th class='head1'><?php echo __('label.name'); ?></th>
                    <th class='head0'><?php echo __('label.email'); ?></th>
                    <th class='head1'><?php echo __('label.client'); ?></th>
                    <th class='head1'><?php echo __('label.role'); ?></th>
                    <th class='head1'><?php echo __('label.status'); ?></th>
                    <th class='head1'><?php echo __('headlines.twoFA'); ?></th>
                    <th class='head0 no-sort'></th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="padding:6px 10px;">
                             <a href="<?php echo e(BASE_URL); ?>/users/editUser/<?php echo e($row['id']); ?>"><?php echo sprintf(__('text.full_name'), e($row['firstname']), e($row['lastname'])); ?></a>
                        </td>
                        <td><a href="<?php echo e(BASE_URL); ?>/users/editUser/<?php echo e($row['id']); ?>"><?php echo e($row['username']); ?></a></td>
                        <td><?php echo e($row['clientName']); ?></td>
                        <td><?php echo __('label.roles.' . $roles[$row['role']]); ?></td>
                        <td><?php if(strtolower($row['status']) == 'a'): ?>
                            <?php echo __('label.active'); ?>

                        <?php elseif(strtolower($row['status']) == 'i'): ?>
                            <?php echo __('label.invited'); ?>

                        <?php else: ?>
                            <?php echo __('label.deactivated'); ?>

                        <?php endif; ?></td>
                        <td><?php if($row['twoFAEnabled']): ?>
                            <?php echo __('label.yes'); ?>

                        <?php else: ?>
                            <?php echo __('label.no'); ?>

                        <?php endif; ?></td>
                        <td><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.delete')): ?><a href="<?php echo e(BASE_URL); ?>/users/delUser/<?php echo e($row['id']); ?>" class="delete"><i class="fa fa-trash"></i> <?php echo __('links.delete'); ?></a><?php endif; ?></td>
                    </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('5067a8cd-a991-4bf7-bcf9-91d03d19003c')): $__env->markAsRenderedOnce('5067a8cd-a991-4bf7-bcf9-91d03d19003c'); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
            leantime.usersController.initUserTable();
            leantime.usersController._initModals();
            leantime.usersController.initUserEditModal();

        }
    );

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Users/Templates/showAll.blade.php ENDPATH**/ ?>