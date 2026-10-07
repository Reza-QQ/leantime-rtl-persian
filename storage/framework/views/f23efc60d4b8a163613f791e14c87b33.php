<div class="row canvas-row">
    <?php $__currentLoopData = $row['columns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="column" style="width: <?php echo e($col['width']); ?>%">
            <?php if(isset($col['header'])): ?>
                <h4 class="widgettitle title-primary center canvas-title-only">
                    <large><i class="<?php echo e($col['header']['icon']); ?>"></i> <?php echo __($col['header']['title']); ?></large>
                </h4>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Blueprints/Templates/partials/sectionHeader.blade.php ENDPATH**/ ?>