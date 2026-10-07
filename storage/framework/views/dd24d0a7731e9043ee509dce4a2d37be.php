<script>
    jQuery(document).ready(function () {

        // First login flow
        <?php if($isFirstLogin === true || $isFirstLogin === "true"): ?>
            leantime.helperController.firstLoginModal();
        <?php else: ?>

            // Returning user flow
            <?php if(($isFirstLogin === false || $isFirstLogin === "false") && $showHelperModal === true): ?>

                // Show the appropriate helper modal for the current page
                <?php if(is_array($currentModal) && isset($currentModal['autoLoad']) && ($currentModal['autoLoad'] === true || $currentModal['autoLoad'] === "true")): ?>
                    leantime.helperController.showHelperModal('<?php echo e($currentModal['template']); ?>', 500, 700);
                <?php elseif(is_string($currentModal)): ?>
                    leantime.helperController.showHelperModal('<?php echo e($currentModal); ?>', 500, 700);
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

    });
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Help/Templates/helpermodal.blade.php ENDPATH**/ ?>