<?php if(count($allCanvas) > 0): ?>
<?php else: ?>
    <br /><br />
    <div class='center'>
        <div class='svgContainer'>
            <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_design_data_khdb.svg'); ?>

        </div>

        <h3><?php echo __("headlines.$canvasSlug.analysis"); ?></h3>
        <br /><?php echo __("text.$canvasSlug.helper_content"); ?>


        <?php if($login::userIsAtLeast($roles::$editor)): ?>
            <br /><br />
            <a href='javascript:void(0)' class='addCanvasLink btn btn-primary'>
                <?php echo __('links.icon.create_new_board'); ?></a>.
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if(! empty($disclaimer) && count($allCanvas) > 0): ?>
    <small class="align-center"><?php echo e($disclaimer); ?></small>
<?php endif; ?>

<?php echo $__env->make('blueprints::modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    </div>
</div>

<?php if (! $__env->hasRenderedOnce('0da4624b-5093-4ebc-8058-5bceea45e90b')): $__env->markAsRenderedOnce('0da4624b-5093-4ebc-8058-5bceea45e90b'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    jQuery(document).ready(function() {

        if(jQuery('#searchCanvas').length > 0) {
            new SlimSelect({ select: '#searchCanvas' });
        }

        <?php if(isset($_GET['closeModal'])): ?>
            jQuery.nmTop().close();
        <?php endif; ?>

        leantime.blueprintsController.setRowHeights();
        leantime.blueprintsController.setCanvasName('<?php echo e($canvasSlug); ?>');
        leantime.blueprintsController.initFilterBar();

        <?php if($login::userIsAtLeast($roles::$editor)): ?>
            leantime.blueprintsController.initCanvasLinks();
            leantime.blueprintsController.initUserDropdown();
            leantime.blueprintsController.initStatusDropdown();
            leantime.blueprintsController.initRelatesDropdown();
        <?php else: ?>
            leantime.authController.makeInputReadonly(".maincontentinner");
        <?php endif; ?>

        <?php if(isset($_GET['showModal'])): ?>
            <?php
                if ($_GET['showModal'] == '') {
                    $modalUrl = '&type=' . array_key_first($canvasTypes);
                } else {
                    $modalUrl = '/' . (int) $_GET['showModal'];
                }
            ?>
            leantime.blueprintsController.openModalManually("<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/editCanvasItem<?php echo e($modalUrl); ?>");
            window.history.pushState({},document.title, '<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/showCanvas/');
        <?php endif; ?>

    });

</script>
<?php $__env->stopPush(); ?> <?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Blueprints/Templates/showCanvasBottom.blade.php ENDPATH**/ ?>