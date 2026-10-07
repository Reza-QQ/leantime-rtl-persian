
<?php $tpl->dispatchTplEvent('beforePageHeaderOpen'); ?>

<div <?php echo e($attributes->merge([ 'class' => 'pageheader' ])); ?>>

    <?php $tpl->dispatchTplEvent('afterPageHeaderOpen'); ?>

    <div class="pageicon"><span class="<?php echo e($icon ?? 'fa fa-home'); ?>"></span></div>

    <div class="pagetitle">
        <?php echo e($slot); ?>

    </div>

    <?php if(isset($actions)): ?>
        <div <?php echo e($actions->attributes->merge(['class' => 'pageheader-right'])); ?>><?php echo e($actions); ?></div>
    <?php endif; ?>

    <?php $tpl->dispatchTplEvent('beforePageHeaderClose'); ?>

</div>

<?php $tpl->dispatchTplEvent('afterPageHeaderClose'); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/pageheader.blade.php ENDPATH**/ ?>