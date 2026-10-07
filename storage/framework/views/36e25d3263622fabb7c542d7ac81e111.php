<!DOCTYPE html>
<html dir="<?php echo e(__('language.direction')); ?>" lang="<?php echo e(__('language.code')); ?>">
<head>
    <?php echo $__env->make('global::sections.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php if(__('language.isRTL') === 'true' || app()->getLocale() === 'fa-IR'): ?>
        <link rel="stylesheet" href="<?php echo e(BASE_URL); ?>/dist/css/rtl.css">
    <?php endif; ?>
</head>

<body class="" hx-ext="preload" hx-headers='{"X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"}'>

    <?php echo $__env->make('global::sections.appAnnouncement', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="mainwrapper menu<?php echo e(session("menuState") ?? "closed"); ?>">

        <div class="header">

            <div class="headerinner">
                <a class="btnmenu" href="javascript:void(0);"></a>

                <a class="barmenu" href="javascript:void(0);">
                    <span class="fa fa-bars"></span>
                </a>

                <div class="logo">
                    <a
                        href="<?php echo e(BASE_URL); ?>"
                        style="background-image: url('<?php echo e(BASE_URL); ?>/dist/images/logo.svg')"
                    >&nbsp;</a>
                </div>

                <?php echo $__env->make('menu::headMenu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div><!-- headerinner -->

        </div><!-- header -->



        <div class="overlay" style="position: relative">
            <div class="leftpanel">
                <div class="leftmenu">
                    <?php echo $__env->make('menu::menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div><!-- leftmenu -->
            </div>
            <div class="rightpanel <?php echo e($section); ?>">
                <div class="primaryContent">
                    <?php if(isset($action, $module)): ?>
                        <?php echo $__env->make("$module::$action", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->yieldContent('content'); ?>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <?php echo $__env->make('global::sections.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

            </div>

        </div><!-- rightpanel -->

        <div class="menu-backdrop" aria-hidden="true"></div>

    </div><!-- mainwrapper -->

    <?php echo $__env->make('global::sections.pageBottom', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->make('help::helpermodal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/layouts/app.blade.php ENDPATH**/ ?>