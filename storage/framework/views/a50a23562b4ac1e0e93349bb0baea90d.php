<?php $tpl->dispatchTplEvent('beforeUserinfoMenuOpen'); ?>

<div class="userinfo">
    <?php $tpl->dispatchTplEvent('afterUserinfoMenuOpen'); ?>
    <?php if(session()->exists("companysettings.logoPath") && session("companysettings.logoPath") !== false && session("companysettings.logoPath") !== ''): ?>
        <a href='<?php echo e(BASE_URL); ?>/users/editOwn/' preload="mouseover" class="dropdown-toggle profileHandler includeLogo" data-toggle="dropdown">
            <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($user['id'] ?? -1); ?>&v=<?php echo e(format($user['modified'] ?? -1)->timestamp()); ?>" class="profilePicture"/>
            <img src="<?php echo e(session("companysettings.logoPath")); ?>" class="logo tw-pl-1" />
        </a>
    <?php else: ?>
        <a href='<?php echo e(BASE_URL); ?>/users/editOwn/' preload="mouseover" class="dropdown-toggle profileHandler" data-toggle="dropdown">
            <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($user['id'] ?? -1); ?>&v=<?php echo e(format($user['modified'] ?? -1)->timestamp()); ?>" class="profilePicture"/>
        </a>
    <?php endif; ?>
    <ul class="dropdown-menu">
        <?php $tpl->dispatchTplEvent('afterUserinfoDropdownMenuOpen'); ?>
        <li>
            <a href='<?php echo e(BASE_URL); ?>/users/editOwn/' preload="mouseover">
                <?php echo __("menu.my_profile"); ?>

            </a>
        </li>
        <?php $tpl->dispatchTplEvent('afterMyProfile'); ?>
        <li>
            <a href='<?php echo e(BASE_URL); ?>/users/editOwn#theme' preload="mouseover">
                <?php echo __("menu.theme"); ?>

            </a>
        </li>
        <?php $tpl->dispatchTplEvent('afterTheme'); ?>
        <li>
            <a href='<?php echo e(BASE_URL); ?>/users/editOwn#settings' preload="mouseover">
                <?php echo __("menu.settings"); ?>

            </a>
        </li>
        <?php $tpl->dispatchTplEvent('afterSettings'); ?>
        <li class="border">
            <?php if($login::userIsAtLeast(\Leantime\Domain\Auth\Models\Roles::$admin)): ?>
                <a href='<?php echo e(BASE_URL); ?>/plugins/marketplace#/help/support' >
                    <span class="fa-solid fa-hand-holding-heart" style="color:#f61067;"></span> <?php echo e(__('link.support_us')); ?>

                </a>
            <?php else: ?>
                <a href='#/help/support'  >
                    <span class="fa-solid fa-hand-holding-heart" style="color:#f61067;"></span> <?php echo e(__('link.support_us')); ?>

                </a>
            <?php endif; ?>
        </li>

<li class="border">
<a href='<?php echo e(BASE_URL); ?>/auth/logout'>
   <?php echo __("menu.sign_out"); ?>

</a>
</li>
<?php $tpl->dispatchTplEvent('beforeUserinfoDropdownMenuClose'); ?>
</ul>
<?php $tpl->dispatchTplEvent('beforeUserinfoMenuClose'); ?>
</div>
<?php $tpl->dispatchTplEvent('afterUserinfoMenuClose'); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Auth/Templates/partials/loginInfo.blade.php ENDPATH**/ ?>