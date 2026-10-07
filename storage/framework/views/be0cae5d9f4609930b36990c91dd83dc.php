<?php $__env->startFragment('tokens-table'); ?>
<div class="row">
    <div class="col-md-12">
        <div>
            <h5 class="subtitle"><?php echo e(__('headlines.personal_access_tokens')); ?></h5>
            <p><?php echo e(__('text.create_tokens_to_authenticate')); ?></p>
            <br />

            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','contentRole' => 'primary','link' => '#/auth/tokenNew']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','contentRole' => 'primary','link' => '#/auth/tokenNew']); ?><?php echo e(__('buttons.create_token')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?> <br />

            <div class="clearfix"></div>

            <table class="table table-bordered" id="tokens-table">
                <thead>
                    <tr>
                        <th><?php echo e(__('label.name')); ?></th>
                        <th><?php echo e(__('label.last_used')); ?></th>
                        <th><?php echo e(__('label.created_on')); ?></th>
                        <th><?php echo e(__('label.actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $tokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($token['name']); ?></td>
                        <td><?php echo e($token['last_used_at'] ? format($token['last_used_at'])->date() . ' ' . format($token['last_used_at'])->time(): 'Never'); ?></td>
                        <td><?php echo e(format($token['created_at'])->date(). ' ' . format($token['created_at'])->time()); ?></td>
                        <td>
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['state' => 'danger','class' => 'btn-sm','hxDelete' => ''.e(BASE_URL).'/hx/auth/personalTokens/delete/'.e($token['id']).'','hxConfirm' => ''.e(__('notifications.confirm_token_delete')).'','hxTarget' => '#personalTokens']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['state' => 'danger','class' => 'btn-sm','hx-delete' => ''.e(BASE_URL).'/hx/auth/personalTokens/delete/'.e($token['id']).'','hx-confirm' => ''.e(__('notifications.confirm_token_delete')).'','hx-target' => '#personalTokens']); ?><i class="fa fa-trash"></i> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $__env->stopFragment(); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Auth/Templates/partials/tokens.blade.php ENDPATH**/ ?>