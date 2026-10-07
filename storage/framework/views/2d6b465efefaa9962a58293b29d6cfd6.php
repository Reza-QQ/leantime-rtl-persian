<div class="tw-flex tw-gap-base tw-justify-start">
    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(empty($link['display'])): ?>
            <?php continue; ?>
        <?php endif; ?>

        <span>
            <?php echo e($link['prefix'] ?? ''); ?> <?php if(! empty($link['link'])): ?> <a href="<?php echo $link['link']; ?>"><?php echo $link['display']; ?></a> <?php else: ?> <?php echo $link['display']; ?> <?php endif; ?>
        </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/inlineLinks.blade.php ENDPATH**/ ?>